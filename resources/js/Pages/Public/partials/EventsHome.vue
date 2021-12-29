<template>
    <div class="max-w-4xl mx-auto pt-32 border-t border-gray-200">
        <h1 class="h1 mb-5 text-center">Veranstaltungen</h1>
        <p class="text-xl text-gray-600 text-center">
            Wir sind nicht nur eine Kirche, wir sind Gemeinschaft. <br> Sie sind herzlich eingeladen zu unseren Veranstaltungen zu kommen.
        </p>
    </div>


    <div class="py-12">

        <div class="max-w-sm mx-auto grid gap-8 md:gap-16 md:grid-cols-2 lg:grid-cols-3 md:max-w-2xl lg:max-w-5xl pt-8 md:pt-10">
            <div class="text-center">
                <div class="h3 mb-1 text-">Gottesdienst</div>
                <div class="text-gray-600">
                    <p>Sonntags um 10 Uhr</p>
                    <p>Infos unter <a class="underline" href="069911848920">0699 11848920</a></p>
                </div>
            </div>

            <div class="text-center">
                <div class="h3 mb-1">Gemeindegebet</div>
                <div class="text-gray-600">
                    <p>Montags um 10:00 Uhr</p>
                    <p>Infos unter <a class="underline" href="tel:069981907805">0699 81907805</a></p>
                </div>
            </div>

            <div class="text-center">
                <div class="h3 mb-1">Hefel Café</div>
                <div class="text-gray-600">
                    <p>Jeden ersten Samstag im Monat von 09:00 bis 14:00 Uhr</p>
                </div>
            </div>
        </div>

        <div class="text-center mt-20">
            <inertia-link :href="route('public.events')" class="btn text-white bg-brand-secondary-default hover:bg-brand-secondary-light w-full mb-4 sm:w-auto sm:mb-0" href="#0">
                Alle Veranstaltungen ansehen
            </inertia-link>
        </div>
    </div>
</template>

<script>
export default {
    name: "EventsHome"
}
</script>

<style scoped>

</style>
