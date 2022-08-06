<template>
    <public-layout title="404 - Seite konnte nicht gefunden werden">
        <Navbar />

        <div class="min-h-full pt-16 pb-12 flex flex-col bg-white">
            <main class="flex-grow flex flex-col justify-center max-w-7xl w-full mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex-shrink-0 flex justify-center">
                    <inertia-link href="/" class="inline-flex">
                        <logo-text class="h-48 mx-auto mt-5"></logo-text>
                    </inertia-link>

                </div>
                <div class="py-16">
                    <div class="text-center">
                        <p class="text-sm font-semibold text-brand-primary-600 uppercase tracking-wide">404 Error</p>
                        <h1 class="mt-2 text-4xl font-extrabold text-gray-900 tracking-tight sm:text-5xl">Seite nicht gefunden.</h1>
                        <p class="mt-2 text-base text-gray-500">Entschuldigung, wir konnten die gesuchte Seite nicht finden, überprüfen Sie gegebenenfalls die Adresszeile.</p>
                        <div class="mt-6">
                            <inertia-link href="/" class="text-base font-medium text-brand-primary-600 hover:text-brand-primary-500">Zurück zur Startseite<span aria-hidden="true"> &rarr;</span></inertia-link>
                        </div>
                    </div>
                </div>
            </main>
        </div>

        <Footer />
    </public-layout>
</template>

<script>
import Footer from '../Partials/Footer.vue'
import PublicLayout from "../Layouts/PublicLayout";
import Nav from "../Partials/Navbar";
import LogoText from "../Partials/LogoText";

export default {
    name: 'PageNotFound',
    components: {
        LogoText,
        Navbar,
        PublicLayout,
        Footer,
    },
}
</script>
