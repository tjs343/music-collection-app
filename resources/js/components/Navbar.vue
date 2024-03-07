<template>
  <nav class="navbar">
    <router-link to="/"><SVGIcon name="dashboard" />Home </router-link>
    <router-link to="/artists"><SVGIcon name="artists" />Artists </router-link>
    <router-link to="/albums"><SVGIcon name="albums" />Albums </router-link>
    <router-link to="/album-create"><SVGIcon name="music-list" />Add Album </router-link>
  </nav>
</template>

<script>
import SVGIcon from "../components/SVGIcon.vue";
export default {
  components: {
    SVGIcon,
  },
};
</script>

<style lang="scss">
@import "../../sass/navbar.scss";
</style>