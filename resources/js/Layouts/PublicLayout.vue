<template>

    <Head :title="title" />

    <jet-banner />


    <div v-if="$page.props.user" class="w-auto rounded-md md:w-1/2 bg-brand-primary-50 mx-auto m-2 p-4">
        <div class="md:flex justify-between">
            <p class="text-sm text-brand-primary-700">Du bist als <strong>{{ $page.props.user.email }}</strong> angemeldet.</p>

            <div class="flex space-x-4 justify-center">
                <div>
                    <inertia-link :href="route('dashboard.home')" class="text-sm text-brand-primary-700 hover:text-brand-primary-500">Dashboard</inertia-link>
                </div>

                <div>
                    <form @submit.prevent="logout">
                        <button type="submit" class="text-sm text-brand-primary-700 hover:text-brand-primary-500">Abmelden</button>
                    </form>
                </div>
            </div>
        </div>
    </div>


    <slot/>

</template>

<script>
import JetBanner from '@/Jetstream/Banner.vue'
import Footer from "@/Partials/Footer";
import { Head } from '@inertiajs/inertia-vue3';

export default {
    name: "PublicLayout",
    components: {Footer, Head, JetBanner},
    props: {
        title: String,
    },
    methods: {
        logout() {
            this.$inertia.post(route('logout'));
        },
    }
}
</script>
