<template>
    <section class="max-w-6xl mx-auto mt-10 sm:mt-12 md:mt-16 lg:mt-20 xl:mt-28 px-4 sm:px-6 lg:px-8">

<!--        <div class="text-center mt-16 sm:mt-12 md:mt-16 lg:mt-20 xl:mt-28 pb-20 px-5">
            <h1 class="text-4xl sm:text-5xl md:text-6xl tracking-tight font-extrabold text-gray-900">
                Sie sind <span class="text-brand-primary">willkommen</span>
            </h1>
            <p class="mt-3 max-w-5xl lg:max-w-4xl text-gray-500 mx-auto text-xl sm:text-lg md:mt-5 lg:max-w-3xl md:text-xl">
                Wir sind nicht nur eine Kirche, wir sind Gemeinschaft. Sie sind herzlich willkommen unsere
                Veranstaltungen zu besuchen.
            </p>
        </div>-->


        <div class="bg-white text-center">
            <h1 class="text-3xl sm:text-5xl md:text-4xl tracking-tight font-extrabold text-gray-900">
                Besuchen Sie <span class="text-brand-primary">auch..</span>
            </h1>

            <p class="mt-3 max-w-5xl lg:max-w-4xl text-gray-500 mx-auto text-xl sm:text-lg md:mt-5 lg:max-w-3xl md:text-xl">
                Wir sind steht darüm bemüht die Gemeinschaft in unserere Gemeinde zu stärken. Jeder ist bei unseren Events herzlich willkommen.
            </p>
        </div>

        <carousel wrap-around class="mt-5" :items-to-show="1" :autoplay="4000">

            <slide class="p-5" :key="index" v-for="(media,index) in items">

                <img class="object-contain w-full rounded-md" :src="media.original_url" :alt="media.custom_properties.alt"/>

            </slide>

            <template #addons>
                <navigation v-if="innerWidth >= 640"/>
                <pagination/>
            </template>

        </carousel>

    </section>
</template>

<script>

import {Carousel, Slide, Pagination, Navigation} from 'vue3-carousel';

export default {
    name: "News",
    components: {
        Carousel,
        Slide,
        Pagination,
        Navigation,
    },
    props: {
        items: Array,
    },
    data() {
        return {
            innerWidth: window.innerWidth,
        };
    },
}
</script>
