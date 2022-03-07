<template>
    <public-layout title="Spenden">
        <div class="relative">
            <Nav/>

            <main class="lg:relative">
                <div class="mx-auto max-w-7xl w-full pt-16 pb-24 lg:py-48 lg:text-left">
                    <div class="px-4 lg:w-1/2 sm:px-8 xl:pr-16">

                        <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl lg:text-5xl xl:text-6xl">
                            <span class="block ">Ihre Spende</span>
                            {{ ' ' }}
                            <span class="block text-brand-primary xl:inline">hilft</span>
                        </h1>
                        <p class="mt-3 max-w-md  text-lg text-gray-500 sm:text-xl md:mt-5 md:max-w-3xl">
                            Die Freie Christengemeinde Villach wird ausschließlich aus Spendenmitteln finanziert.
                        </p>
                        <p class="mt-3 max-w-md  text-lg text-gray-500 sm:text-xl md:mt-5 md:max-w-3xl">Wenn Sie uns unterstützen
                            möchten, bitten wir Sie auf folgendes
                            Konto zu spenden.</p>


                        <div class="mt-8 grid md:grid-cols-2 gap-4">

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

                        <div class="px-3 py-5 text-center">
                            <figure class="prose lg:prose-lg ">
                                <blockquote>
                                    <p>Jeder gebe, wie er sich in seinem Herzen vorgenommen hat - nicht mit Verdruss oder aus Zwang, denn einen <b>fröhlichen</b> Geber liebt Gott.</p>
                                </blockquote>
                                <figcaption class="">2. Korinther 9, 7</figcaption>
                            </figure>
                        </div>

                        <h2 class="mt-5 text-center text-gray-900 text-2xl font-extrabold">Vielen Dank, Gott segne Sie.</h2>
                    </div>
                </div>
                <div class="relative w-full h-64 sm:h-72 md:h-96 lg:absolute lg:inset-y-0 lg:right-0 lg:w-1/2 lg:h-full">
                    <img class="absolute inset-0 w-full h-full object-cover"
                         src="https://images.unsplash.com/photo-1574607383476-f517f260d30b?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=2148&q=80" alt=""/>
                </div>
            </main>
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
            card_iban: 'AT78 1700 0001 5300 0387',
            copyIbanText: null,
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
