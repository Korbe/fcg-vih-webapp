<template>
    <section class="relative">

        <!-- Illustration behind hero content -->
        <div aria-hidden="true" class="absolute left-1/2 transform -translate-x-1/2 bottom-0 pointer-events-none">
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

            <!-- Hero content -->
            <div class="pt-32 pb-12 md:pt-44 md:pb-20">



                <!-- Section header -->
                <div class="text-center pb-12 md:pb-16">

                    <logo class="mx-auto pb-10"></logo>

                    <h1 class="text-5xl md:text-6xl font-extrabold leading-tighter tracking-tighter mb-4">Freie Christengemeinde Villach</h1>
                    <div class="max-w-3xl mx-auto">
                        <p class="text-xl text-gray-600 my-10">Herzlich Willkommen, wir sind eine Gruppe Christus-gläubiger Menschen. Es erwartet Sie ein
                            buntes Gemisch von Menschen, die nie beisammen wären, wenn Sie nicht Christus kennengelernt hätten.</p>
                        <div class="max-w-xs mx-auto sm:max-w-none sm:flex sm:justify-center">
                            <div>
                                <inertia-link :href="route('public.about')" class="btn text-white bg-brand-primary-default hover:bg-brand-primary-light w-full mb-4 sm:w-auto sm:mb-0" href="#0">Mehr
                                    erfahren</inertia-link>
                            </div>
                            <div>
                                <inertia-link :href="route('public.contact') + '#form'" class="btn text-white bg-brand-secondary-default hover:bg-brand-secondary-light w-full sm:w-auto sm:ml-4">Um Gebet
                                    bitten</inertia-link>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </section>
</template>

<script>
import Logo from "@/Pages/Public/partials/Logo";
export default {
    name: 'HeroHome',
    components: {Logo},
}
</script>
