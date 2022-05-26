<template>
    <public-layout title="Kontakt">
        <div class="bg-gradient-to-b from-white to-gray-10">
            <header class="relative pb-36 bg-brand-secondary">
                <div class="absolute inset-0">
                    <img class="w-full h-full object-cover"
                         src="https://images.unsplash.com/photo-1497333558196-daaff02b56d0?auto=format&fit=crop&h=800&w=1920&q=60&sat=-100" alt=""/>
                    <div class="absolute inset-0 bg-brand-primary-1000 mix-blend-multiply" aria-hidden="true"/>
                </div>

                <Nav hasBackground/>

                <div class="relative mt-16 sm:mt-12 md:mt-16 lg:mt-20 xl:mt-28 max-w-md mx-auto px-4 pb-32 sm:max-w-3xl sm:px-6  lg:max-w-7xl lg:px-8">
                    <h1 class="text-4xl tracking-tight font-extrabold text-white sm:text-5xl md:text-6xl">
                        <span class="block xl:inline">Wir freuen uns auf</span>
                        {{ ' ' }}
                        <span class="block text-brand-primary xl:inline">Sie</span>

                    </h1>
                    <p class="mt-3 md:mt-5 max-w-3xl text-xl text-gray-300">Varius facilisi mauris sed sit. Non sed et duis dui leo, vulputate id malesuada non. Cras aliquet purus dui laoreet diam sed lacus,
                        fames. Dui, amet, nec sit pulvinar.</p>
                </div>
            </header>

            <main class="">


                <div class="">
                    <!-- Cards -->
                    <section class="-mt-32 max-w-md mx-auto relative z-10 px-4 sm:max-w-3xl sm:px-6 lg:max-w-7xl lg:px-8" aria-labelledby="contact-heading">
                        <h2 class="sr-only">Kontaktieren Sie uns</h2>
                        <div class="grid grid-cols-1 gap-y-20 lg:grid-cols-3 lg:gap-y-0 lg:gap-x-8">
                            <div v-for="contactDetail in contactDetails" :key="contactDetail.name" class="flex flex-col bg-white rounded-2xl shadow-xl">
                                <div class="flex-1 relative pt-16 px-6 pb-8 md:px-8">
                                    <div class="absolute top-0 p-5 inline-block bg-brand-primary-600 rounded-xl shadow-lg transform -translate-y-1/2">
                                        <component :is="contactDetail.icon" class="h-6 w-6 text-white" aria-hidden="true"/>
                                    </div>
                                    <h3 class="text-xl font-medium text-gray-900">{{ contactDetail.name }}</h3>
                                    <p class="mt-2 text-base text-brand-primary-700">{{ contactDetail.detail }}</p>
                                    <p class="mt-4 text-base text-gray-500">{{ contactDetail.description }}</p>
                                </div>
                                <div class="p-6 bg-gray-50 rounded-bl-2xl rounded-br-2xl md:px-8">
                                    <a :href="contactDetail.href" target="_blank" rel="noopener noreferrer" class="text-base font-medium text-brand-primary-700 hover:text-brand-primary-600">{{
                                        contactDetail.ctaText
                                        }}<span
                                            aria-hidden="true"> &rarr;</span></a>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>

                <div class="bg-gray-50">
                    <faq :items="faqs"></faq>
                </div>

            </main>
        </div>

        <Footer></Footer>
    </public-layout>
</template>

<script>
import {LocationMarkerIcon, MailIcon, PhoneIcon} from "@heroicons/vue/outline";
import Nav from "@/Partials/Nav";
import Footer from "@/Partials/Footer";
import PublicLayout from "../../Layouts/PublicLayout";
import Faq from "@/Partials/Faq";

export default {
    name: "Contact",
    components: {
        Faq,
        PublicLayout,
        Footer,
        Nav,
        LocationMarkerIcon,
        MailIcon,
        PhoneIcon,
    },
    data() {
        return {
            contactDetails: [
                {
                    name: 'Rufen Sie uns an',
                    detail: '+43 650 58 93 0 93',
                    href: 'tel:+436505893093',
                    description: 'Varius facilisi mauris sed sit. Non sed et duis dui leo, vulputate id malesuada non. Cras aliquet purus dui laoreet diam sed lacus, fames.',
                    icon: PhoneIcon,
                    ctaText: 'Anrufen',
                },
                {
                    name: 'Schreiben Sie uns',
                    detail: 'office@fcg-villach.at',
                    href: 'mailto:office@fcg-villach.at',
                    description: 'Varius facilisi mauris sed sit. Non sed et duis dui leo, vulputate id malesuada non. Cras aliquet purus dui laoreet diam sed lacus, fames.',
                    icon: MailIcon,
                    ctaText: 'Schreiben',
                },
                {
                    name: 'Besuchen Sie uns',
                    detail: 'Vassacherstraße 28, 9500 Villach',
                    href: 'https://goo.gl/maps/fDxswRLhh9dfKHUZ8',
                    description: 'Varius facilisi mauris sed sit. Non sed et duis dui leo, vulputate id malesuada non. Cras aliquet purus dui laoreet diam sed lacus, fames.',
                    icon: LocationMarkerIcon,
                    ctaText: 'Finden',
                },
            ],
            faqs: [
                {
                    question: "Wie lange dauert ein Gottesdienst?",
                    answer: "Der Gottesdienst dauert durchschnittlich 90 Minuten.",
                },
                {
                    question: "Muss ich für den Gottesdienst etwas bezahlen oder werde ich während des Gottesdienstes nach Geld gefragt?",
                    answer: "Jeder ist willkommen, den Gottesdienst zu besuchen und es ist absolut kostenlos. Wir sammeln eine Kollekte ein, das Teil des Gottesdienstes ist. Jedoch ist niemand gezwungen, etwas zu geben und du darfst es gerne an dir vorbeigehen lassen.",
                },
                {
                    question: "Was soll ich anziehen bzw. gibt es einen Dress Code?",
                    answer: "Jeder kann so kommen, wie er sich wohl fühlt und es für angemessen hält.",
                },
                {
                    question: "Gibt es ein extra Kinderprogramm?",
                    answer: "Ja, bei jedem Gottesdienst gibt es parallel eine Kinderstunde und einen Raum für Eltern mit kleinen Kindern, wo sie auch den Gottesdienst mithören können.",
                },
                {
                    question: "Muss ich Mitglied werden?",
                    answer: "Nein. Zu unseren Gottesdiensten kommen die verschiedensten Menschen. Wir sehen es als unsere Aufgabe, ein Segen für alle Menschen zu sein, auch für die, die nicht aktiv in unserer Gemeinde involviert sind!",
                },
                {
                    question: "Was läuft unter der Woche?",
                    answer: "Unter der Woche finden Gebetsstunden, Hauskreise und Bibelstunden in Raum Villach statt. Dort liest man gemeinsam in der Bibel, tauscht sich über das Gelesene aus, betet miteinander und unterstützt sich gegenseitig.",
                },
            ],
        }
    }
}
</script>

<style scoped>

</style>
