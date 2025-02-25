<template>

    <Head :title="title" />

    <Banner />


    <div v-if="$page.props.auth.user" class="w-auto rounded-md md:w-1/2 bg-brand-primary-50 mx-auto m-2 p-4">
        <div class="md:flex justify-between">
            <p class="text-sm text-brand-primary-700">Du bist als <strong>{{ $page.props.auth.user.email }}</strong> angemeldet.</p>

            <div class="flex space-x-4 justify-center">
                <div>
                    <Link :href="route('dashboard.home')" class="text-sm text-brand-primary-700 hover:text-brand-primary-500">Dashboard</Link>
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
import Banner from '@/Jetstream/Banner.vue'
import Footer from "@/Partials/Footer.vue";
import { Head } from '@inertiajs/vue3';

export default {
    name: "PublicLayout",
    components: {Footer, Head, Banner},
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
