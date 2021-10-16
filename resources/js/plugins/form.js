import Errors from './error';

let axios = require('axios');
export default class Form {
    constructor(form_id, method, action) {
        this.setFormId(form_id, method, action);
    }

    setFormId(form_id, method, action) {
        this.$elForm = form_id;

        if (form_id) {
            if (form_id instanceof HTMLElement) {
                this.$elForm = form_id;
            } else if (typeof form_id === 'object' && form_id.$el) {
                this.$elForm = form_id.$el;
            } else {
                if (typeof form_id === "string")
                    this.$elForm = document.getElementById(form_id);
            }
        }
        let form = this.$elForm;
        if (!form) {
            this.method = method;
            this.action = action;
        } else {

            if (form.hasAttribute("method"))
                this.method = form.getAttribute('method').toLowerCase();
            else this.method = method;
            if (form.hasAttribute("action"))
                this.action = form.getAttribute('action');
            else this.action = action;
            this['__refresh'] = form.getAttribute('form-refresh');
            let name = undefined;
            let type = undefined;
            for (let form_element of form.getElementsByTagName("input")) {
                if (form_element.getAttribute('id') == 'global-search') {
                    continue;
                }

                name = form_element.getAttribute('name');
                type = form_element.getAttribute('type');
                let value = form_element.getAttribute('data-value');

                if (name == 'method') {
                    continue;
                }

                if (form_element.getAttribute('data-item')) {
                    if (!this['items']) {
                        this.setAttribute('items', {0: {}})
                    }

                    if (!this['items'][0][form_element.getAttribute('data-item')]) {
                        this['items'][0][form_element.getAttribute('data-item')] = '';
                    }

                    this['item_backup'] = this['items'];

                    continue;
                }
                let dataField = form_element.getAttribute('data-field');

                if (dataField) {
                    if (!this[dataField]) {
                        this[dataField] = {};
                    }

                    if (!this[dataField][name]) {
                        this[dataField][name] = '';
                    }

                    continue;
                }

                if (type == 'radio') {
                    if (!this[name]) {
                        this[name] = (form_element.getAttribute('value') ? 1 : 0) || 0;
                    }
                } else if (type == 'checkbox') {
                    if (this[name]) {
                        if (!this[name].push) {
                            this[name] = [this[name]];
                        }

                        if (form_element.checked) {
                            this[name].push(form_element.value || value);
                        }
                    } else {
                        if (form_element.checked) {
                            this[name] = form_element.value || value;
                        } else {
                            this[name] = [];
                        }
                    }
                } else {
                    this[name] = form_element.getAttribute('value') || value || '';
                }
            }

            for (let form_element of form.getElementsByTagName("textarea")) {
                name = form_element.getAttribute('name');
                let value = form_element.getAttribute('data-value');

                if (name == 'method') {
                    continue;
                }

                if (form_element.getAttribute('data-item')) {
                    if (!this['items']) {
                        var item = {};
                        var row = {};

                        item[0] = row;
                        this['items'] = item;
                    }

                    if (!this['items'][0][form_element.getAttribute('data-item')]) {
                        this['items'][0][form_element.getAttribute('data-item')] = '';
                    }

                    this['item_backup'] = this['items'];

                    continue;
                }

                if (form_element.getAttribute('data-field')) {
                    if (!this[form_element.getAttribute('data-field')]) {
                        var field = {};

                        this[form_element.getAttribute('data-field')] = field;
                    }

                    if (!this[form_element.getAttribute('data-field')][name]) {
                        this[form_element.getAttribute('data-field')][name] = '';
                    }

                    continue;
                }

                if (this[name]) {
                    if (!this[name].push) {
                        this[name] = [this[name]];
                    }
                    this[name].push(form_element.value || value || '');
                } else {
                    this[name] = form_element.value || value || '';
                }
            }

            for (let form_element of form.getElementsByTagName("select")) {
                name = form_element.getAttribute('name');
                let value = form_element.getAttribute('data-value');
                if (name == 'method') {
                    continue;
                }

                if (form_element.getAttribute('data-item')) {
                    if (!this['items']) {
                        var item = {};
                        var row = {};

                        item[0] = row;
                        this['items'] = item;
                    }

                    if (!this['items'][0][form_element.getAttribute('data-item')]) {
                        this['items'][0][form_element.getAttribute('data-item')] = '';
                    }

                    this['item_backup'] = this['items'];

                    continue;
                }

                if (form_element.getAttribute('data-field')) {
                    if (!this[form_element.getAttribute('data-field')]) {
                        var field = {};

                        this[form_element.getAttribute('data-field')] = field;
                    }

                    if (!this[form_element.getAttribute('data-field')][name]) {
                        this[form_element.getAttribute('data-field')][name] = '';
                    }

                    continue;
                }

                if (this[name]) {
                    if (!this[name].push) {
                        this[name] = [this[name]];
                    }
                    this[name].push(form_element.getAttribute('value') || value || '');
                } else {
                    this[name] = form_element.getAttribute('value') || value || '';
                }
            }
        }
        this.errors = new Errors();

        this.loading = false;

        this.response = {};
    }

    moment(args) {
        return moment(args)
    }

    setDateRangeEvent($event) {
        if ($event.start instanceof Date && $event.end instanceof Date) {
            this['available_start_at'] = this.moment($event.start).format("YYYY-MM-DD");
            this['available_end_at'] = this.moment($event.end).format("YYYY-MM-DD");
        } else {
            this['available_start_at'] = null;
            this['available_end_at'] = null;
        }
    }

    getDateRangeEvent($event) {
        if ($event.start instanceof Date && $event.end instanceof Date) {
            return {
                start: this.moment($event.start).format("YYYY-MM-DD"),
                end: this.moment($event.end).format("YYYY-MM-DD")
            }
        } else {
            return {
                start: null,
                end: null,
            }
        }
    }

    setAttribute(key, value) {
        this[key] = value;
        return this;
    }

    setAttributeBs(key, value) {
        this[key] = value;
        return (event) => {
            this[key] = event;
        };
    }

    data() {
        let data = Object.assign({}, this);

        delete data.$elForm;
        delete data.method;
        delete data.action;
        delete data.errors;
        delete data.loading;
        delete data.response;
        delete data._token;
        delete data.__refresh;
        delete data['__refresh'];
        delete data[''];

        return data;
    }

    reset(args) {
        if (this.$elForm instanceof HTMLElement) {
            for (let form_element of this.$elForm.getElementsByTagName("input")) {
                var name = form_element.getAttribute('name');

                if (this[name]) {
                    this[name] = '';
                }
            }

            for (let form_element of this.$elForm.getElementsByTagName("textarea")) {
                var name = form_element.getAttribute('name');

                if (this[name]) {
                    this[name] = '';
                }
            }

            for (let form_element of this.$elForm.getElementsByTagName("select")) {
                var name = form_element.getAttribute('name');

                if (this[name]) {
                    this[name] = '';
                }
            }
        } else {
            console.log(this.$elForm)
        }
        if (Array.isArray(args)) {
            args.forEach(name => {
                this[name] = '';
            })
        }
    }

    oldSubmit() {
        this.loading = true;

        window.axios({
            method: this.method,
            url: this.action,
            data: this.data()
        })
            .then(this.onSuccess.bind(this))
            .catch(this.onFail.bind(this));
    }

    submit() {
        let data = this.data();
        this.loading = true;
        return new Promise((success, reject) => {
            Form.sendAxios(this.method, this.action, data)
                .then(response => {
                    success(response);
                    this.onSuccess(response);
                })
                .catch(response => {
                    this.onFail(response)
                    reject(response);
                })
        });
    }

    onSuccess(response) {
        this.errors.clear();

        this.loading = false;

        if (response.data.redirect) {
            this.loading = true;
            if (this.__refresh) {
                window.location.reload();
            } else {
                window.location.href = response.data.redirect;
            }
        }

        this.response = response.data;
        return response;
    }

    // Form fields check validation issue
    onFail(error) {
        this.errors.record(error.response.data.errors);
        this.loading = false;
        return error;
    }

    static sendAxios(method, action, _data) {

        let keys = Object.keys(_data);
        if (keys.indexOf("_token")) {
            delete _data['_token'];
        }
        let data = {};
        for (let k in keys) {
            let key = keys[k];
            if (!!key) {
                if (_data[key] instanceof Form) {
                    data[key] = _data[key].data();
                } else {
                    data[key] = _data[key];
                }
            }
        }
        let issetFiles = false;
        for (let k in keys) {
            let key = keys[k];
            if (data[key] instanceof File || data[key] instanceof Blob) {
                issetFiles = true;
            }
        }
        if (issetFiles) {
            let form_data = new FormData();
            form_data.appendRecursive(data);

            return axios({
                method: method,
                url: action,
                data: form_data,
                headers: {
                    'X-CSRF-TOKEN': window.Laravel.csrfToken,
                    'X-Requested-With': 'XMLHttpRequest',
                    'Content-Type': 'multipart/form-data'
                }
            });
        } else {
            return axios[method](action, data);
        }
    }
}
