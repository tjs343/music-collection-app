<template>
    <Navbar></Navbar>
    <div class="app-container__main">
      <Header></Header>
      <div class="app-container__page">
        <h1>Albums</h1>
        
        
        <div class="album-list">
            <router-link v-for="album in albums" :to="generateAlbumURL(album.id)">
                <SVGIcon name="cd" />
                {{ album.title }}
                
            </router-link>
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
      albums: [] // Initialize items as an empty array
    };
  },
  mounted() {
    // Call fetchData method when the component is mounted
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
            console.log(response.data);
            this.albums = response.data;
        })
        .catch(error => {
            console.error('Error fetching data:', error);
        });
    },
    generateAlbumURL(albumID) {
      // Simple method for generating the album's URL
      return `/album/${albumID}`;
    }
  }
};
</script>

<style lang="scss">
@import '../../sass/albums.scss';
</style>