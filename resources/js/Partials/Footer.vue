<template>

    <footer class="bg-white" aria-labelledby="footer-heading">
        <h2 id="footer-heading" class="sr-only">Footer</h2>
        <div class="max-w-7xl mx-auto py-12 px-4 sm:px-6 lg:py-16 lg:px-8">
            <div class="xl:grid xl:grid-cols-3 xl:gap-8">
                <div class="text-center space-y-8 xl:col-span-1">

                    <LogoText class="w-52 mx-auto" />

                    <p class="text-gray-500 text-base">
                        Daran werden alle erkennen, dass ihr meine Jünger seid,
                        wenn ihr Liebe untereinander habt (Johannes 13,35)
                    </p>
                    <div class="flex space-x-6">
                        <inertia-link v-for="item in navigation.social" :key="item.name" :href="item.href" class="text-gray-500 hover:text-gray-500">
                            <span class="sr-only">{{ item.name }}</span>
                            <component :is="item.icon" class="h-6 w-6" aria-hidden="true"/>
                        </inertia-link>
                    </div>
                </div>
                <div class="mt-12 grid md:grid-cols-2 gap-8 xl:mt-0 xl:col-span-2">
                    <div class="grid grid-cols-2 md:gap-8">
                        <div>
                            <h3 class="text-sm font-semibold text-gray-500 tracking-wider uppercase">
                                FCG Villach
                            </h3>
                            <ul role="list" class="mt-4 space-y-4">
                                <li v-for="item in navigation.site" :key="item.name">
                                    <inertia-link :href="item.href" class="text-base text-gray-500 hover:text-blue-gray-900">
                                        {{ item.name }}
                                    </inertia-link>
                                </li>
                            </ul>
                        </div>
                        <div class="mt-0">
                            <h3 class="text-sm font-semibold text-gray-500 tracking-wider uppercase">
                                Rechtliches
                            </h3>
                            <ul role="list" class="mt-4 space-y-4">
                                <li v-for="item in navigation.legal" :key="item.name">
                                    <inertia-link :href="item.href" class="text-base text-gray-500 hover:text-gray-900">
                                        {{ item.name }}
                                    </inertia-link>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="hidden md:block md:grid md:grid-cols-2 md:gap-10">
                        <div>
                            <h3 class="text-sm font-semibold text-gray-500 tracking-wider uppercase">
                                Besuchen Sie auch
                            </h3>
                            <ul role="list" class="mt-4 space-y-4">
                                <li v-for="item in navigation.links.splice(0, 3)" :key="item.name">
                                    <a :href="item.href" target="_blank" class="text-base text-gray-500 hover:text-gray-900">
                                        {{ item.name }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="mt-12 md:mt-5">
                            <ul role="list" class="mt-4 space-y-4">
                                <li v-for="item in navigation.links" :key="item.name">
                                    <a :href="item.href" target="_blank" class="text-base text-gray-500 hover:text-gray-900">
                                        {{ item.name }}
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mt-12 border-t border-gray-200 pt-8">
                <p class="text-base text-gray-500 xl:text-center">
                    Designed and Developed with<span class="inline-block align-top"><HeartIcon class="text-red-500 h-5 px-1" /></span>by <a href="mailto:korbitschl@gmail.com">Lukas Korbitsch</a>
                </p>
                <p class="pt-4 text-base text-gray-500 xl:text-center">
                    &copy; {{ new Date().getFullYear() }} FCG-Villach. Alle Rechte vorbehalten
                </p>
            </div>
        </div>
    </footer>
</template>

<script>

import LogoText from "@/Partials/LogoText";
import {HeartIcon} from "@heroicons/vue/outline";
export default {
    name: "Footer",
    components: {LogoText, HeartIcon},
    data() {
        return {
            navigation: {
                site: [
                    {name: 'Über uns', href: route('public.about')},
                    {name: 'Events', href: route('public.events')},
                    {name: 'Predigten', href: route('public.blog')},
                    {name: 'Kontakt', href: route('public.contact')},
                    {name: 'Spenden', href: route('public.donate')},
                ],
                legal: [
                    {name: 'Impressum', href: route('public.impressum')},
                    {name: 'Datenschutz', href: route('public.datenschutz')},
                ],
                links: [
                    {name: 'Pfingstbewegung Österreich', href: 'https://fcgoe.at/'},
                    {name: 'Freikirchen in Österreich', href: 'https://freikirchen.at/29082013Nr1.php'},
                    {name: 'Impact Innenmission', href: 'http://impact-austria.at'},
                    {name: 'AmPuls Außenmission', href: 'https://ampuls.or.at/'},
                    {name: 'Soziale Tagesstätte Raphael', href: 'https://soziale-tagestaette-raphael.at/'},
                    {name: 'AVC „Aktion für verfolgte Christen und Notleidende“', href: 'https://avc-at.org/de/'},
                ],
            }
        }
    }
}
</script>
