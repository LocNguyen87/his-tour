Nova.booting((Vue, router) => {
    Vue.component('index-params', require('./components/IndexField'));
    Vue.component('detail-params', require('./components/DetailField'));
    Vue.component('form-params', require('./components/FormField'));
})
