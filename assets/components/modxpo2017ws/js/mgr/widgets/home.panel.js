modxpo2017ws.panel.Home = function (config) {
    config = config || {};
    Ext.apply(config, {
        baseCls: 'modx-formpanel',
        layout: 'anchor',
        /*
         stateful: true,
         stateId: 'modxpo2017ws-panel-home',
         stateEvents: ['tabchange'],
         getState:function() {return {activeTab:this.items.indexOf(this.getActiveTab())};},
         */
        hideMode: 'offsets',
        items: [{
            html: '<h2>' + _('modxpo2017ws') + '</h2>',
            cls: '',
            style: {margin: '15px 0'}
        }, {
            xtype: 'modx-tabs',
            defaults: {border: false, autoHeight: true},
            border: true,
            hideMode: 'offsets',
            items: [{
                title: _('modxpo2017ws_items'),
                layout: 'anchor',
                items: [{
                    html: _('modxpo2017ws_intro_msg'),
                    cls: 'panel-desc',
                }, {
                    xtype: 'modxpo2017ws-grid-items',
                    cls: 'main-wrapper',
                }]
            }]
        }]
    });
    modxpo2017ws.panel.Home.superclass.constructor.call(this, config);
};
Ext.extend(modxpo2017ws.panel.Home, MODx.Panel);
Ext.reg('modxpo2017ws-panel-home', modxpo2017ws.panel.Home);
