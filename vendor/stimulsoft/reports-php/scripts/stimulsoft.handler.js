StiHandler.prototype.process = function (args, callback) {
    if (args) {
        if (args.event === 'OpenReport')
            return null;

        if (args.event === 'BeginProcessData' || args.event === 'EndProcessData') {
            if (!this.databases.includes(args.database))
                return null;

            args.preventDefault = true;
        }

        if (callback)
            args.async = true;

        let command = {};
        for (let p in args) {
            switch (p) {
                case 'report':
                    if (args.report && args.event !== 'BeginProcessData' && args.event !== 'EndProcessData')
                        command.report = args.report.isRendered ? args.report.saveDocumentToJsonString() : args.report.saveToJsonString();
                    break;

                case 'settings':
                    if (args.settings) {
                        command.settings = JSON.stringify(args.settings);
                        command.reportType = typeof args.settings.is == 'function' && args.settings.is(Stimulsoft.Report.Dashboard.Export.IStiDashboardExportSettings) ? 2 : 1;
                    }
                    break;

                case 'data':
                    command.data = Stimulsoft.System.Convert.toBase64String(args.data);
                    break;

                case 'variables':
                    command[p] = this.getVariables(args[p]);
                    break;

                case 'viewer':
                    break;

                default:
                    command[p] = args[p];
                    break;
            }
        }

        let sendText = Stimulsoft.Report.Dictionary.StiSqlAdapterService.encodeCommand(command);
        let handlerCallback = function (handlerArgs) {
            if (handlerArgs.report) args.report = handlerArgs.report;
            if (handlerArgs.settings) Stimulsoft.handler.copySettings(handlerArgs.settings, args.settings);
            if (handlerArgs.pageRange) Stimulsoft.handler.copySettings(handlerArgs.pageRange, args.pageRange);
            if (handlerArgs.fileName) args.fileName = handlerArgs.fileName;

            if (args.command != 'TestConnection' && !Stimulsoft.System.StiString.isNullOrEmpty(handlerArgs.notice))
                Stimulsoft.System.StiError.showError(handlerArgs.notice, true, handlerArgs.success);

            if (callback) callback(handlerArgs);
        }
        Stimulsoft.handler.send(sendText, handlerCallback);
    }
}

StiHandler.prototype.send = function (data, callback) {
    let request = new XMLHttpRequest();
    try {
        request.open('post', this.url, true);
        request.setRequestHeader('Cache-Control', 'max-age=0, no-cache, no-store, must-revalidate');
        request.setRequestHeader('Pragma', 'no-cache');

        if (this.cookie)
            request.setRequestHeader('Cookie', this.cookie);

        if (this.csrfToken) {
            request.setRequestHeader('X-CSRFToken', this.csrfToken);
            request.setRequestHeader('X-CSRF-Token', this.csrfToken);
        }

        request.timeout = this.timeout * 1000;
        request.onload = function () {
            if (request.status === 200) {
                let responseText = request.responseText;
                request.abort();

                try {
                    let args = Stimulsoft.Report.Dictionary.StiSqlAdapterService.decodeCommandResult(responseText);
                    if (args.report) {
                        let json = args.report;
                        args.report = new Stimulsoft.Report.StiReport();
                        args.report.load(json);
                    }

                    callback(args);
                }
                catch (e) {
                    Stimulsoft.System.StiError.showError(e.message);
                }
            } else {
                Stimulsoft.System.StiError.showError('Server response error: [' + request.status + '] ' + request.statusText);
            }
        };
        request.onerror = function (e) {
            let errorMessage = 'Connect to remote error: [' + request.status + '] ' + request.statusText;
            Stimulsoft.System.StiError.showError(errorMessage);
        };
        request.send(data);
    }
    catch (e) {
        let errorMessage = 'Connect to remote error: ' + e.message;
        Stimulsoft.System.StiError.showError(errorMessage);
        request.abort();
    }
}

StiHandler.prototype.https = function (data, callback) {
    let uri = require('url').parse(this.url);
    let options = {
        host: uri.hostname,
        port: uri.port,
        path:  uri.path,
        method: 'POST',
        timeout: this.timeout * 1000,
        headers: {
            'Cache-Control': 'max-age=0, no-cache, no-store, must-revalidate',
            'Pragma': 'no-cache',
            'Cookie': this.cookie,
            'X-CSRFToken': this.csrfToken,
            'X-CSRF-Token': this.csrfToken
        }
    }

    let responseText = '';
    let module = uri.protocol.replace(':', '');
    let request = require(module).request(options, function (response) {

        response.on('data', function (buffer) {
            responseText += buffer;
        });

        response.on('end', function () {
            try {
                let args = Stimulsoft.Report.Dictionary.StiSqlAdapterService.decodeCommandResult(responseText);
                if (args.report) {
                    let json = args.report;
                    args.report = new Stimulsoft.Report.StiReport();
                    args.report.load(json);
                }

                callback(args);
            }
            catch (e) {
                console.log('ResponseError: ' + e.message);
                console.log(responseText);
                process.exit(1);
            }
        });
    });

    request.on('error', function (e) {
        console.log('RequestError: ' + e.message);
        process.exit(1);
    });

    request.on('timeout', function () {
        console.log('RequestError: Timeout ' + this.timeout + 'ms');
        process.exit(2);
    });

    request.write(data);
    request.end();
}

StiHandler.prototype.setOptions = function () {
    Stimulsoft.Report.StiOptions.WebServer.timeout = this.timeout;
    Stimulsoft.Report.StiOptions.WebServer.encryptData = this.encryptData;
    Stimulsoft.Report.StiOptions.WebServer.passQueryParametersToReport = this.passQueryParametersToReport;
    Stimulsoft.Report.StiOptions.WebServer.checkDataAdaptersVersion = this.checkDataAdaptersVersion;
    Stimulsoft.Report.StiOptions.Engine.escapeQueryParameters = this.escapeQueryParameters;
}

StiHandler.prototype.isNullOrEmpty = function (value) {
    return value == null || value === '' || value === undefined;
}

StiHandler.prototype.getVariables = function (variables) {
    if (variables) {
        for (let variable of variables) {
            if (variable.type === 'DateTime' && variable.value != null)
                variable.value = variable.value.toString('YYYY-MM-DD HH:mm:ss');
        }
    }

    return variables;
}

StiHandler.prototype.copySettings = function (from, to) {
    for (let key in from) {
        if (to.hasOwnProperty(key) && typeof to[key] != 'function') {
            if (key == 'encoding') to[key] = eval(from[key]);
            else if (key == 'pageRange') Stimulsoft.handler.copySettings(from[key], to[key]);
            else if (typeof to[key] != 'object' && typeof from[key] == typeof to[key]) to[key] = from[key];
        }
    }
}

function StiHandler() {
    this.url = {url};
    this.timeout = {timeout};
    this.encryptData = {encryptData};
    this.passQueryParametersToReport = {passQueryParametersToReport};
    this.checkDataAdaptersVersion = {checkDataAdaptersVersion};
    this.escapeQueryParameters = {escapeQueryParameters};
    this.databases = {databases};
    this.frameworkType = {framework};
    this.cookie = {cookie};
    this.csrfToken = {csrfToken};
    this.setOptions();
}

setTimeout(function () {
    let stimulsoft = Stimulsoft || {};
    stimulsoft.handler = new StiHandler();
})
