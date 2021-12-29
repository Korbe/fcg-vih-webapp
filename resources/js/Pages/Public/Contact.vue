<template>
    <public-layout>

        <section class="bg-gradient-to-b from-white to-gray-100">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 py-32 md:pt-40 mt-8 md:pb-20">

                <!-- Section header -->
                <div class="max-w-3xl mx-auto text-center pb-10">
                    <h1 class="h1 mb-4">Kontakt</h1>
                    <p class="text-xl text-gray-600">Sie erreichen uns per Telefon, E-Mail oder bequem über unser Kontaktformular.</p>
                </div>

                <div class="max-w-sm mx-auto text-center grid gap-6 md:grid-cols-2 lg:grid-cols-3 items-start md:max-w-2xl lg:max-w-none" data-aos-id-blocks>

                    <a href="tel:+436505893093">
                        <div class="relative flex flex-col p-6 bg-white rounded shadow-xl">
                            <svg class="mx-auto w-12 h-12 mb-3" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                                <g fill="none" fill-rule="evenodd">
                                    <circle class="fill-current text-brand-primary-default" cx="24" cy="24" r="24"/>
                                    <g stroke-width="2">
                                        <path class="stroke-current text-blue-300"
                                              d="M19.799 29.601C21.092 31.61 23.826 33 27 33c.59 0 1.163-.051 1.716-.142L33 35v-4.04c1.241-1.057 2-2.44 2-3.96 0-1.552-.792-2.961-2.081-4.027"/>
                                        <path class="stroke-current text-white"
                                              d="M23 14c-5.523 0-10 3.582-10 8 0 1.797.75 3.45 2 4.785V32l4.833-2.416c.996.266 2.059.416 3.167.416 5.523 0 10-3.582 10-8s-4.477-8-10-8z"/>
                                    </g>
                                </g>
                            </svg>
                            <h4 class="text-xl font-bold leading-snug tracking-tight mb-1">Telefon</h4>
                            <p class="text-gray-600">+43 650 5893093</p>
                        </div>
                    </a>

                    <a href="mailto:office@fcg-villach.at">
                        <div class="relative flex flex-col p-6 bg-white rounded shadow-xl">
                            <svg class="mx-auto w-12 h-12 mb-3" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                                <g fill="none" fill-rule="evenodd">
                                    <circle class="fill-current text-brand-primary-default" cx="24" cy="24" r="24"/>
                                    <g stroke-width="2">
                                        <path class="stroke-current text-blue-300" d="M29 22h6v11H13V22h5"/>
                                        <path class="stroke-current text-white" d="M21 25h-3v-3l9-9 3 3z"/>
                                    </g>
                                </g>
                            </svg>
                            <h4 class="text-xl font-bold leading-snug tracking-tight mb-1">E-Mail</h4>
                            <p class="text-gray-600">office@fcg-villach.at</p>
                        </div>
                    </a>

                    <a href="https://goo.gl/maps/VvnP1685sz4f5BMh8" target="_blank">
                        <div class="relative flex flex-col p-6 bg-white rounded shadow-xl">
                            <svg class="mx-auto w-12 h-12 mb-3" viewBox="0 0 48 48" xmlns="http://www.w3.org/2000/svg">
                                <g fill="none" fill-rule="evenodd">
                                    <circle class="fill-current text-brand-primary-default" cx="24" cy="24" r="24"/>
                                    <g stroke-width="2">
                                        <path class="stroke-current text-blue-300" d="M33 16L22 27"/>
                                        <path class="stroke-current text-white" d="M33 16l-7 19-4-8-8-4z"/>
                                    </g>
                                </g>
                            </svg>
                            <h4 class="text-xl font-bold leading-snug tracking-tight mb-1">Adresse</h4>
                            <p class="text-gray-600">Vassacherstraße 28, 9500 Villach</p>
                        </div>
                    </a>

                </div>

                <div class="p-3 bg-white rounded shadow-xl mt-6">
                    <iframe class="rounded" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy"
                            src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d685.0079251500073!2d13.84518089062679!3d46.6261358426406!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x477081c082b8e4f7%3A0xce20ee88b28b7a1!2sFreie%20Christengemeinde%20%2F%20Pfingstgemeinde!5e0!3m2!1sde!2sat!4v1640735612012!5m2!1sde!2sat"/>
                </div>

            </div>
        </section>

        <!-- Contact section -->
        <section id="form">
            <div class="max-w-6xl mx-auto px-4 sm:px-6">
                <div class="pt-32 pb-12 md:pt-40 md:pb-20">

                    <!-- Section header -->
                    <div class="max-w-3xl mx-auto text-center pb-12 md:pb-16">
                        <h2 class="h2">Wir freuen uns über Ihre Nachricht</h2>
                    </div>

                    <!-- Contact form -->
                    <form class="max-w-xl mx-auto">
                        <div class="flex flex-wrap -mx-3 mb-4">
                            <div class="w-full px-3">
                                <jet-label for="name" value="Name"/>
                                <jet-input id="name" autocomplete="name" class="mt-1 w-full" placeholder="Name" type="text"/>
                                <jet-input-error class="mt-2"/><!--:message="form.error"-->
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mb-4">
                            <div class="w-full px-3">
                                <jet-label for="email" value="E-Mail"/>
                                <jet-input id="email" autocomplete="email" class="mt-1 w-full" placeholder="E-Mail" type="text"/>
                                <jet-input-error class="mt-2"/><!--:message="form.error"-->
                            </div>
                        </div>

                        <div class="flex flex-wrap -mx-3 mb-4">
                            <div class="w-full px-3">
                                <jet-label for="message" value="Nachricht"/>
                                <textarea rows="4"
                                          class="w-full no-resize border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                                          id="message"></textarea>
                                <jet-input-error class="mt-2"/><!--:message="form.error"-->
                            </div>
                        </div>
                        <div class="flex flex-wrap -mx-3 mt-4">
                            <div class="w-full px-3">
                                <button class="btn text-white bg-brand-primary-default hover:bg-brand-primary-light w-full">Senden</button>
                            </div>
                        </div>
                        <div class="text-sm text-gray-600 mt-4">
                            Indem Sie auf "Senden" klicken, stimmen Sie zu, dass FCG Villach die oben angegebenen personenbezogenen Daten in Form von E-Mails speichert und sind mit unserer
                            Datenschutzrichtlinie einverstanden.
                        </div>
                    </form>

                </div>
            </div>
        </section>

    </public-layout>
</template>

<script>
import PublicLayout from "@/Layouts/PublicLayout";
import JetInput from "@/Jetstream/Input";
import JetInputError from "@/Jetstream/InputError";
import JetLabel from "@/Jetstream/Label";
import JetButton from "@/Jetstream/Button";

export default {
    name: "Contact",
    components: {JetButton, JetLabel, JetInputError, JetInput, PublicLayout}
}
</script>

<style scoped>

</style>
