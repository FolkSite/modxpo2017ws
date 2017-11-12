Ext.onReady(function () {
    modxpo2017ws.config.connector_url = OfficeConfig.actionUrl;

    var grid = new modxpo2017ws.panel.Home();
    grid.render('office-modxpo2017ws-wrapper');

    var preloader = document.getElementById('office-preloader');
    if (preloader) {
        preloader.parentNode.removeChild(preloader);
    }
});