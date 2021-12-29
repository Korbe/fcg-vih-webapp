<template>
    <div class="flex flex-col min-h-screen overflow-hidden">

        <!-- Site header -->
        <Header/>

        <!-- Page content -->
        <main class="flex-grow">

            <div class="max-w-6xl mx-auto px-4 sm:px-6">
                <div class="pt-32 pb-12 md:pt-40 md:pb-20">
                    <div class="max-w-3xl mx-auto text-center">
                        <!-- 404 content -->
                        <h1 class="h1 mb-4">Oh nein! <br>Du bist über eine Rarität gestolpert.</h1>
                        <h2 class="h2 ">Unter dieser Adresse gibt es hier nichts..</h2>
                        <div class="mt-8">
                            <inertia-link class="btn text-white bg-blue-600 hover:bg-blue-700" href="/">Zur Startseite</inertia-link>
                        </div>
                    </div>
                </div>
            </div>
        </main>

        <!-- Site footer -->
        <Footer/>

    </div>
</template>

<script>
import Header from './Public/partials/Header.vue'
import Footer from './Public/partials/Footer.vue'

export default {
    name: 'PageNotFound',
    components: {
        Header,
        Footer,
    },
}
</script>
