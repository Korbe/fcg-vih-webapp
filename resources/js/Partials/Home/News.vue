<template>
    <section class="py-16 bg-gradient-to-b from-white to-gray-100 bg-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="text-center mb-5">
                <h1 class="text-3xl sm:text-4xl leading-8 tracking-tight font-extrabold text-gray-900">
                    Besuchen Sie <span class="text-brand-primary">auch..</span>
                </h1>
            </div>

            <carousel v-if="items.length > 0" :autoplay="4000" :items-to-show="1" wrap-around>

                <slide v-for="(media,index) in items" :key="index" >

                    <div class="md:m-5">


                       <img :alt="media.custom_properties.alt" :src="media.original_url"
                            class="lg:h-5/6 object-contain w-full rounded-md"/>
                    </div>
                </slide>

                <template v-if="items.length > 1" #addons>
                    <navigation v-if="innerWidth >= 640"/>
                    <pagination/>
                </template>

            </carousel>

        </div>
    </section>
</template>

<script>

import {Carousel, Navigation, Pagination, Slide} from 'vue3-carousel';

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
