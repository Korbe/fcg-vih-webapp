<template>
    <div class="">
        <div class="mx-auto py-12 px-4 max-w-7xl sm:px-6 lg:px-8 lg:py-24">
            <div class="space-y-12">
                <ul role="list" class="space-y-4 sm:grid sm:grid-cols-2 sm:gap-6 sm:space-y-0 lg:grid-cols-3 lg:gap-8">
                    <li v-for="person in team" :key="person.name" class="py-10 px-16 text-center rounded-lg xl:text-left bg-white shadow hover:shadow-lg divide-y divide-gray-200">
                        <Link :href="route('public.about.team', slugify(person.name))">
                            <div class="space-y-6 xl:space-y-10">
                                <img class="mx-auto h-40 w-40 rounded-full xl:w-56 xl:h-56" :src="person.imageUrl" alt="" />
                                <div class="space-y-2 flex items-center justify-between">
                                    <div class="font-medium text-lg leading-6 space-y-1">
                                        <h3 class="text-gray-900">{{ person.name }}</h3>
                                        <p class="text-brand-primary">{{ person.role }}</p>
                                    </div>

                                    <div>
                                        <ArrowRightIcon class="w-6 h-6 text-gray-400" />
                                    </div>
                                </div>
                            </div>
                        </Link>
                    </li>
                </ul>
            </div>
        </div>
    </div>

<!--
    <div class="pb-16 bg-gradient-to-b from-white to-gray-50">
        <div class="max-w-7xl mx-auto py-12 px-4 text-center sm:px-6 lg:px-8 lg:py-24">
            <div class="space-y-12">
                <ul role="list" class="mx-auto space-y-16 sm:grid sm:grid-cols-2 sm:gap-16 sm:space-y-0 lg:grid-cols-3 lg:max-w-5xl">
                    <li v-for="person in team" :key="person.name">
                        <div class="space-y-6">
                            <img class="mx-auto h-40 w-40 rounded-full xl:w-64 xl:h-64" :src="person.imageUrl" alt=""/>
                            <div class="space-y-2">
                                <div class="text-lg leading-6 font-medium space-y-1">
                                    <h3>{{ person.name }}</h3>
                                    <p class="text-brand-primary-600">{{ person.role }}</p>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
-->

</template>

<script>

import {
    ArrowRightIcon,
} from "@heroicons/vue/outline";

export default {
    name: "Team",
    components: {ArrowRightIcon},

    data() {
        return {
            team: [
                {
                    name: 'Christian Korbitsch',
                    role: 'Pastor',
                    imageUrl: 'images/portraits/Christian-Korbitsch.jpeg',
                },
                {
                    name: 'Erika Korbitsch',
                    role: 'Lobpreisleitung',
                    imageUrl: 'images/portraits/Erika-Korbitsch.jpeg',
                },
                {
                    name: 'Andrea Kirisits',
                    role: 'Kindergottesdienste',
                    imageUrl: 'images/portraits/Andrea-Kirisits.jpeg',
                },
                {
                    name: 'Markus Kirisits',
                    role: 'Kassier & Schriftführer',
                    imageUrl: 'images/portraits/Markus-Kirisits.jpeg',
                },
                {
                    name: 'Majid Khosravian',
                    role: 'Übersetzer',
                    imageUrl: 'images/portraits/Majid-Khosravian.jpeg',
                },
                {
                    name: 'Bettina Morgan',
                    role: 'Moderation',
                    imageUrl: '/images/portraits/Bettina-Morgan.jpeg',
                },
            ],
        }
    },
    methods:{
        slugify(str){
            return str.replace(/\s+/g, '-').toLowerCase();
        }
    }
}
</script>
