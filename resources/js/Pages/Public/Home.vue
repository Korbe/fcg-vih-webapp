<template>
    <public-layout title="Home">
        <hero/>

        <div>
            <div class="relative pt-24 bg-white overflow-hidden">
                <div class="relative px-4 sm:px-6 lg:px-8">
                    <div class="text-lg max-w-prose mx-auto">
                        <h1 id="freie-christengemeinde" style="scroll-margin: 7rem">
                            <span class="block text-base text-center text-brand-primary font-semibold tracking-wide uppercase">Freie Christengemeinde Villach</span>
                            <span class="mt-2 block text-3xl text-center leading-8 font-extrabold tracking-tight text-gray-900 sm:text-4xl">Willkommen auf unserer Homepage</span>
                        </h1>
                        <p class="mt-8 text-xl text-gray-500 leading-8">Als Freie Christengemeinde – Pfingstgemeinde ist es uns ein Anliegen, den Menschen in unserem Land zu dienen, indem wir die gute
                            Nachricht von Jesus Christus gesellschaftsrelevant verkündigen und praktizieren.</p>
                    </div>
                </div>
            </div>
        </div>





        <div class="relative bg-gray-900 mb-10">
            <div class="h-56 bg-brand-primary-300 sm:h-72 md:absolute md:left-0 md:h-full md:w-1/2">
                <img class="w-full h-full object-cover"
                     src="https://images.unsplash.com/photo-1582880159736-8bb57334d2f5?auto=format&fit=crop&w=1920&q=60&blend=87DDF8&sat=-100&blend-mode=multiply"
                     alt=""/>
            </div>
            <div class="relative max-w-7xl mx-auto px-4 py-12 sm:px-6 lg:px-8 lg:py-16">
                <div class="md:ml-auto md:w-1/2 md:pl-10">
                    <h2 class="text-base font-semibold uppercase tracking-wider text-brand-primary-300">Sonntags</h2>
                    <p class="mt-2 text-white text-3xl font-extrabold tracking-tight sm:text-4xl">Gottesdienst</p>
                    <p class="mt-3 text-lg text-gray-300">
                        Jeden Sonntag findet bei uns um 10 Uhr der Gottesdienst statt.
                        Beginnend mit dem Lobpreis und Anbetung Gottes stimmen wir den Gottesdienst ein. Anschließend predigt unser Pastor. Für die Kleinen gibt's einen speziellen
                        Kindergottesdienst. Die Predigt wird anschließend hier als Audioformat hochgeladen. Es ist keine Anmeldung erforderlich!
                    </p>

                    <div class="mt-3 flex text-lg text-white">
                        <ClockIcon class="h-6 w-6 mr-2"/>
                        <p class="ml-2">Sonntags 10 Uhr</p>
                    </div>

                    <div class="mt-3 flex text-lg text-white">
                        <LocationMarkerIcon class="h-6 w-6 mr-2"/>
                        <p class="ml-2">Vassacherstraße 28, 9500 Villach</p>
                    </div>

                    <div class="mt-8">
                        <div class="inline-flex rounded-md shadow">
                            <Link :href="route('public.events')"
                                  class="inline-flex items-center justify-center px-5 py-3 border border-transparent text-base font-medium rounded-md text-gray-900 bg-white hover:bg-gray-50">
                                Alle Events anschauen
                            </Link>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <news />


        <!--        <stats/>-->


        <testimonials />

        <!--        <Stats2/>-->

        <faq :items="faqs"/>

        <Cta></Cta>

        <Footer/>

    </public-layout>
</template>

<script>
import {LocationMarkerIcon, ClockIcon} from "@heroicons/vue/outline";
import PublicLayout from "@/Layouts/PublicLayout";
import Hero from '../../Partials/Home/Hero.vue'
import Stats2 from "@/Partials/Home/Stats2";
import Stats from "@/Partials/Home/Stats";
import Testimonials from "@/Partials/Home/Testimonials";
import Cta from "@/Partials/Home/Cta";
import Footer from "@/Partials/Footer";
import Faq from "@/Partials/Faq";
import News from "@/Partials/Home/News";

export default {
    name: 'Home',
    components: {
        News,
        Faq,
        Footer,
        Cta,
        Testimonials,
        Stats,
        Stats2,
        PublicLayout,
        Hero,
        LocationMarkerIcon, ClockIcon
    },
    data() {
        return {
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
