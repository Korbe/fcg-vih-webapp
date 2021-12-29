<template>
    <public-layout>
        <HeroHome/>
        <WeekPsalm />
        <EventsHome />
<!--        <News/>-->
        <BlogHome />
    </public-layout>
</template>

<script>
import HeroHome from './partials/HeroHome.vue'
import News from './partials/News.vue'
import Cta from './partials/Cta.vue'
import PublicLayout from "@/Layouts/PublicLayout";
import EventsHome from "@/Pages/Public/partials/EventsHome";
import BlogHome from "@/Pages/Public/partials/BlogHome";
import WeekPsalm from "@/Pages/Public/partials/WeekPsalm";
import TeamHome from "@/Pages/Public/partials/Team";

export default {
    name: 'Home',
    components: {
        TeamHome,
        WeekPsalm,
        BlogHome,
        EventsHome,
        PublicLayout,
        HeroHome,
        News,
        Cta,
    },
}
</script>
