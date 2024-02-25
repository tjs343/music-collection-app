<template>
    <Navbar></Navbar>
    <div class="app-container__main">
      <Header></Header>
      <div class="app-container__page">
        <h1>Info</h1>
        <div class="info-panel">
            <p>This application was built using the PHP framework <a href="https://laravel.com/" target="_blank">Laravel</a> and uses <a href="https://vuejs.org/" target="_blank">Vue.js</a> for handling the front-end.</p>
            <p>Laravel is used to permanently store album information, as well as provide access to the remote Artist Data API using a library called GuzzleHTTP.</p>
            <p>Data is passed between the Vue front-end and the Laravel API endpoints using Axios. Although URL paths are shown in the browser's address bar - the Vue Router intercepts navigation events triggered by the user and dynamically updates the DOM to display the requested page.</p>
            <p>I deliberately decided not to permanently store any of the artist information anywhere in the site; this means whenever you seen any data pertaining to an artist, it has been fetched over the network. This can *sometimes* cause the 'Albums' index page to take a while to load as the provided API endpoint likes to take a while to respond sometimes. If this was a real-world application it would make sense to either store the artist information in a DB or use Laravel's built-in caching functionality.</p>
            <hr />
            <p>List of technologies used:</p>
            <ul>
                <li>PHP</li>
                <li>Vue 3</li>
                <li>Axios</li>
                <li>GuzzleHTTP</li>
                <li>Vite</li>
                <li>Sass</li>
            </ul>
        </div>
      </div>
    </div>
</template>

<script>
import Header from '../components/Header.vue';
import Navbar from '../components/Navbar.vue';

import axios from 'axios';

export default {
  data() {
    return {
      pageTitle: 'MP MCA - Info',
    };
  },
  components: {
    Header,
    Navbar,
  }
};
</script>

<style lang="scss">
@import '../../sass/info.scss';
</style>