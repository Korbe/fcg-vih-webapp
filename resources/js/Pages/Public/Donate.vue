<template>
    <public-layout title="Spenden">



        <div class="flex flex-col min-h-screen">

            <Navbar />

            <div class="flex flex-grow bg-gradient-to-b from-white to-gray-100 justify-center items-center">

                <div>
                    <div class="text-center mt-16 sm:mt-12 md:mt-16 lg:mt-20 xl:mt-28 px-5">
                        <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                            Ihre Spende <span class="text-brand-primary">hilft</span>
                        </h1>
                        <p
                            class="mt-3 text-xl text-gray-500 max-w-5xl lg:max-w-4xl mx-auto sm:text-lg md:mt-5 md:text-xl">
                            Wir finanziern uns ausschließlich aus Spendenmitteln. Wenn Sie uns unterstützen möchten,
                            bitten
                            wir
                            Sie auf folgendes Konto zu spenden.
                        </p>
                    </div>

                    <div class="max-w-3xl mx-auto px-5 my-12 lg:my-14 lg:my-20 grid md:grid-cols-2 gap-4">
                        <div>
                            <label class="block text-medium font-medium text-gray-700"
                                for="card_holder">Kontoinhaber</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <CreditCardIcon aria-hidden="true" class="h-5 w-5 text-brand-primary" />
                                </div>

                                <input id="card_holder" :value="card_holder"
                                    class="cursor-pointer focus:ring-brand-primary focus:border-brand-primary block w-full pl-10 pr-10 text-medium border-gray-300 rounded-md"
                                    readonly type="text" @click="copyHolder($event, card_holder)" />
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <span class="inline-block bg-gray-900 text-white rounded px-2 mr-2">{{
                                        copyHolderText
                                    }}</span>
                                    <DocumentDuplicateIcon aria-hidden="true" class="h-5 w-5 text-gray-400" />
                                </div>
                            </div>
                        </div>

                        <div>
                            <label class="block text-medium font-medium text-gray-700" for="card_iban">IBAN</label>
                            <div class="mt-1 relative rounded-md shadow-sm">
                                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                                    <CreditCardIcon aria-hidden="true" class="h-5 w-5 text-brand-secondary" />
                                </div>

                                <input id="card_iban" :value="card_iban"
                                    class="cursor-pointer focus:ring-brand-secondary focus:border-brand-secondary block w-full pl-10 pr-10 text-medium border-gray-300 rounded-md"
                                    readonly type="text" @click="copyIban($event, card_iban)" />
                                <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                                    <span class="inline-block bg-gray-900 text-white rounded px-2 mr-2">{{
                                        copyIbanText
                                    }}</span>
                                    <DocumentDuplicateIcon aria-hidden="true" class="h-5 w-5 text-gray-400" />
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="max-w-6xl mx-auto px-5 sm:px-6 lg:px-8">
                        <div class="lg:grid lg:grid-cols-2 lg:gap-8 lg:items-center">
                            <div>
                                <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">Ihre Spende erreicht auch
                                    <span class="text-brand-secondary">andere</span>
                                </h2>
                                <div class="pt-3">
                                    <figure class="prose lg:prose-lg ">
                                        <blockquote>
                                            <p>Jeder gebe, wie er sich in seinem Herzen vorgenommen hat. Nicht mit
                                                Verdruss
                                                oder
                                                aus Zwang, denn einen <b>fröhlichen</b> Geber liebt Gott.</p>
                                        </blockquote>
                                        <figcaption class="">2. Korinther 9, 7</figcaption>
                                    </figure>
                                </div>
                            </div>
                            <div class="mt-8 grid grid-cols-2 gap-0.5 md:grid-cols-3 lg:mt-0 lg:grid-cols-2">
                                <div v-for="org in organizations" :key="org.name"
                                    class="col-span-1 flex justify-center py-8 px-8">
                                    <a :href="org.link" target="_blank">
                                        <img loading="lazy" :alt="org.name" :src="org.logo" class="max-h-12" />
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </public-layout>
</template>

<script setup>
import { ref } from "vue";
import { CreditCardIcon, DocumentDuplicateIcon } from "@heroicons/vue/24/outline";
import Navbar from "@/Partials/Navbar.vue";
import PublicLayout from "@/Layouts/PublicLayout.vue";

// Reaktive Werte
const card_holder = ref('FCG Villach');
const copyHolderText = ref(null);
const card_iban = ref('AT60 1700 0001 5300 0905');
const copyIbanText = ref(null);

const organizations = [
    {
        name: 'Gospelvan',
        logo: '/images/partner/gospelvan.png',
        link: 'https://www.gospelvan.at',
    },
    {
        name: 'ampuls',
        logo: '/images/partner/ampuls.png',
        link: 'https://ampuls.or.at',
    },
    {
        name: 'Soziale Tagesstaette Raphael',
        logo: '/images/partner/sozialetagesstaetteraphael.png',
        link: 'http://soziale-tagestaette-raphael.at',
    },
    {
        name: 'aktion verfolgter christen',
        logo: '/images/partner/avc.png',
        link: 'http://avc-at.org/de',
    },
];

// Funktion zum Kopieren von Text
const copyText = async (content, targetRef) => {
    try {
        await navigator.clipboard.writeText(content);
        targetRef.value = "Kopiert!";

        setTimeout(() => {
            targetRef.value = null;
        }, 1000);
    } catch (err) {
        console.error("Fehler beim Kopieren:", err);
    }
};

// Methoden für spezifische Kopieraktionen
const copyIban = () => copyText(card_iban.value, copyIbanText);
const copyHolder = () => copyText(card_holder.value, copyHolderText);
</script>
