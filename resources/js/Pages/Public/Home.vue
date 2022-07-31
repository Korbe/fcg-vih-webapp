<template>
    <public-layout title="Home">

        <hero/>

        <welcome/>

        <visit-us/>

        <news :items="news" />

        <testimonials/>

        <faq/>

        <cta/>

        <Footer/>

    </public-layout>
</template>

<script>
import PublicLayout from "@/Layouts/PublicLayout";
import Hero from '../../Partials/Home/Hero.vue'
import Testimonials from "@/Partials/Home/Testimonials";
import Cta from "@/Partials/Home/Cta";
import Footer from "@/Partials/Footer";
import Faq from "@/Partials/Faq";
import News from "@/Partials/Home/News";
import VisitUs from "@/Partials/Home/VisitUs";
import Welcome from "@/Partials/Home/Welcome";

export default {
    name: 'Home',
    components: {
        Welcome,
        VisitUs,
        News,
        Faq,
        Footer,
        Cta,
        Testimonials,
        PublicLayout,
        Hero
    },
    props: {
        news: Array,
    },
}
</script>
