<template>
    <public-layout title="Predigten">


        <header class="relative h-screen">
            <div class="absolute inset-0 ">
                <img class="w-full h-full object-cover" src="/images/predigt.jpg" alt=""/>
            </div>

            <Nav hasBackground blueMobileButton/>

            <div class="relative px-4 pt-16 sm:px-6 sm:py-24 lg:pt-32 lg:px-8">
                <h1 class="text-center text-4xl font-extrabold tracking-tight sm:text-5xl lg:text-6xl">
                    <span class="block text-white">Gottes Wort zum</span>
                    {{ ' ' }}
                    <span class="block text-brand-primary">anhören</span>
                </h1>
                <p class="mt-6 max-w-lg mx-auto text-center text-xl text-white sm:max-w-3xl">Hören Sie sich unsere Predigten ganz bequem an. Bleiben Sie auf dem Laufenden über die neuesten Predigten von FCG Villach.</p>

                <div class="mt-10 max-w-sm mx-auto sm:max-w-none sm:flex sm:justify-center">
                    <div class="space-y-4 sm:space-y-0 sm:mx-auto sm:inline-grid sm:grid-cols-2 sm:gap-5">
                        <a href="#" @click.prevent="playFirstPost"
                              class="flex items-center justify-center px-4 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-brand-primary hover:bg-brand-primary-400 sm:px-8"><PlayIcon class="h-7 mr-3"/>Neueste Predigt anhören</a>
                        <a id="all-posts" :href="route('public.blog') + '#posts'"
                           class="flex items-center justify-center px-4 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-brand-secondary hover:bg-brand-secondary-400 sm:px-8"><CollectionIcon class="h-7 mr-3"/> Alle Predigten </a>
                    </div>
                </div>
            </div>

        </header>

        <div id="posts" class="bg-gradient-to-b from-white to-gray-100">
            <div class="max-w-4xl mx-auto py-32 px-4">
                <blog-list :posts="posts"/>
            </div>
        </div>

        <Footer/>
    </public-layout>
</template>

<script>
import BlogList from '../../Partials/BlogList'
import PublicLayout from "@/Layouts/PublicLayout";
import Nav from "@/Partials/Nav";
import Footer from "@/Partials/Footer";
import {CollectionIcon, PlayIcon} from "@heroicons/vue/outline";

export default {
    name: 'Blog',

    props: {
        posts: Object,
    },
    components: {
        Footer,
        Nav,
        PublicLayout,
        BlogList,
        PlayIcon,
        CollectionIcon
    },
    methods: {
        playFirstPost() {
            document.getElementById('all-posts').click();
            document.getElementById("play_button_0").click();
            document.getElementById("play_button_0").focus();
        }
    }
}
</script>
