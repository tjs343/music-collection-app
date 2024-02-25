<template>
    <Navbar></Navbar>
    <div class="app-container__main">
      <Header></Header>
      <div class="app-container__page">
        <h1>HOME</h1>
        
        <p>{{ message }}</p>
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
      pageTitle: 'Page Title',
      message: '' // Initialize items as an empty array
    };
  },
  mounted() {
    // Call fetchData method when the component is mounted
    this.fetchData();
  },
  components: {
    Header,
    Navbar
  },
  methods: {
    fetchData() {
      // Use Axios to make a GET request to your local API endpoint
      axios.get('/api/test-me')
        .then(response => {
          // Set the items data to the fetched data
          console.log(response.data);
          this.message = response.data;
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