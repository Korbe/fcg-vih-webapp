<template>
    <div class="bg-gradient-to-b from-white to-gray-100">
        <div class="mx-auto py-12 px-10 max-w-lg sm:max-w-3xl lg:max-w-5xl lg:px-8 lg:py-24">
            <ul role="list" class="space-y-12 sm:space-y-0 sm:space-x-0 sm:grid sm:grid-cols-2 sm:gap-6  lg:grid-cols-3 lg:gap-12">
                <li v-for="person in team" :key="person.name" class="rounded-lg text-left bg-white shadow hover:shadow-lg divide-y divide-gray-200">
                    <inertia-link :href="route('public.about.team', slugify(person.name))">
                        <div>
                            <div class="aspect-w-1 aspect-h-1">
                                <img loading="lazy" class="object-cover shadow-lg rounded-t-lg" :src="person.imageUrl" :alt="person.name"/>
                            </div>
                            <div class="p-5 flex items-center justify-between">
                                <div class="font-medium text-lg leading-6 space-y-1">
                                    <h3 class="text-gray-900">{{ person.name }}</h3>
                                    <p class="text-brand-primary">{{ person.role }}</p>
                                </div>
                                <div>
                                    <ArrowRightIcon class="w-6 h-6 text-gray-400"/>
                                </div>
                            </div>
                        </div>
                    </inertia-link>
                </li>
            </ul>
        </div>
    </div>
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
                    role: 'Ältester & Kassier',
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
    methods: {
        slugify(str) {
            return str.replace(/\s+/g, '-').toLowerCase();
        }
    }
}
</script>
