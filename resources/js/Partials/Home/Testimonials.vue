<template>

    <section>

        <div class="relative w-full mx-auto ">
            <div
                class="relative py-24 px-10 md:px-24 bg-brand-primary-500 overflow-hidden">
                <div class="absolute inset-0 opacity-50 filter saturate-0 mix-blend-multiply">
                    <img loading="lazy"
                        alt=""
                        class="w-full h-full object-cover"
                        src="images/testimonials_banner.jpg"/>
                </div>

                <div class="md:max-w-4xl lg:pl-24">
                    <carousel pauseAutoplayOnHover :autoplay="6000" :items-to-show="1" class="mt-5" wrap-around>

                        <slide v-for="testimonial in testimonials" :key="testimonial.name" class="md:p-5">

                            <div class="relative lg:col-span-1 text-left">

                                <blockquote class="mt-6 text-white">
                                    <p class="text-xl font-medium sm:text-2xl">{{ testimonial.statement }}</p>
                                    <div class="mt-6">
                                        <p class="flex flex-col font-medium">
                                            <span>{{ testimonial.name }}</span>
                                            <span>{{ testimonial.role }}</span>
                                        </p>
                                    </div>
                                </blockquote>

                            </div>

                        </slide>

                        <template #addons>
                            <pagination class="text-left"/>
                        </template>

                    </carousel>
                </div>



            </div>
        </div>

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
                    name: "Toni Bergmair",
                    statement: "Freundliches Ambiente, liebevoll gestaltete Räume, engagierte Mitarbeiter - die Liste ließe sich noch deutlich erweitern sollte alles genannt werden. Deshalb freue ich mich jedesmal, wenn ich zu Predigtdiensten nach Villach eingeladen werde. Ich empfinde mich als Teil dieser Familie und freue mich über das, was Gott hier tut.",
                    role: "Pastor, Bad Reichenhall"
                },
                {
                    name: "Rita Dullinger",
                    statement: "Das Herz der FCG Villach ist es, dass Menschen aus allen Nationen Jesus Christus als Erlöser kennenlernen und erfahren, dass sich ihr Leben durch ihn zum Besseren wendet!",
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
