<template>
    <section id="visitus" class="relative py-24 bg-white overflow-hidden">
        <div class="relative px-4 sm:px-6 lg:px-8">
            <div class="text-lg max-w-prose mx-auto">
                <h1 id="freie-christengemeinde" style="scroll-margin: 7rem">
                    <span class="block text-base md:text-center text-brand-primary font-semibold tracking-wide uppercase">FCG Villach</span>
                    <span
                        class="mt-2 block text-3xl md:text-center leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">Willkommen auf unserer Homepage</span>
                </h1>
                <p class="mt-8 md:text-center text-xl text-gray-500 leading-8">Als Freie Christengemeinde – Pfingstgemeinde ist es uns
                    ein
                    Anliegen, den Menschen in unserem Land zu dienen, indem wir die gute
                    Nachricht von Jesus Christus gesellschaftsrelevant verkündigen und praktizieren.</p>
                <div class="mt-8 flex justify-left md:justify-center ">
                    <Link :href="route('public.about')"
                                  class="flex rounded-md shadow items-center justify-center px-10 py-3 border border-transparent text-base font-medium rounded-md text-white bg-brand-primary hover:bg-brand-primary-400">
                        <span>Das sind wir</span>
                        <ArrowRightIcon class="h-7 ml-3" />
                    </Link>
                </div>
            </div>
        </div>
    </section>
</template>
<script>
import {ArrowRightIcon} from "@heroicons/vue/24/outline";

export default {
    name: 'welcome',
    components: {
        ArrowRightIcon
    }
}
</script>
