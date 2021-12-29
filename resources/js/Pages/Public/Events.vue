<template>
    <public-layout>

        <section class="px-4 sm:px-6 max-w-6xl mt-8 mx-auto py-32 md:pt-40">

            <div class="max-w-4xl mx-auto">
                <h1 class="h1 mb-5 text-center">Veranstaltungen</h1>
                <p class="text-xl text-gray-600 text-center pb-12">
                    Wir sind nicht nur eine Kirche, wir sind Gemeinschaft. <br> Sie sind herzlich eingeladen zu unseren Veranstaltungen zu kommen.
                </p>
            </div>



            <div class="py-12 border-t border-gray-200">

                <div
                    class="max-w-sm mx-auto grid gap-8 md:gap-16 md:grid-cols-2 lg:grid-cols-3  md:max-w-2xl lg:max-w-5xl pt-8 md:pt-10">
                    <!-- 1st item -->
                    <div class="text-center">
                        <div class="h3 mb-1">Gottesdienst</div>
                        <div class="text-gray-600">
                            <p>Jeden Sonntag um 10 Uhr</p>
                            <p>Infos unter <a class="underline" href="069911848920">0699 11848920</a></p>
                        </div>
                    </div>

                    <!-- 2nd item -->
                    <div class="text-center">
                        <div class="h3 mb-1">Gemeindegebet</div>
                        <div class="text-gray-600">
                            <p>Wöchentlich Montag um 10:00 Uhr</p>
                            <p>Infos unter <a class="underline" href="tel:069981907805">0699 81907805</a></p>
                        </div>
                    </div>

                    <!-- 3rd item -->
                    <div class="text-center">
                        <div class="h3 mb-1">Hefel Café</div>
                        <div class="text-gray-600">
                            <p>Jeden ersten Samstag im Monat von 09:00 bis 14:00 Uhr</p>
                            <p>Unterhaltung, Austausch und Vernetzung bei Kuchen und Kaffee</p>
                        </div>
                    </div>

                    <div class="text-center">
                        <div class="h3 mb-1">Bibelstunde</div>
                        <div class="text-gray-600">
                            <p>14-tägig gerade Wochen, jeweils Mittwoch um 17:00 Uhr</p>
                            <p>Infos unter <a class="underline" href="tel:06505893093">0650 5893093</a></p>
                        </div>
                    </div>

                    <div class="text-center">
                        <div class="h3 mb-1">Hauskreis</div>
                        <div class="text-gray-600">
                            <p>14-tägig, ungerade Wochen, jeweils Mittwoch und Freitag um 19:00 bzw. 09:00 Uhr</p>
                            <p>Infos unter <a class="underline" href="tel:067761019425">0677 61019425</a></p>
                        </div>
                    </div>

                    <div class="text-center">
                        <div class="h3 mb-1">Gebet & Seelsorge</div>
                        <div class="text-gray-600">
                            <p>Bei Bedarf und Anfrage</p>
                            <p>Bitte melde dich bei <a class="underline" href="tel:067761019425">0650 5893093</a></p>
                        </div>
                    </div>
                </div>
            </div>

        </section>

    </public-layout>
</template>

<script>
import PublicLayout from "@/Layouts/PublicLayout";

export default {
    name: "Events",
    components: {PublicLayout}
}
</script>

<style scoped>

</style>
