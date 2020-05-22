import Vue from 'vue';
import Profile from './ProfileComponent';

const app = new Vue.component('profile-details',{
    el: '#root',
    components: {Profile},
    template: '<profile-details></profile-details>'
});
