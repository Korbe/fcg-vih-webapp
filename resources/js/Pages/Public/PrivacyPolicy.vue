<template>
    <public-layout title="Datenschutz">

        <Nav />

        <div class="bg-white">
            <div class="max-w-7xl mx-auto py-16 px-4 sm:py-24 sm:px-6 lg:px-8">
                <div class="text-center">
                    <span class="text-base font-semibold text-brand-primary-500 tracking-wide uppercase">FCG Villach</span>
                    <h1 class="mt-1 text-4xl font-extrabold text-gray-900 sm:text-5xl sm:tracking-tight lg:text-6xl">Datenschutz</h1>
                </div>
            </div>
        </div>

        <section class="px-4 sm:px-6 max-w-5xl prose mx-auto  lg:prose-lg pb-24">
            <p>
                Wir sind eine Freie Christengemeinde in Villach. Diese Homepage dient nur dem Informativen Zweck, wir nehmen die Predigten in unseren Gottesdiensten auf um sie anschließend im Internet
                für Interessenten zugänglich zu machen.
            </p>


            <p>
                Die Adresse unserer Website ist: <a href="https://www.fcg-villach.at">www.fcg-villach.at</a>
            </p>
            <h2>Welche personenbezogenen Daten wir sammeln</h2>

            <h3> Analysedienste</h3>
            <p>Wir verwenden keine Analysedienste.</p>
            <h3> Bilder </h3>
            <p>Bilder auf dieser Webseite unterliegen keiner Lizenz. Sie stammen aus der Online Bilderbibliothek <a href="https://unsplash.com/" target="_blank">Unsplash.com</a></p>
            <h3>Ihre Rechte</h3>
            <p>Ihnen stehen bezüglich Ihrer bei uns gespeicherten Daten grundsätzlich die Rechte auf Auskunft, Berichtigung, Löschung, Einschränkung, Datenübertragbarkeit, Widerruf und Widerspruch zu.
                Wenn Sie glauben, dass die Verarbeitung Ihrer Daten gegen das Datenschutzrecht verstößt oder Ihre datenschutzrechtlichen Ansprüche sonst in einer Weise verletzt worden sind, können Sie
                sich unter datenschutz@fcg-villach.at beschweren.</p>


        </section>

    </public-layout>
</template>

<script>
import PublicLayout from "@/Layouts/PublicLayout";
import Nav from "../../Partials/Nav";

export default {
    name: "PrivacyPolicy",
    components: {Nav, PublicLayout}
}
</script>

<style scoped>

</style>
