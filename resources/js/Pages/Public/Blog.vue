<template>
    <public-layout title="Predigten">

        <div class="flex flex-col h-screen relative">

            <div class="absolute inset-0 ">
                <img loading="lazy" alt="" class="w-full h-full object-cover" src="/images/predigt.jpg"/>
            </div>

            <Navbar blueMobileButton hasBackground/>

            <div class="relative flex justify-center items-center flex-grow">
                <header>
                    <div class="px-4 sm:px-6 lg:px-8">
                        <h1 class="text-center text-4xl font-extrabold tracking-tight sm:text-5xl lg:text-6xl">
                            <span class="block text-white">Gottes Wort zum</span>
                            {{ ' ' }}
                            <span class="block text-brand-primary">anhören</span>
                        </h1>
                        <p class="mt-6 max-w-lg mx-auto text-center text-xl text-white sm:max-w-3xl">Hören Sie sich
                            unsere Predigten ganz bequem an. Bleiben Sie auf dem Laufenden über die neuesten Predigten
                            von FCG Villach.</p>

                        <div class="mt-10 max-w-sm mx-auto sm:max-w-none sm:flex sm:justify-center">
                            <div class="space-y-4 sm:space-y-0 sm:mx-auto sm:inline-grid sm:grid-cols-2 sm:gap-5">
                                <a class="flex items-center justify-center px-4 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-brand-primary hover:bg-brand-primary-400 sm:px-8"
                                   v-smooth-scroll href="#posts">
                                    <PlayIcon class="h-7 mr-3"/>
                                    Neueste Predigten anhören</a>
                                <Link :href="route('public.blog.archive')"
                                   class="flex items-center justify-center px-4 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-brand-secondary hover:bg-brand-secondary-400 sm:px-8">
                                    <ListBulletIcon class="h-7 mr-3"/>
                                    Alle Predigten </Link>
                            </div>
                        </div>
                    </div>

                    <div class="hidden lg:flex justify-center items-center pt-32">
                        <div class="mouse"></div>
                    </div>
                </header>
            </div>
        </div>

        <div id="posts" class="bg-gradient-to-b from-white to-gray-100">
            <div class="max-w-4xl mx-auto py-32 px-4">

                <div class="grid grid-cols-1 gap-6">
                    <post-audio-player v-for="(post, index) in posts" :key="index" :index=index :post="post" />

                    <!--empty state-->
                    <div v-if="posts.length === 0"
                        class="text-center rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm hover:border-brand-primary focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-brand-primary">
                        Keine Öffentlichen Prediten
                    </div>

                </div>

                <div class="mt-6 flex justify-center">
                        <Link :href="route('public.blog.archive')" class="flex items-center justify-center px-4 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-brand-secondary hover:bg-brand-secondary-400 sm:px-8">
                            <ListBulletIcon class="h-7 mr-3"/> Alle Predigten
                        </Link>
                </div>

            </div>
        </div>
    </public-layout>
</template>

<script>
import BlogList from '@/Partials/BlogList.vue'
import PublicLayout from "@/Layouts/PublicLayout.vue";
import Navbar from "@/Partials/Navbar.vue";
import {ListBulletIcon, PlayIcon} from "@heroicons/vue/24/outline";
import PostAudioPlayer from "@/Partials/PostAudioPlayer.vue";

export default {
    name: 'Blog',
    props: {
        posts: Array,
    },
    components: {
        PostAudioPlayer,
        Navbar,
        PublicLayout,
        BlogList,
        PlayIcon,
        ListBulletIcon,
    },
}
</script>
