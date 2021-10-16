import ViewManager from "./ViewManager";

window.ViewManager = ViewManager;

ViewManager.register("certificados", function () {
    require("./certificados")
});
ViewManager.register("app", function () {
    const app = new Vue({
        el: '#app',
    });
});
ViewManager.register("calendar", function () {

    const calendar = new Vue({
        el: '#app',
    });
});



