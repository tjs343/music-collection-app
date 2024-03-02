<template>
    <Navbar></Navbar>
    <div class="app-container__main">
      <Header :pagename="pageTitle"></Header>
      <div class="app-container__page">
        <div v-if="isLoading" class="loading-spinner"><v-progress-circular color="#3686FF" indeterminate></v-progress-circular></div>
        <div v-if="!isLoading">       
          <div class="album-list">
              <router-link v-for="album in albums" :to="generateAlbumURL(album.id)">
                <SVGIcon name="cd" />
                <p class="txt-album-name">{{ album.title }}</p>
                <p class="txt-artist-name">{{ album.artist_name }}</p>     
                <p class="txt-release-year">{{ album.release_year }}</p>
              </router-link>
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
      pageTitle: 'List of Albums',
      albums: [],
      isLoading: true
    };
  },
  mounted() {
    this.fetchData();
  },
  components: {
    Header,
    Navbar,
    SVGIcon
  },
  methods: {
    fetchData() {
        axios.get('/api/albums')
        .then(response => {
            this.albums = response.data;
            this.isLoading = false;
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
    },
    generateAlbumURL(albumID) {
      return `/album-edit/${albumID}`;
    }
  }
};
</script>

<style lang="scss">
@import '../../sass/albums.scss';
</style>