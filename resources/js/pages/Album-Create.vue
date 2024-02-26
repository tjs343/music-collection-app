<template>
    <Navbar></Navbar>
    <div class="app-container__main">
        <Header></Header>
        <div class="app-container__page">
            <div v-if="isLoading" class="loading-spinner"><v-progress-circular color="#3686FF" indeterminate></v-progress-circular></div>
            <div v-if="!isLoading">
                <h1>Create Album</h1>
                <v-form @submit.prevent="submitForm">
                    <v-select
                        v-model="albumData.artist_id"
                        :items="artists"
                        item-title="name"
                        item-value="id"
                        label="Select an Artist"
                    ></v-select>
                    <v-text-field v-model="albumData.title" label="Album Title"></v-text-field>
                    <v-text-field v-model="albumData.release_year" label="Release Year"></v-text-field>
                    <v-btn type="submit">Add Album</v-btn>
                </v-form>
                <v-snackbar
                    v-model="snackbar"
                    >
                    wefewf

                    <template v-slot:actions>
                        <v-btn
                        color="pink"
                        variant="text"
                        @click="snackbar = false"
                        >
                        Close
                        </v-btn>
                    </template>
                </v-snackbar>
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
        pageTitle: 'MP MCA - Add Album',
        artists: [],
        albumData: {
            title: '',
            release_year: '',
            artist_id: null
        },
        isLoading: true,
        snackbar: false
    };
  },
  mounted() {
    this.fetchArtists();
  },
  methods: {
    fetchArtists() {
        axios.get('/api/artists')
        .then(response => {
            var artistResponse = response.data;
            const simpleArtists = [];
            for (let i = 0; i < artistResponse.length ; i++) {
                simpleArtists.push({id: artistResponse[i][0].id, name: artistResponse[i][0].name});
            }
            this.artists = simpleArtists;
            this.isLoading = false;
            
        })
        .catch(error => {
            console.error('Error fetching artist information:', error);
        });
    },
    async submitForm() {
        axios.post('/api/album-create', this.albumData)
        .then(response => {
          console.log('Resource created:', response.data);
          this.snackbar = true;
        })
        .catch(error => {
          console.error('Error creating resource:', error);
        });
    }
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