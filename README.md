# PHP and JavaScript samples for Stimulsoft Dashboards.PHP

#### This repository contains examples of integrating the Stimulsoft Dashboards.PHP analytics tool into PHP applications, using a set of PHP classes and functions that allow you to easily add a JavaScript report generator to PHP applications. The reporting components are fully compatible with PHP 5, PHP 7, and PHP 8 versions. The integration supports PHP and JavaScript code.

## Overview
This repository contains a PHP project ready to run. The 'index.php' file contains links to examples, each of which is located in a separate .php file:
* [Changing the Designer Theme](https://github.com/stimulsoft/Samples-Dashboards.PHP/blob/main/Changing%20the%20Designer%20Theme.php)
* [Editing a Dashboard in the Designer](https://github.com/stimulsoft/Samples-Dashboards.PHP/blob/main/Editing%20a%20Dashboard%20in%20the%20Designer.php)
* [Editing a Dashboard in the Designer using JavaScript](https://github.com/stimulsoft/Samples-Dashboards.PHP/blob/main/Editing%20a%20Dashboard%20in%20the%20Designer%20using%20JavaScript.php)
* [Exporting a Dashboard from Code](https://github.com/stimulsoft/Samples-Dashboards.PHP/blob/main/Exporting%20a%20Dashboard%20from%20Code.php)
* [How to Activate the Product](https://github.com/stimulsoft/Samples-Dashboards.PHP/blob/main/How%20to%20Activate%20the%20Product.php)
* [Loading Scripts in Part to Minify Project](https://github.com/stimulsoft/Samples-Dashboards.PHP/blob/main/Loading%20Scripts%20in%20Part%20to%20Minify%20Project.php)
* [Localizing the Designer](https://github.com/stimulsoft/Samples-Dashboards.PHP/blob/main/Localizing%20the%20Designer.php)
* [Registering a Data from Code](https://github.com/stimulsoft/Samples-Dashboards.PHP/blob/main/Registering%20a%20Data%20from%20Code.php)
* [Saving a Dashboard on the Server-Side](https://github.com/stimulsoft/Samples-Dashboards.PHP/blob/main/Saving%20a%20Dashboard%20on%20the%20Server-Side.php)
* [Sending an Exported Dashboard to the Server-Side](https://github.com/stimulsoft/Samples-Dashboards.PHP/blob/main/Sending%20an%20Exported%20Dashboard%20to%20the%20Server-Side.php)
* [Showing a Dashboard in the Viewer](https://github.com/stimulsoft/Samples-Dashboards.PHP/blob/main/Showing%20a%20Dashboard%20in%20the%20Viewer.php)
* [Showing a Dashboard in the Viewer using JavaScript](https://github.com/stimulsoft/Samples-Dashboards.PHP/blob/main/Showing%20a%20Dashboard%20in%20the%20Viewer%20using%20JavaScript.php)
* [Using SQL Data Sources](https://github.com/stimulsoft/Samples-Dashboards.PHP/blob/main/Using%20SQL%20Data%20Sources.php)
  
One event handler has been created with all the necessary events for each example:
* [handler.php](https://github.com/stimulsoft/Samples-Dashboards.PHP/blob/main/handler.php)

## Running samples
The samples folder contains all the scripts and resources of the project, including the 'index.php' file. So all files from this folder are required to be copied on your PHP server, using FTP or HTTP access interface - depending on your hosting provider.

After that, in your browser, you can navigate to the following address:  
http://your-domain-name/index.php

If you are using a PHP server installed on your local development computer:  
http://localhost/index.php

## Composer
Additionally, the examples are ready to work with the [Composer](https://getcomposer.org/) dependency manager. You can use the specified command to update the product and all dependencies to the latest available version:

```
composer require stimulsoft/dashboards-php
```

## About Stimulsoft Dashboards.PHP
Stimulsoft Dashboards.PHP is a complete software package for designing and viewing dashboards. You may use the tool for integration into your applications or as a standalone solution. At the same time, no complex configuration or third-party modules are required. You may easily integrate dashboards into almost any PHP application, including those built on the Laravel framework.

## Useful links
* [Live Demo](http://demo.stimulsoft.com/#Js)
* [Product Page](https://www.stimulsoft.com/en/products/dashboards-php)
* [Composer Package](https://packagist.org/packages/stimulsoft/dashboards-php)
* [Free Download](https://www.stimulsoft.com/en/downloads)
* [Documentation](https://www.stimulsoft.com/en/documentation/online/programming-manual/reports_and_dashboards_for_php.htm)
* [License](LICENSE.md)
