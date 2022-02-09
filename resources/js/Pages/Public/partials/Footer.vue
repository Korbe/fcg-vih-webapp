<template>
    <footer>
        <div class="max-w-6xl mx-auto px-4 sm:px-6">

            <!-- Top area: Blocks -->
            <div class="grid sm:grid-cols-12 gap-8 py-8 md:py-12 border-t border-gray-200">

                <!-- 1st block -->
                <div class="sm:col-span-12 lg:col-span-3">
                    <div class="mb-2">
                        <!-- Logo -->
                        <inertia-link href="/" class="inline-block" aria-label="Cruip">
                            <logo class="h-20" />
                        </inertia-link>
                    </div>
                </div>

                <!-- 2nd block -->
                <div class="sm:col-span-6 md:col-span-3 lg:col-span-2">
                    <h6 class="text-gray-800 font-medium mb-2">FCG Villach</h6>
                    <ul class="text-sm">
                        <li class="mb-2">
                            <inertia-link :href="route('public.impressum')" class="text-gray-600 hover:text-gray-900 transition duration-150 ease-in-out">Impressum</inertia-link>
                        </li>
                        <li class="mb-2">
                            <inertia-link :href="route('public.datenschutz')" class="text-gray-600 hover:text-gray-900 transition duration-150 ease-in-out">Datenschutz</inertia-link>
                        </li>
                    </ul>
                </div>

                <!-- 3rd block -->
                <div class="sm:col-span-7 md:col-span-4 lg:col-span-3">
                    <h6 class="text-gray-800 font-medium mb-2">Besuchen Sie auch</h6>
                    <ul class="text-sm">
                        <li class="mb-2">
                            <a href="" class="text-gray-600 hover:text-gray-900 transition duration-150 ease-in-out">Pfingstbewegung Österreich</a>
                        </li>
                        <li class="mb-2">
                            <a href="" class="text-gray-600 hover:text-gray-900 transition duration-150 ease-in-out">Freikirchen in Österreich</a>
                        </li>
                        <li class="mb-2">
                            <a href="" class="text-gray-600 hover:text-gray-900 transition duration-150 ease-in-out">Soziale Tagesstaette Raphael</a>
                        </li>
                        <li class="mb-2">
                            <a href="" class="text-gray-600 hover:text-gray-900 transition duration-150 ease-in-out">Hilfe die ankommt</a>
                        </li>
                        <li class="mb-2">
                            <a href="" class="text-gray-600 hover:text-gray-900 transition duration-150 ease-in-out">4M Charakterwochenende Österreich</a>
                        </li>
                    </ul>
                </div>

                <!-- 4th block -->
                <div class="sm:col-span-7 md:col-span-4 lg:col-span-3">

                    <ul class="text-sm mt-8">
                        <li class="mb-2">
                            <a href="" class="text-gray-600 hover:text-gray-900 transition duration-150 ease-in-out">Impact Innenmission</a>
                        </li>
                        <li class="mb-2">
                            <a href="" class="text-gray-600 hover:text-gray-900 transition duration-150 ease-in-out">AmPuls Außenmission</a>
                        </li>
                        <li class="mb-2">
                            <a href="" class="text-gray-600 hover:text-gray-900 transition duration-150 ease-in-out">Frauenfrühstückstreffen</a>
                        </li>
                        <li class="mb-2">
                            <a href="" class="text-gray-600 hover:text-gray-900 transition duration-150 ease-in-out">AVC „Aktion für verfolgte Christen und
                                Notleidende“</a>
                        </li>
                    </ul>
                </div>
            </div>

            <!-- Bottom area -->
            <div class="md:flex md:items-center md:justify-between py-4 md:py-8">
                <div class="text-sm text-gray-600 mr-4">&copy; 2022 FCG Villach</div>
            </div>

        </div>
    </footer>
</template>

<script>
import Logo from "@/Pages/Public/partials/Logo";
export default {
    name: "Footer",
    components: {Logo},
}
</script>
