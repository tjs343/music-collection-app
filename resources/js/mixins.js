export const mcaMixins = {
    methods: {
      async fetchArtists() {
        try {
          const artistResponse = await axios.get('/api/artists');
          const simpleArtists = [];
          for (let i = 0; i < artistResponse.data.length ; i++) {
              simpleArtists.push({
                id: artistResponse.data[i][0].id,
                name: artistResponse.data[i][0].name,
                twitter: artistResponse.data[i][0].twitter
              });
          }
          return simpleArtists;
        } catch(error) {
          console.error('Error fetching data:', error);
          throw error;
        }
      }
    }
  };