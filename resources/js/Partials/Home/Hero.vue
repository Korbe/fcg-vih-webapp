<template>

        <header class="relative h-screen">
            <div class="absolute inset-0 ">
                <img class="w-full h-full object-cover" src="/images/hero.jpg" alt=""/>
            </div>

            <Nav hasBackground blueMobileButton/>

            <div class="relative px-4 pt-16 sm:px-6 sm:py-24 lg:pt-32 lg:px-8">
                <h1 class="text-center text-4xl font-extrabold tracking-tight sm:text-5xl lg:text-6xl">
                    <span class="block text-white">Freie Christengemeinde</span>
                    {{ ' ' }}
                    <span class="block text-brand-primary">Villach</span>
                </h1>
                <p class="mt-6 max-w-lg mx-auto text-center text-xl text-white sm:max-w-3xl">Wir sind eine Gruppe christusgläubiger Menschen, die aus Freude an Jesus Christus und an ihrem neuen Leben vereint sind.</p>

                <div class="mt-10 max-w-sm mx-auto sm:max-w-none sm:flex sm:justify-center">
                    <div class="space-y-4 sm:space-y-0 sm:mx-auto sm:inline-grid sm:grid-cols-2 sm:gap-5">
                        <Link :href="route('public.blog')"
                              class="flex items-center justify-center px-4 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-brand-primary hover:bg-brand-primary-400 sm:px-8"><PlayIcon class="h-7 mr-3"/> Predigten anhören </Link>
                        <a :href="route('public.blog') + '#visitus'"
                              class="flex items-center justify-center px-4 py-3 border border-transparent text-base font-medium rounded-md shadow-sm text-white bg-brand-secondary hover:bg-brand-secondary-400 sm:px-8"><UserGroupIcon class="h-7 mr-3"/> Besuchen Sie uns </a>
                    </div>
                </div>
            </div>

            <div class="invisible lg:visible flex items-center justify-around pt-16">
                <div class="mouse"></div>
            </div>

        </header>
</template>

<script>
import LogoText from "@/Partials/LogoText";
import {PlayIcon, UserGroupIcon} from "@heroicons/vue/outline";
import Nav from "@/Partials/Nav";

export default {
    name: 'Hero',
    components: {Nav, LogoText, PlayIcon, UserGroupIcon},
}
</script>
