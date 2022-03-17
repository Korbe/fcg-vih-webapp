<template>

    <div class="relative bg-white overflow-hidden">
        <div class="max-w-7xl mx-auto ">
            <div class="relative z-10 pb-8 bg-white sm:pb-16 md:pb-20 lg:max-w-3xl lg:w-full lg:pb-28 xl:pb-32">
                <svg class="hidden lg:block absolute right-0 inset-y-0 h-full w-48 text-white transform translate-x-1/2" fill="currentColor" viewBox="0 0 100 100" preserveAspectRatio="none"
                     aria-hidden="true">
                    <polygon points="50,0 100,0 50,100 0,100"/>
                </svg>

                <Nav />

                <main class="mt-10 mx-auto max-w-7xl px-4 sm:mt-12 sm:px-6 md:mt-16 lg:mt-20 lg:px-8 xl:mt-28">
                    <div class="sm:text-center lg:text-left">
                        <logo-text class="h-48 mx-auto mb-5"></logo-text>
                        <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                            <span class="block xl:inline">Freie Christengemeinde</span>
                            {{ ' ' }}
                            <span class="block text-brand-primary xl:inline">Villach</span>
                        </h1>
                        <p class="mt-3 text-xl text-gray-500 sm:mt-5 sm:text-lg sm:max-w-xl sm:mx-auto md:mt-5 md:text-xl lg:mx-0">Herzlich Willkommen, wir sind eine Gruppe Christus-gläubiger Menschen. Es erwartet Sie ein buntes Gemisch von Menschen, die nie beisammen wären, wenn Sie nicht Christus kennengelernt hätten.</p>
                        <div class="mt-5 sm:mt-8 sm:flex sm:justify-center lg:justify-start">
                            <div class="rounded-md shadow">
                                <Link :href="route('public.blog')"
                                              class="border-transparent w-full flex items-center justify-center px-8 py-3 border-2 text-base font-medium rounded-md bg-brand-primary hover:bg-brand-primary-400 text-white md:py-4 md:text-lg md:px-10">
                                    <PlayIcon class="h-7 mr-1"/>
                                    <span>Predigten anhören</span>
                                </Link>
                            </div>
                            <div class="mt-3 sm:mt-0 sm:ml-3">
                                <Link :href="route('public.about')"
                                              class="border-transparent w-full flex items-center justify-center px-8 py-3 border-2 text-base font-medium rounded-md bg-white text-brand-secondary-700 bg-brand-secondary-200 hover:bg-brand-secondary-300 hover:text-white md:py-4 md:text-lg md:px-10">
                                    Mehr über uns
                                </Link>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
        </div>
        <div class="lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2">
            <img class="h-56 w-full object-cover sm:h-72 md:h-96 lg:w-full lg:h-full" src="https://images.unsplash.com/photo-1574896051681-c48fb85b6280?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2224&q=80" alt=""/>
        </div>
    </div>
</template>

<script>
import LogoText from "@/Partials/LogoText";
import {PlayIcon} from "@heroicons/vue/outline";
import Nav from "@/Partials/Nav";

export default {
    name: 'Hero',
    components: {Nav, LogoText, PlayIcon},
}
</script>
