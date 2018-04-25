
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

const app = new Vue({
    el: '#app'
});


// Twitch Streams Embeds
let modals = document.querySelectorAll('.twitch-embed-modal');

if(modals.length){
    modals.forEach(function (modal) {
        let modal_body = modal.querySelector('.modal-body');

        let twitch_player = new Twitch.Player(
            modal_body, {
                width: '100%',
                height: 500,
                channel: modal.dataset.channel,
                layout: 'video',
                allowfullscreen: false,
                autoplay: false
            }
        );

        // play video on modal open
        $(modal).on('show.bs.modal', function () {
            twitch_player.play();
        })

        // pause video on modal close
        $(modal).on('hidden.bs.modal', function () {
            twitch_player.pause();
        })
    });
}
