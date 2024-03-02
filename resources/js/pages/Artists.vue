<template>
    <Navbar></Navbar>
    <div class="app-container__main">
      <Header :pagename="pageTitle"></Header>
      <div class="app-container__page">
        <div v-if="isLoading" class="loading-spinner"><v-progress-circular color="#3686FF" indeterminate></v-progress-circular></div>
        <div v-if="!isLoading">  
          <div class="artist-list">
            <div v-for="artist in artists">
                <div class="artist">
                  <SVGIcon name="artist" />
                  <p>{{ artist.name }}</p>
                  <a target="_blank" :href="generateXLink(artist.twitter)">{{ artist.twitter }}</a>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
</template>

<script>
import Header from '../components/Header.vue';
import Navbar from '../components/Navbar.vue';
import SVGIcon from '../components/SVGIcon.vue';
import { mcaMixins } from '../mixins.js';

import axios from 'axios';

export default {
  data() {
    return {
      pageTitle: 'List of Artists',
      artists: [],
      isLoading: true
    };
  },
  mounted() {
    this.fetchArtists()
      .then(data => {
        this.artists = data;
        this.isLoading = false;
      })
      .catch(error => {
        // Handle error
      });
  },
  components: {
    Header,
    Navbar,
    SVGIcon
  },
  mixins: [mcaMixins],
  methods: {
    generateXLink(handle) {
        return `https://twitter.com/${handle}`;
    }
  }
};
</script>

<style lang="scss">
@import '../../sass/artists.scss';
</style>