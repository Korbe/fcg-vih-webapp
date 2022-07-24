<template>
    <section class="max-w-6xl mx-auto mt-10 sm:mt-12 md:mt-16 lg:mt-20 xl:mt-28 px-4 sm:px-6 lg:px-8">

        <div class="bg-white text-center">
            <h1 class="text-3xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-4xl">
                Erfahrungen unserer <span class="text-brand-primary">Gäste</span>
            </h1>
        </div>

        <carousel :autoplay="6000" :items-to-show="1" class="mt-5" wrap-around>

            <slide v-for="testimonial in testimonials" :key="testimonial.name" class="md:p-5">

                <blockquote>
                    <div class="text-center text-xl md:text-2xl leading-9 text-gray-900">
                        <p>&ldquo;{{ testimonial.statement }}&rdquo;</p>
                    </div>
                    <footer class="mt-8">
                        <div class="md:flex md:items-center md:justify-center">
                            <div class="mt-3 text-center md:mt-0 md:ml-4 md:flex md:items-center">
                                <div class="text-base font-medium text-gray-900">{{ testimonial.name }}</div>

                                <svg class="hidden md:block mx-1 h-5 w-5 text-brand-primary" fill="currentColor"
                                     viewBox="0 0 20 20">
                                    <path d="M11 0h3L9 20H6l5-20z"/>
                                </svg>

                                <div class="text-base font-medium text-gray-500">{{ testimonial.role }}</div>
                            </div>
                        </div>
                    </footer>
                </blockquote>

            </slide>

            <template #addons>
                <navigation v-if="innerWidth >= 640"/>
                <pagination/>
            </template>
        </carousel>

    </section>
</template>

<script>

import {Carousel, Navigation, Pagination, Slide} from 'vue3-carousel';

export default {
    name: "Testimonials",
    components: {
        Carousel,
        Slide,
        Pagination,
        Navigation,
    },
    data() {
        return {
            innerWidth: window.innerWidth,
            testimonials: [
                {
                    name: "Toni Bergmairer",
                    statement: "Freundliches Ambiente, liebevoll gestaltete Räume, engagierte Mitarbeiterschaft  - die Liste ließe sich deutlich erweitern sollte slles genannt werden, warum ich freue, wenn ich zu Predigtdiensten eingeladen werde. Ich empfinde mich als Teil der Familie und freue mich über das, was Gott hier tut.",
                    role: "Pastor, Bad Reichenhall"
                },
                {
                    name: "Rita Dullinger",
                    statement: "Das Herz der  FCG Villach ist es, dass Menschen aus allen Nationen Jesus Christus als Erlöser kennenlernen und erfahren, dass durch ihn sich ihr Leben zum Besseren wendet!",
                    role: "Seelsorger, FCG Wels"
                },
                {
                    name: "Gottfried Knirsch",
                    statement: "Die FCG Villach ist ein Zuhause bunter Geschwister: Hier teilt man das Leben, hier singt und betet man gemeinsam, hier hilft einer dem anderen, hier hört man die Gute Botschaft von Jesus, um den sich alles dreht. Jeder ist hier willkommen!",
                    role: "Pastor, Gospelhaus Klagenfurt"
                },
            ]
        }
    }
}
</script>
