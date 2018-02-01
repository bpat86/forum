
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import InstantSearch from 'vue-instantsearch';

window.Vue = require('vue');

window.Vue.use(InstantSearch);

let authorizations = require('./authorizations');

window.Vue.prototype.authorize = function (...params) {

	//let user = window.App.user;
    if (! window.App.signedIn) return false;

    if (typeof params[0] === 'string') {
        return authorizations[params[0]](params[1]);
    }

    return params[0](window.App.user);
	//return user ? handler(user) : false;
};

window.Vue.prototype.signedIn = window.App.signedIn;

require('./bootstrap');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('flash', require('./components/Flash.vue'));
Vue.component('paginator', require('./components/Paginator.vue'));
Vue.component('user-notifications', require('./components/UserNotifications.vue'));
Vue.component('avatar-form', require('./components/AvatarForm.vue'));
Vue.component('wysiwyg', require('./components/Wysiwyg.vue'));

Vue.component('thread-view', require('./pages/Thread.vue'));

const app = new Vue({
    el: '#app'
});
