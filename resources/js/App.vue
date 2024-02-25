<template>
    <router-view v-slot="{ Component, route }">
        <div :key="route.name" class="app-container">
            <Component :is="Component" />
        </div>
    </router-view>
</template>

<style lang="scss">
@import '../sass/typography.scss';
</style>