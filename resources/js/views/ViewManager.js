import Vue from 'vue'

const _VueDefaultEventManager = new Vue();
export const VueDefaultEventManager = _VueDefaultEventManager;
export default class ViewManager {
    static data = new Map();
    static views = new Map();
    static events = new Map();

    static event() {
        return _VueDefaultEventManager;
    }

    static setData(key, value) {
        ViewManager.data.set(key, value);
    }

    static getData(key, value) {
        if (ViewManager.data.has(key)) {
            return ViewManager.data.get(key);
        } else {
            return value
        }
    }

    static registerEmit(key, event, callback) {
        let e = {}
        e[event] = callback;
        if (ViewManager.events.has(key)) {
            ViewManager.events.set(key, Object.assign({}, ViewManager.events.get(key), e))
        } else {
            ViewManager.events.set(key, e)
        }
    }

    static emit(key, event, obj) {
        if (ViewManager.events.has(key)) {
            let ev = ViewManager.events.get(key);
            if (typeof ev[event] === 'function') {
                ev[event].call(obj)
            }
        }
    }

    static register(key, callback) {
        ViewManager.views.set(key, callback)
    }

    static run(key, data) {
        if (ViewManager.views.has(key)) {
            ViewManager.views.get(key)(Object.assign({}, data));
        }
    }
}
