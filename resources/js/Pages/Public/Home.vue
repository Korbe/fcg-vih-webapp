<template>
    <public-layout title="Home">
        <hero/>

        <Stats2/>

        <stats/>

        <div class="pt-36 bg-gray-50">
            <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="max-w-4xl mx-auto text-center">
                    <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">Loremius Maxiums cool stats to hehe</h2>
                    <p class="mt-3 text-xl text-gray-500 sm:mt-4">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Repellendus repellat laudantium.</p>
                </div>
            </div>
            <div class="mt-10 bg-white">
                <div class="relative">
                    <div class="absolute inset-0 h-1/2 bg-gray-50"/>
                    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div class="max-w-4xl mx-auto">
                            <dl class="rounded-lg bg-white shadow-lg sm:grid sm:grid-cols-3">
                                <div class="flex flex-col border-b border-gray-100 p-6 text-center sm:border-0 sm:border-r">
                                    <dt class="order-2 mt-2 text-lg leading-6 font-medium text-gray-500">Pepperoni</dt>
                                    <dd class="order-1 text-5xl font-extrabold text-brand-primary">100%</dd>
                                </div>
                                <div class="flex flex-col border-t border-b border-gray-100 p-6 text-center sm:border-0 sm:border-l sm:border-r">
                                    <dt class="order-2 mt-2 text-lg leading-6 font-medium text-gray-500">Delivery</dt>
                                    <dd class="order-1 text-5xl font-extrabold text-brand-primary">24/7</dd>
                                </div>
                                <div class="flex flex-col border-t border-gray-100 p-6 text-center sm:border-0 sm:border-l">
                                    <dt class="order-2 mt-2 text-lg leading-6 font-medium text-gray-500">Calories</dt>
                                    <dd class="order-1 text-5xl font-extrabold text-brand-primary">100k</dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <testimonials/>

        <Cta></Cta>

        <Footer/>

    </public-layout>
</template>

<script>
import PublicLayout from "@/Layouts/PublicLayout";
import Hero from '../../Partials/Home/Hero.vue'
import Stats2 from "@/Partials/Home/Stats2";
import Stats from "@/Partials/Home/Stats";
import Testimonials from "@/Partials/Home/Testimonials";
import Cta from "@/Partials/Home/Cta";
import Footer from "@/Partials/Footer";

export default {
    name: 'Home',
    components: {
        Footer,
        Cta,
        Testimonials,
        Stats,
        Stats2,
        PublicLayout,
        Hero,
    },
}
</script>
