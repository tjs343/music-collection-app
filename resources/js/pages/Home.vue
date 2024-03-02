<template>
    <Navbar></Navbar>
    <div class="app-container__main">
      <Header :pagename="pageTitle"></Header>
      <div class="app-container__page">
        <div class="stats-panel">
        <div class="stats-panel--grid-item">
          <p class="value">{{ stats.totalAlbums }}</p>
          <p>Albums Collected!</p>
        </div>
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
      pageTitle: 'Home',
      stats: {}
    };
  },
  mounted() {
    // Call fetchData method when the component is mounted
    this.fetchData();
  },
  components: {
    Header,
    Navbar,
  },
  methods: {
    fetchData() {
      // Use Axios to make a GET request to your local API endpoint
      axios.get('/api/stats')
        .then(response => {
          // Set the items data to the fetched data
          console.log(response.data);
          this.stats = response.data;
        })
        .catch(error => {
          console.error('Error fetching data:', error);
        });
    }
  }
};
</script>

<style lang="scss">
@import '../../sass/home.scss';
</style>