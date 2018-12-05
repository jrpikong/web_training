
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('list-member', require('./components/ListMember.vue'));
Vue.component('list-quiz', require('./components/Admin/Quiz/ListQuiz'));
Vue.component('form-quiz', require('./components/Admin/Quiz/FormQuiz'));
Vue.component('start-quiz', require('./components/Front/StartQuiz'));
Vue.component('form-product', require('./components/Admin/Products/FormProduct'));
Vue.component('edit-form-product', require('./components/Admin/Products/EditFormProduct'));
Vue.component('follow-training-quiz', require('./components/user/FollowTrainingQuiz'));
Vue.component('training-quiz-form', require('./components/Admin/Training/TrainingQuizForm'));

const app_vue = new Vue({
    el: '#app'
});
