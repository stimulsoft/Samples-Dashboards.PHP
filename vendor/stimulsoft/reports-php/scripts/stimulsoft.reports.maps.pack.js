/*
Stimulsoft.Reports.JS
Version: 2023.1.7
Build date: 2023.02.10
License: https://www.stimulsoft.com/en/licensing/reports
*/
!function(v){var f;"object"==typeof exports&&"undefined"!=typeof module?module.exports=(f=require("./stimulsoft.reports.engine.pack"),Object.assign(f,v(f.Stimulsoft))):"function"==typeof define&&define.amd?define(["./stimulsoft.reports.engine.pack"],f=>Object.assign(f,v(f.Stimulsoft))):Object.assign(window,v(window.Stimulsoft))}(function(f){var v={Stimulsoft:f||{}};return f&&"2023.1.7"!==f.__engineVersion&&console.warn("Scripts versions mismatch: engine ver. = %s; maps ver. = 2023.1.7",f.__engineVersion),
,v.Stimulsoft.decodePackedData&&(Object.assign(v,v.Stimulsoft.decodePackedData(v.Stimulsoft.mapsScript)(v.Stimulsoft)),delete v.Stimulsoft.mapsScript),v});