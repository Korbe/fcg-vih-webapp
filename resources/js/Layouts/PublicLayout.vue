<template>

    <Head :title="title" />

    <Banner />

    <SplashScreen />

    <slot />

    <Footer/>

</template>

<script setup>
import Banner from '@/Jetstream/Banner.vue'
import Footer from "@/Partials/Footer.vue";
import SplashScreen from '@/Partials/SplashScreen.vue';
import { Head } from '@inertiajs/vue3';

defineProps({
    title: String,
});
</script>
