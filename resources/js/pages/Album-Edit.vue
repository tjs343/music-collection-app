<template>
    <Navbar></Navbar>
    <div class="app-container__main">
        <Header :pagename="pageTitle"></Header>
        <div class="app-container__page">
            <div v-if="isLoading" class="loading-spinner"><v-progress-circular color="#3686FF" indeterminate></v-progress-circular></div>
            <div v-if="!isLoading">
              <v-form @submit.prevent="submitForm">
                  <v-select
                      v-model="albumData.artist_id"
                      :items="artists"
                      item-title="name"
                      item-value="id"
                      label="Select an Artist"
                  ></v-select>
                  <span v-if="formErrors.artist_id" class="error">{{ formErrors.artist_id[0] }}</span>
                  <v-text-field v-model="albumData.title" label="Album Title"></v-text-field>
                  <span v-if="formErrors.title" class="error">{{ formErrors.title[0] }}</span>
                  <v-text-field v-model="albumData.release_year" label="Release Year"></v-text-field>
                  <span v-if="formErrors.release_year" class="error">{{ formErrors.release_year[0] }}</span>
                  <v-btn type="submit">Edit Album</v-btn>
              </v-form>
              <v-btn @click="deleteAlbum(albumData.id)" class="btn-delete">Delete album</v-btn>
              <v-snackbar
                v-model="snackbar"
                >
                Album has been edited! :)

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
import { mcaMixins } from '../mixins.js';
import axios from 'axios';

export default {
  props: ['id'],
  data() {
    return {
        pageTitle: 'Edit Album',
        artists: [],
        albumData: {
            title: '',
            release_year: '',
            artist_id: null
        },
        isLoading: true,
        snackbar: false,
        formErrors: {}
    };
  },
  mounted() {
    this.fetchAlbum(this.id);
    this.fetchArtists()
      .then(data => {
        this.artists = data;
        this.isLoading = false;
      })
      .catch(error => {
          console.error('Error fetching artist information:', error); 
      });
  },
  mixins: [mcaMixins],
  methods: {
    fetchAlbum(id) {
        axios.get('/api/album-edit/' + id)
        .then(response => {
            this.albumData = response.data;
        })
        .catch(error => {
            console.error('Error fetching album information:', error);            
        });
    },
    async submitForm() {
        axios.put('/api/album-update/' + this.id, this.albumData)
        .then(response => {
          this.snackbar = true;
          this.formErrors = {};
        })
        .catch(error => {
          if (error.response.status === 422) {
            this.formErrors = error.response.data.errors;
          } else {
            console.error('Error updating album:', error);
          }
        });
    },
    deleteAlbum(itemId) {
      if(confirm('Are you sure you want to delete this album?')) {
        axios.delete(`/api/album-delete/${itemId}`)
          .then(response => {
            this.$router.push('/albums');
          })
          .catch(error => {
            console.error('Error deleting album:', error);
          });
      }
    }
  },
  components: {
    Header,
    Navbar,
  }
};
</script>