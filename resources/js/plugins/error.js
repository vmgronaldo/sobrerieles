export default class Errors {
    constructor() {
        this.errors = {};
    }

    has(field) {
        // if this.errors contains as "field" property.
        return this.errors.hasOwnProperty(field);
    }

    any() {
        return Object.keys(this.errors).length > 0;
    }

    set(key, field) {
        return this.errors[key] = field;
    }

    get(field) {
        if (this.errors[field]) {
            return this.errors[field][0];
        }
    }

    first(field) {
        if (this.errors[field]) {
            return this.errors[field][0];
        }
    }

    record(errors) {
        if (typeof errors === 'object' && Object.keys(errors).length > 0) {
            this.errors = Object.assign({}, errors);
        } else {
            this.errors = {};
        }
    }

    size() {
        return Object.keys(this.errors).length
    }

    _getErrors() {
        return Object.keys(this.errors).map((k) => {
            if (Array.isArray(this.errors[k]) && this.errors[k].length > 0) {
                return this.errors[k][0]
            } else {
                return null
            }
        }).filter((v) => v != null)
    }

    getErrors() {
        return this._getErrors()
    }

    clear(field) {
        if (field) {
            return delete this.errors[field];
        }

        this.errors = {};
    }
}
