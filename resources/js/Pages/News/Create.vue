<template>
    <app-layout title="Neue Predigt">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                News hochladen
            </h2>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">Lade ein Bild mit den aktuellen Infos hoch. Die letzen 5
                werden angezeigt</p>
        </template>

        <div class="py-12">
            <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                    <form class="space-y-10 divide-y divide-gray-200 sm:space-y-5" @submit.prevent="create">
                        <div class="p-4">
                            <div>
                                <div class="space-y-8 sm:space-y-5">
                                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
                                        <v-input id="alt"
                                                 v-model="form.alt" :error="form.errors.alt"
                                                 label="Alternativer Text für Suchmaschinen und Ladefehler"/>
                                    </div>

                                    <div
                                        class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                        <label class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"
                                               for="image"> Bild/Folie </label>
                                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                                            <file-input id="image" v-model="form.image" accept="image/*"
                                                        class="max-w-lg block w-full focus:ring-brand-primary focus:border-brand-primary sm:max-w-xs sm:text-sm"
                                                        name="image"
                                                        type="file"/>
                                            <jet-input-error :message="form.errors.image" class="mt-2"/>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                        <div class="bg-gray-200 bg-opacity-25 flex flex-row-reverse">
                            <div class="p-6">
                                <jet-button>Hochladen</jet-button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "../../Layouts/AppLayout";
import JetInputError from "../../Jetstream/InputError";
import JetButton from "../../Jetstream/Button";
import FileInput from "../../Shared/FileInput";
import VInput from "@/Shared/VInput";

export default {
    metaInfo: {title: 'Create News'},
    components: {VInput, FileInput, JetButton, JetInputError, AppLayout},
    data() {
        return {
            form: this.$inertia.form({
                alt: null,
                image: null,
            }),
        }
    },
    methods: {
        create() {
            this.form.post(route('dashboard.news.store'));
        },
    }
}
</script>
