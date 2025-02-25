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
import PublicLayout from "@/Layouts/PublicLayout.vue";
import Hero from '@/Partials/Home/Hero.vue'
import Testimonials from "@/Partials/Home/Testimonials.vue";
import Cta from "@/Partials/Home/Cta.vue";
import Footer from "@/Partials/Footer.vue";
import Faq from "@/Partials/Faq.vue";
import News from "@/Partials/Home/News.vue";
import VisitUs from "@/Partials/Home/VisitUs.vue";
import Welcome from "@/Partials/Home/Welcome.vue";

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
