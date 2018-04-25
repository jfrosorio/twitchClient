
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
let embeds = document.querySelectorAll('.twitch-embed-modal');

if(embeds.length){
    let twitch_embeds = [];

    embeds.forEach(function (embed) {
        let twitch_embed = new Twitch.Embed(embed, {
            width: '100%',
            height: embed.dataset.videoHeight,
            channel: embed.dataset.channel,
            layout: 'video',
            autoplay: false
        });

        twitch_embed.addEventListener(Twitch.Embed.VIDEO_READY, () => {
            var player = twitch_embed.getPlayer();
            player.play();
        });

        twitch_embeds.push(twitch_embed);
    });
}
