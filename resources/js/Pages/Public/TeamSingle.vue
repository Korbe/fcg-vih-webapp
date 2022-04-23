<template>
    <public-layout :title="person.name">

        <Nav/>


        <div class="relative py-28 bg-gradient-to-b from-white to-gray-100">
<!--            <div class="hidden absolute top-0 inset-x-0 h-1/2 bg-white lg:block" aria-hidden="true"/>-->
            <div class="max-w-7xl mx-auto bg-brand-primary-600 lg:bg-transparent lg:px-8">
                <div class="lg:grid lg:grid-cols-12">
                    <div class="relative z-10 lg:col-start-1 lg:row-start-1 lg:col-span-4 lg:py-16 lg:bg-transparent">
                        <div class="absolute inset-x-0 h-1/2 bg-whiteBLU lg:hidden" aria-hidden="true"/>
                        <div class="max-w-md mx-auto px-4 sm:max-w-3xl sm:px-6 lg:max-w-none lg:p-0">
                            <div class="aspect-w-10 aspect-h-10">
                                <img class="object-cover object-center rounded-3xl shadow-2xl" :src="person.imageUrl"
                                     :alt="person.name"/>
                            </div>
                        </div>
                    </div>

                    <div class="relative bg-brand-primary-600 lg:col-start-3 lg:row-start-1 lg:col-span-12 lg:rounded-3xl lg:grid lg:grid-cols-12 lg:items-center">
                        <div class="hidden absolute inset-0 overflow-hidden rounded-3xl lg:block" aria-hidden="true">
                            <svg
                                class="absolute bottom-full left-full transform translate-y-1/3 -translate-x-2/3 xl:bottom-auto xl:top-0 xl:translate-y-0"
                                width="404" height="384" fill="none" viewBox="0 0 404 384" aria-hidden="true">
                                <defs>
                                    <pattern id="64e643ad-2176-4f86-b3d7-f2c5da3b6a6d" x="0" y="0" width="20"
                                             height="20" patternUnits="userSpaceOnUse">
                                        <rect x="0" y="0" width="4" height="4" class="text-gray-50"
                                              fill="currentColor"/>
                                    </pattern>
                                </defs>
                                <rect width="404" height="384" fill="url(#64e643ad-2176-4f86-b3d7-f2c5da3b6a6d)"/>
                            </svg>
                            <svg
                                class="absolute top-full transform -translate-y-1/3 -translate-x-1/3 xl:-translate-y-1/2"
                                width="404" height="384" fill="none" viewBox="0 0 404 384" aria-hidden="true">
                                <defs>
                                    <pattern id="64e643ad-2176-4f86-b3d7-f2c5da3b6a6d" x="0" y="0" width="20"
                                             height="20" patternUnits="userSpaceOnUse">
                                        <rect x="0" y="0" width="4" height="4" class="text-gray-50"
                                              fill="currentColor"/>
                                    </pattern>
                                </defs>
                                <rect width="404" height="384" fill="url(#64e643ad-2176-4f86-b3d7-f2c5da3b6a6d)"/>
                            </svg>
                        </div>

                        <div class="relative max-w-md mx-auto py-12 space-y-6 sm:max-w-3xl sm:py-16 sm:px-6 lg:max-w-none lg:p-0 lg:col-start-4 lg:col-span-8">

                            <p class="text-2xl py-5 text-white font-medium">{{ person.role }}</p>
                            <h1 class="my-2 text-3xl font-extrabold text-white">{{ person.name }}</h1>

                            <p class="  text-white text text-xl sm:text-lg md:mt-5 md:text-xl">{{ person.lead }}</p>

                            <p class="text-lg text-white">{{ person.bio }}</p>

                            <div class="sm:space-x-4 mt-5 sm:flex sm:justify-center lg:justify-start">
                                <a :href="`tel:${person.phone}`"
                                   class="border-transparent bg-white text-gray-500 flex items-center justify-center px-8 py-3 text-base shadow-md font-medium rounded-md white hover:bg-gray-200 md:text-lg md:px-10">
                                    <PhoneIcon class="w-5 h-5" aria-hidden="true"/>
                                    <span class="ml-3">Anrufen</span>
                                </a>
                                <a :href="`mailto:${person.mail}`"
                                   class="border-transparent bg-white text-gray-500 flex items-center justify-center px-8 py-3 text-base shadow-md font-medium rounded-md white hover:bg-gray-200 md:text-lg md:px-10">
                                    <MailIcon class="w-5 h-5" aria-hidden="true"/>
                                    <span class="ml-3">Schreiben</span>
                                </a>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <Footer/>

    </public-layout>
</template>

<script>
import PublicLayout from "@/Layouts/PublicLayout";
import Footer from "@/Partials/Footer";
import Nav from "@/Partials/Nav";
import {MailIcon, PhoneIcon} from "@heroicons/vue/outline";


export default {
    name: "TeamSingle",
    components: {Nav, Footer, PublicLayout, MailIcon, PhoneIcon},
    props: {
        person: {
            name: String,
            role: String,
            imageUrl: String,
            lead: String,
            bio: String,
            phone: String,
            mail: String
        },

    }
}
</script>
