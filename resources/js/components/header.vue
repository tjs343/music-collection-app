<template>
  <header>
    <p>{{ pagename }}</p>
  </header>
</template>

<script>
export default {
  props: {
    pagename: {
      type: String,
      required: true,
    },
  },
};
</script>

<style lang="scss">
@import "../../sass/header.scss";
</style>