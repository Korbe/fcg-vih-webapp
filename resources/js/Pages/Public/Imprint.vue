<template>
    <public-layout title="Impressum">

        <Nav/>

        <div class="bg-white">
            <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
                <div class="text-center">
                    <span class="text-base font-semibold text-brand-primary-500 tracking-wide uppercase">FCG Villach</span>
                    <h1 class="mt-1 text-4xl font-extrabold text-gray-900 sm:text-5xl sm:tracking-tight lg:text-6xl">Impressum</h1>
                </div>
            </div>
        </div>

        <section class="px-4 sm:px-6 max-w-5xl mt-8 prose mx-auto text-center lg:prose-lg pb-32">

            <h2>Freie Christengemeinde Villach</h2>
            <p>Freikirche als Teil der Freien Christengemeinde – Pfingstgemeinde FCGÖ</p>
            <p>Vassacher Straße 28 <br>9500 Villach</p>
            <p>E-Mail: office@fcg-villach.at</p>


        </section>

        <Footer />
    </public-layout>
</template>

<script>
import PublicLayout from "@/Layouts/PublicLayout";
import Nav from "../../Partials/Nav";
import Footer from "../../Partials/Footer";

export default {
    name: "Imprint",
    components: {Footer, Nav, PublicLayout}
}
</script>

<style scoped>

</style>
