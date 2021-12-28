<template>
    <div class="flex flex-col min-h-screen overflow-hidden">

        <!-- Site header -->
        <Header/>

        <!-- Page content -->
        <main class="flex-grow">

            <!-- Illustration behind content -->
            <div aria-hidden="true" class="absolute left-1/2 transform -translate-x-1/2 -mb-64 bottom-0 pointer-events-none">
                <svg height="578" viewBox="0 0 1360 578" width="1360" xmlns="http://www.w3.org/2000/svg">
                    <defs>
                        <linearGradient id="illustration-01" x1="50%" x2="50%" y1="0%" y2="100%">
                            <stop offset="0%" stop-color="#FFF"/>
                            <stop offset="77.402%" stop-color="#EAEAEA"/>
                            <stop offset="100%" stop-color="#DFDFDF"/>
                        </linearGradient>
                    </defs>
                    <g fill="url(#illustration-01)" fill-rule="evenodd">
                        <circle cx="1232" cy="128" r="128"/>
                        <circle cx="155" cy="443" r="64"/>
                    </g>
                </svg>
            </div>

            <div class="max-w-6xl mx-auto px-4 sm:px-6">
                <div class="pt-32 pb-12 md:pt-40 md:pb-20">
                    <div class="max-w-3xl mx-auto text-center">
                        <!-- 404 content -->
                        <h1 class="h1 mb-4" data-aos="zoom-y-out">Oh, No! You stumbled upon a rarity</h1>
                        <div class="mt-8">
                            <router-link class="btn text-white bg-blue-600 hover:bg-blue-700" to="/">Go back home</router-link>
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
import Header from './partials/Header.vue'
import Footer from './partials/Footer.vue'

export default {
    name: 'Features',
    components: {
        Header,
        Footer,
    },
}
</script>
