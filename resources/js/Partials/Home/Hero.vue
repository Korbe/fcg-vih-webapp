<template>
    <div class="flex flex-col h-screen relative">

        <div class="absolute inset-0 ">
            <img alt="" class="w-full lg:hidden h-full object-cover" src="/images/hero.jpg"/>
            <img alt="" class="hidden lg:block w-full h-full object-cover" src="/images/hero-lg.jpg"/>
        </div>

        <Navbar blueMobileButton hasBackground/>

        <div class="relative flex justify-center items-center flex-grow">
            <header>
                <div class="px-4 sm:px-6 lg:px-8">
                    <h1 class="text-center text-4xl font-extrabold tracking-tight sm:text-5xl lg:text-6xl">
                        <span class="block text-white">Freie Christengemeinde</span>
                        {{ ' ' }}
                        <span class="block text-brand-primary">Villach</span>
                    </h1>
                    <p class="mt-6 max-w-lg mx-auto text-center text-xl text-white sm:max-w-3xl">Wir sind eine Gruppe
                        christusgläubiger Menschen, die aus Freude an Jesus Christus und an ihrem neuen Leben vereint
                        sind.</p>

                    <div class="mt-10 max-w-sm mx-auto sm:max-w-none sm:flex sm:justify-center">
                        <div class="space-y-4 sm:space-y-0 sm:mx-auto sm:inline-grid sm:grid-cols-2 sm:gap-5">
                            <inertia-link :href="route('public.blog')"
                                  class="flex items-center justify-center px-4 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-brand-primary hover:bg-brand-primary-400 sm:px-8">
                                <PlayIcon class="h-7 mr-3"/>
                                Predigten anhören
                            </inertia-link>
                            <a href="#visitus" v-smooth-scroll
                               class="flex items-center justify-center px-4 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-brand-secondary hover:bg-brand-secondary-400 sm:px-8">
                                <UserGroupIcon class="h-7 mr-3"/>
                                Besuchen Sie uns </a>
                        </div>
                    </div>
                </div>

                <div class="hidden lg:flex justify-center items-center pt-32">
                    <div class="mouse"></div>
                </div>
            </header>
        </div>
    </div>

</template>

<script>
import {PlayIcon, UserGroupIcon} from "@heroicons/vue/outline";
import Navbar from "@/Partials/Navbar";

export default {
    name: 'Hero',
    components: {Navbar, PlayIcon, UserGroupIcon},
}
</script>
