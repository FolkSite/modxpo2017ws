modxpo2017ws.page.Home = function (config) {
    config = config || {};
    Ext.applyIf(config, {
        components: [{
            xtype: 'modxpo2017ws-panel-home',
            renderTo: 'modxpo2017ws-panel-home-div'
        }]
    });
    modxpo2017ws.page.Home.superclass.constructor.call(this, config);
};
Ext.extend(modxpo2017ws.page.Home, MODx.Component);
Ext.reg('modxpo2017ws-page-home', modxpo2017ws.page.Home);