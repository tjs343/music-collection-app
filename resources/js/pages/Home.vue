<template>
    <Header></Header>
    <div>
        <h1>HOME</h1>
        <router-link to="/artists"> Take me to Test page </router-link>
        <p>{{ message }}</p>
    </div>
</template>

<script>
import Header from '../components/header.vue';

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
    Header
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