<template>
    <public-layout title="Events">
        <Nav/>

        <div class="text-center pt-32 pb-20 px-5 bg-gradient-to-b from-white to-gray-100">
            <h1 class="text-4xl tracking-tight font-extrabold text-gray-900 sm:text-5xl md:text-6xl">
                Sie sind <span class="text-brand-primary">willkommen</span>
            </h1>
            <p class="mt-3 max-w-5xl text-gray-500 mx-auto text-xl sm:text-lg md:mt-5 lg:max-w-3xl md:text-xl">
                Wir sind nicht nur eine Kirche, wir sind Gemeinschaft. Sie sind herzlich willkommen unsere Veranstaltungen zu besuchen.
            </p>
        </div>

        <div class="bg-gray-100">
            <div class="pb-28 max-w-7xl mx-auto">
                <ul role="list" class="px-4 grid grid-cols-1 gap-8 sm:grid-cols-2 lg:grid-cols-3 text-base text-gray-500">
                    <li v-for="event in events" :key="event.email"
                        class="col-span-1 flex flex-col bg-white rounded-lg shadow hover:shadow-lg divide-y divide-gray-200">
                        <div class="w-full p-6">
                            <h1 class="text-gray-900 text-xl font-medium ">{{ event.name }}</h1>
                            <p class="mt-1 text-sm text-gray-500"></p>
                            <div class="mt-4 space-y-2 align-items-center">
                                <div class="flex">
                                    <CalendarIcon class="h-6 w-6 text-brand-primary-500"/>
                                    <p class="ml-2">{{ event.interval }}</p>
                                </div>
                                <div class="flex">
                                    <ClockIcon class="h-6 w-6 text-brand-secondary"/>
                                    <p class="ml-2">{{ event.time }}</p>
                                </div>
                                <div class="flex">
                                    <UserCircleIcon class="h-6 w-6 text-gray-500"/>
                                    <p class="ml-2">{{ event.responsible }}</p>
                                </div>
                            </div>

                        </div>
                        <div>
                            <div class="-mt-px flex divide-x divide-gray-200">
                                <div class="w-0 flex-1 flex">
                                    <a :href="`mailto:office@`"
                                       class="relative -mr-px w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-bl-lg hover:text-gray-500">
                                        <MailIcon class="w-5 h-5 text-gray-400" aria-hidden="true"/>
                                        <span class="ml-3">Schreiben</span>
                                    </a>
                                </div>
                                <div class="-ml-px w-0 flex-1 flex">
                                    <a :href="`tel:${event.phone}`"
                                       class="relative w-0 flex-1 inline-flex items-center justify-center py-4 text-sm text-gray-700 font-medium border border-transparent rounded-br-lg hover:text-gray-500">
                                        <PhoneIcon class="w-5 h-5 text-gray-400" aria-hidden="true"/>
                                        <span class="ml-3">Anrufen</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <Footer/>
    </public-layout>
</template>

<script>
import PublicLayout from "@/Layouts/PublicLayout";
import {CalendarIcon, ClockIcon, MailIcon, PhoneIcon, UserCircleIcon, UserIcon} from "@heroicons/vue/outline";
import Nav from "@/Partials/Nav";
import Footer from "@/Partials/Footer";

export default {
    name: "Events",
    components: {Footer, Nav, PublicLayout, PhoneIcon, CalendarIcon, ClockIcon, MailIcon, UserIcon, UserCircleIcon},
    data() {
        return {
            events: [
                {
                    name: "Gottesdienst",
                    interval: "Sonntags",
                    time: "10 Uhr",
                    description: "",
                    responsible: "Erika Korbitsch",
                    phone: "069911848920",
                    mail: "office@fcg-villach.at"
                },
                {
                    name: "Gemeindegebet",
                    interval: "Montags",
                    time: '10 Uhr',
                    description: "",
                    responsible: "Jasmina Blagojevic",
                    phone: "0699 81907805",
                    mail: "office@fcg-villach.at"
                },
                {
                    name: "Hefel Café",
                    interval: "Jeden ersten Samstag im Monat",
                    time: "9 bis 14 Uhr",
                    description: "Unterhaltung, Austausch und Vernetzung bei Kuchen und Kaffee",
                    responsible: "Erika Korbitsch",
                    phone: "069911848920",
                    mail: "office@fcg-villach.at"
                },
                {
                    name: "Bibelstunde",
                    interval: "Gerade Wochen, Mittwoch",
                    time: "17 Uhr",
                    description: "",
                    responsible: "Christian Korbitsch",
                    phone: "06505893093",
                    mail: "office@fcg-villach.at"
                },
                {
                    name: "Hauskreis",
                    interval: "Ungerade Wochen, Mittwoch und Freitag",
                    time: "19 bzw. 9 Uhr",
                    description: "",
                    responsible: "Andrea Kirisits",
                    phone: "067761019425",
                    mail: "office@fcg-villach.at"
                },
                {
                    name: "Gebet & Seelsorge",
                    interval: "Auf Anfrage",
                    time: "Jederzeit",
                    description: "",
                    responsible: "Christian Korbitsch",
                    phone: "0650 5893093",
                    mail: "office@fcg-villach.at"
                },
            ]
        }
    }
}
</script>
