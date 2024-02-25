<template>
    <Navbar></Navbar>
    <div class="app-container__main">
      <Header></Header>
      <div class="app-container__page">
        <div v-if="isLoading" class="loading-spinner"><v-progress-circular color="#3686FF" indeterminate></v-progress-circular></div>
        <div v-if="!isLoading">
          <h1>Artists</h1>        
          <div class="artist-list">
                <div v-for="artist in artists">
                    <div class="artist">
                        <SVGIcon name="artist" />
                        <p>{{ artist[0].name }}</p>
                        <a target="_blank" :href="generateXLink(artist[0].twitter)">{{ artist[0].twitter }}</a>
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

import axios from 'axios';

export default {
  data() {
    return {
      pageTitle: 'MP - MCA',
      artists: [],
      isLoading: true
    };
  },
  mounted() {
    this.fetchArtists();
  },
  components: {
    Header,
    Navbar,
    SVGIcon
  },
  methods: {
    fetchArtists() {
        axios.get('/api/artists')
        .then(response => {
            console.log(response.data);

            this.artists = response.data;
            this.isLoading = false;
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
    },
    generateXLink(handle) {
        return `https://twitter.com/${handle}`;
    }
  }
};
</script>

<style lang="scss">
@import '../../sass/artists.scss';
</style>