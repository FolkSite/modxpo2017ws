var modxpo2017ws = function (config) {
    config = config || {};
    modxpo2017ws.superclass.constructor.call(this, config);
};
Ext.extend(modxpo2017ws, Ext.Component, {
    page: {}, window: {}, grid: {}, tree: {}, panel: {}, combo: {}, config: {}, view: {}, utils: {}
});
Ext.reg('modxpo2017ws', modxpo2017ws);

modxpo2017ws = new modxpo2017ws();