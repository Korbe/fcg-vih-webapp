<template>
    <public-layout title="Spenden">
            <Nav/>

            <div class="mt-10 sm:mt-12 md:mt-16 lg:mt-20 xl:mt-28 bg-white text-center px-5">
                <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                    Ihre Spende <span class="text-brand-primary">hilft</span>
                </h1>
                <p class="mt-3 text-xl text-gray-500 max-w-5xl lg:max-w-4xl mx-auto sm:text-lg md:mt-5 md:text-xl">
                    Wir finanziern uns ausschließlich aus Spendenmitteln. Wenn Sie uns unterstützen möchten, bitten wir Sie auf folgendes Konto zu spenden.
                </p>
            </div>

            <div class="max-w-3xl mx-auto px-5 my-12 lg:mt-14 lg:my-20 grid md:grid-cols-2 gap-4">
                <div>
                    <label for="card_holder" class="block text-medium font-medium text-gray-700">Kontoinhaber</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <CreditCardIcon class="h-5 w-5 text-brand-primary" aria-hidden="true"/>
                        </div>

                        <input id="card_holder" @click="copyHolder($event, card_holder)" type="text" readonly
                               class="focus:ring-brand-primary focus:border-brand-primary block w-full pl-10 pr-10 text-medium border-gray-300 rounded-md"
                               :value="card_holder"/>
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <span class="inline-block bg-gray-900 text-white rounded px-2 mr-2">{{ copyHolderText }}</span>
                            <DocumentDuplicateIcon class="h-5 w-5 text-gray-400" aria-hidden="true"/>
                        </div>
                    </div>
                </div>

                <div>
                    <label for="card_iban" class="block text-medium font-medium text-gray-700">IBAN</label>
                    <div class="mt-1 relative rounded-md shadow-sm">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <CreditCardIcon class="h-5 w-5 text-brand-secondary" aria-hidden="true"/>
                        </div>

                        <input id="card_iban" @click="copyIban($event, card_iban)" type="text" readonly
                               class="focus:ring-brand-secondary focus:border-brand-secondary block w-full pl-10 pr-10 text-medium border-gray-300 rounded-md"
                               :value="card_iban"/>
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <span class="inline-block bg-gray-900 text-white rounded px-2 mr-2">{{ copyIbanText }}</span>
                            <DocumentDuplicateIcon class="h-5 w-5 text-gray-400" aria-hidden="true"/>
                        </div>
                    </div>
                </div>
            </div>

            <div class="bg-gradient-to-b from-white to-gray-100">
                <div class="max-w-6xl mx-auto px-5 sm:px-6 pb-16 lg:px-8">
                    <div class="lg:grid lg:grid-cols-2 lg:gap-8 lg:items-center">
                        <div>
                            <h2 class="text-3xl font-extrabold text-gray-900 sm:text-4xl">Ihrer Spende erreicht auch <span class="text-brand-primary">andere</span></h2>
                            <div class="pt-3">
                                <figure class="prose lg:prose-lg ">
                                    <blockquote>
                                        <p>Jeder gebe, wie er sich in seinem Herzen vorgenommen hat. Nicht mit Verdruss oder aus Zwang, denn einen <b>fröhlichen</b> Geber liebt Gott.</p>
                                    </blockquote>
                                    <figcaption class="">2. Korinther 9, 7</figcaption>
                                </figure>
                            </div>
                        </div>
                        <div class="mt-8 grid grid-cols-2 gap-0.5 md:grid-cols-3 lg:mt-0 lg:grid-cols-2">
                            <div v-for="org in organizations" :key="org.name" class="col-span-1 flex justify-center py-8 px-8">
                                <img class="max-h-12 grayscale hover:grayscale-0" :src="org.logo" :alt="org.name"/>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        <Footer/>
    </public-layout>
</template>

<script>
import {Popover, PopoverButton, PopoverPanel} from '@headlessui/vue'
import {ClipboardIcon, CreditCardIcon, DocumentDuplicateIcon, UserCircleIcon} from "@heroicons/vue/outline";
import Nav from "@/Partials/Nav";
import Footer from "@/Partials/Footer";
import PublicLayout from "../../Layouts/PublicLayout";

export default {
    name: "Donate",
    components: {
        PublicLayout,
        Footer,
        Nav,
        ClipboardIcon,
        UserCircleIcon, CreditCardIcon, DocumentDuplicateIcon, Popover, PopoverButton, PopoverPanel
    },
    data() {
        return {
            card_holder: 'FCG Villach',
            copyHolderText: null,
            card_iban: 'AT60 1700 0001 5300 0905',
            copyIbanText: null,
            organizations: [
                {
                    name: 'ampuls',
                    logo: '/images/partner/ampuls.png'
                },
                {
                    name: 'impact-at',
                    logo: '/images/partner/impact-at.png'
                },
                {
                    name: 'prolife-eu',
                    logo: '/images/partner/prolife-eu.png'
                },
                {
                    name: 'sozialetagesstaetteraphael',
                    logo: '/images/partner/sozialetagesstaetteraphael.png'
                },
                {
                    name: '',
                    logo: '/images/partner/avc.png'
                },
                {
                    name: 'Hier Fehlt eines',
                    logo: '/images/partner/HierFehltEines.jpg'
                },
            ]
        }
    },
    methods: {
        copyIban($event, content) {
            this.copy(content);

            this.copyIbanText = "Kopiert!";
            $event.target.select();

            setTimeout(() => {
                this.copyIbanText = null
            }, 1000);

        },
        copyHolder($event, content) {
            this.copy(content);

            this.copyHolderText = "Kopiert!";
            $event.target.select();

            setTimeout(() => {
                this.copyHolderText = null
            }, 1000);

        },
        async copy(content) {
            return this.$copyText(content).then((e) => {
                return true
            }, (e) => {
                return false
            });
        }
    }
}
</script>
