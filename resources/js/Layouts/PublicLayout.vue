<template>
    <div class="flex flex-col min-h-screen overflow-hidden">

        <!-- Site header -->
        <Header/>

        <!-- Page content -->
        <main class="flex-grow">

            <!-- Page sections -->
            <slot/>

        </main>

        <!-- Site footer -->
        <Footer/>

    </div>
</template>

<script>
import Header from "@/Pages/Public/partials/Header";
import Footer from "@/Pages/Public/partials/Footer";
export default {
    name: "PublicLayout",
    components: {Footer, Header}
}
</script>

<style scoped>

</style>
