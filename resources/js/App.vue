<template>
    <router-view v-slot="{ Component, route }">
        <div :key="route.name" class="app-container">
            <Component :is="Component" />
        </div>
    </router-view>
</template>