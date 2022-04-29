<template>
    <public-layout title="Predigten">
        <div class="relative bg-white overflow-hidden">
            <div class="max-w-7xl mx-auto ">
                <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-3xl lg:w-full lg:pb-28 xl:pb-32">
                    <svg class="hidden lg:block absolute right-0 inset-y-0 h-full w-48 text-white transform translate-x-1/2" fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none"
                         aria-hidden="true">
                        <polygon points="50,0 100,0 50,100 0,100"/>
                    </svg>

                    <Nav/>

                    <main class="mt-16 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28 ">
                        <div class="sm:text-center lg:text-left">
                            <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                                <span class="block xl:inline">Gottes Wort zum</span>
                                {{ ' ' }}
                                <span class="block text-brand-primary xl:inline">anhören</span>

                            </h1>
                            <p class="mt-3 text-xl text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">
                                Hören Sie sich unsere Predigten ganz bequem an. Bleiben Sie auf dem Laufenden über die neuesten Predigten von FCG Villach.
                            </p>
                            <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                                <div class="rounded-md shadow">
                                    <button @click="playFirstPost"
                                            class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-white bg-brand-primary hover:bg-brand-primary-400 md:py-4 md:text-lg md:px-10">
                                        <PlayIcon class="h-7 mr-1"/>
                                        <span>Predigt anhören</span>
                                    </button>
                                </div>
                                <div class="mt-3 sm:mt-0 sm:ml-3">
                                    <Link :href="route('public.blog') + '#posts'"
                                          class="w-full flex items-center justify-center px-8 py-3 border border-transparent text-base font-medium rounded-md text-brand-secondary-700 bg-brand-secondary-200 hover:bg-brand-secondary-300 hover:text-white md:py-4 md:text-lg md:px-10">
                                        Alle Predigten
                                    </Link>
                                </div>
                            </div>
                        </div>
                    </main>
                </div>
            </div>
            <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
                <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="/images/predigt.jpg" alt=""/>
            </div>
        </div>

        <BlogList :posts="posts"/>

        <Footer/>
    </public-layout>
</template>

<script>
import BlogList from '../../Partials/BlogList'
import PublicLayout from "@/Layouts/PublicLayout";
import Nav from "@/Partials/Nav";
import Footer from "@/Partials/Footer";
import {PlayIcon} from "@heroicons/vue/outline";

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
        PlayIcon
    },
    methods: {
        playFirstPost() {
            let audio = document.getElementById("audio_0");
            audio.play();
        }
    }
}
</script>
