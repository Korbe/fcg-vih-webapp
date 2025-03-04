<template>
    <section id="visitus" class="relative py-24 bg-white overflow-hidden">
        <div class="relative px-4 sm:px-6 lg:px-8">
            <div class="text-lg max-w-prose mx-auto">
                <h1 id="freie-christengemeinde" style="scroll-margin: 7rem">
                    <span
                        class="block text-base md:text-center text-brand-primary font-semibold tracking-wide uppercase">FCG
                        Villach</span>
                    <span
                        class="mt-2 block text-3xl md:text-center leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">Willkommen
                        auf unserer Homepage</span>
                </h1>
                <p class="mt-8 md:text-center text-xl text-gray-500 leading-8">Als Freie Christengemeinde –
                    Pfingstgemeinde ist es uns
                    ein
                    Anliegen, den Menschen in unserem Land zu dienen, indem wir die gute
                    Nachricht von Jesus Christus gesellschaftsrelevant verkündigen und praktizieren.</p>

            </div>
        </div>

        <div class="my-8 flex justify-left md:justify-center ">
        <Link :href="route('public.about')"
            class="flex rounded-md shadow items-center justify-center px-10 py-3 border border-transparent text-base font-medium rounded-md text-white bg-brand-primary hover:bg-brand-primary-400">
        <span>Das sind wir</span>
        <ArrowRightIcon class="h-7 ml-3" />
        </Link>
    </div>
    </section>

    <!-- <section class="text-gray-600 body-font">
        <div class="container px-5 py-24 mx-auto">
            <div class="flex flex-wrap -m-4">
                <div class="xl:w-1/4 md:w-1/2 p-3">
                    <div class="px-5 py-14 border border-gray-200 p-6 rounded-lg flex items-center flex-col group">
                        <BookOpenIcon
                            class="h-14 mb-3 text-brand-primary-500 transition-transform duration-300 group-hover:-translate-y-2" />
                        <h2 class="text-xl text-gray-900 font-medium mb-2">Folge der Bibel</h2>
                        <p class="leading-relaxed text-base text-center">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam</p>
                    </div>
                </div>
                <div class="xl:w-1/4 md:w-1/2 p-3">
                    <div class="px-5 py-14 border border-gray-200 p-6 rounded-lg flex items-center flex-col group">
                        <BuildingLibraryIcon
                            class="h-14 mb-3 text-brand-primary-500 transition-transform duration-300 group-hover:-translate-y-2" />
                        <h2 class="text-xl text-gray-900 font-medium mb-2">Christliche Kirche</h2>
                        <p class="leading-relaxed text-base text-center">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam</p>
                    </div>
                </div>
                <div class="xl:w-1/4 md:w-1/2 p-3">
                    <div class="px-5 py-14 border border-gray-200 p-6 rounded-lg flex items-center flex-col group">
                        <HandRaisedIcon
                            class="h-14 mb-3 text-brand-secondary-500 transition-transform duration-300 group-hover:-translate-y-2" />
                        <h2 class="text-xl text-gray-900 font-medium mb-2">Suche Gott</h2>
                        <p class="leading-relaxed text-base text-center">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam</p>
                    </div>
                </div>
                <div class="xl:w-1/4 md:w-1/2 p-3">
                    <div class="px-5 py-14 border border-gray-200 p-6 rounded-lg flex items-center flex-col group">
                        <HeartIcon
                            class="h-14 mb-3 text-brand-primary-500 transition-transform duration-300 group-hover:-translate-y-2" />
                        <h2 class="text-xl text-gray-900 font-medium mb-2">Liebe und Fürsorge</h2>
                        <p class="leading-relaxed text-base text-center">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam.</p>
                    </div>
                </div>
            </div>
        </div>
    </section> -->


</template>
<script setup>
import { ArrowRightIcon, BookOpenIcon, BuildingLibraryIcon, HandRaisedIcon, HeartIcon } from "@heroicons/vue/24/outline";
</script>
