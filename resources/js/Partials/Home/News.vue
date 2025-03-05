<template>
    <section class="py-16 bg-gradient-to-b from-white to-gray-100 bg-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="text-center mb-5">
                <h1 class="text-3xl sm:text-4xl leading-8 tracking-tight font-extrabold text-gray-900">
                    Besuchen Sie <span class="text-brand-primary">auch..</span>
                </h1>
            </div>

            <Swiper :modules="modules" navigation :space-between="50" class="fcgswiper" :slides-per-view="1">
                <SwiperSlide v-for="(media, index) in items" :key="index">
                    <img loading="lazy" :alt="media.custom_properties.alt" :src="media.original_url"
                        class="lg:h-5/6 object-contain w-full rounded-md" />
                </SwiperSlide>
            </Swiper>

        </div>
    </section>
</template>

<script setup>

import { Swiper, SwiperSlide } from 'swiper/vue';
import 'swiper/css';
import 'swiper/css/navigation';
import { Navigation } from 'swiper/modules';

defineProps({
    items: Array,
});

const modules = [Navigation];

</script>
<style scoped>
.fcgswiper {
    --swiper-theme-color: theme('colors.brand-primary.500');
}
</style>