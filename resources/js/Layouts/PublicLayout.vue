<template>

    <Head :title="title" />

    <jet-banner />

    <slot/>

</template>

<script>
import JetBanner from '@/Jetstream/Banner.vue'
import Header from "@/Partials/Header";
import Footer from "@/Partials/Footer";
import Nav from "@/Partials/Nav";
import { Head } from '@inertiajs/inertia-vue3';

export default {
    name: "PublicLayout",
    components: {Nav, Footer, Head, JetBanner},
    props: {
        title: String,
    },
}
</script>
