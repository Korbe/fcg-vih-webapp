<template>
    <app-layout title="Predigt bearbeiten">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Predigt ändern
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                    <form @submit.prevent="updatePost" class="space-y-8 divide-y divide-gray-200">
                        <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                            <div class="p-6">
                                <div>
                                    <div class="space-y-6 sm:space-y-5">
                                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
                                            <label for="title" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Titel </label>
                                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                <input v-model="form.title" type="text" name="title" id="title"
                                                       class="max-w-lg block w-full shadow-sm focus:ring-brand-primary focus:border-brand-primary sm:max-w-xs sm:text-sm border-gray-300 rounded-md"/>
                                                <jet-input-error :message="form.errors.title" class="mt-2"/>
                                            </div>
                                        </div>

                                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                            <label for="author" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Author </label>
                                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                <input v-model="form.author" type="text" name="author" id="author"
                                                       class="max-w-lg block w-full shadow-sm focus:ring-brand-primary focus:border-brand-primary sm:max-w-xs sm:text-sm border-gray-300 rounded-md"/>
                                                <jet-input-error :message="form.errors.author" class="mt-2"/>
                                            </div>
                                        </div>

                                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                            <label for="published_at" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Veröffentlicht </label>
                                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                <input v-model="form.published_at" id="published_at" name="published_at" type="datetime-local"
                                                       class="max-w-lg block w-full shadow-sm focus:ring-brand-primary focus:border-brand-primary sm:max-w-xs sm:text-sm border-gray-300 rounded-md"/>
                                                <jet-input-error :message="form.errors.published_at" class="mt-2"/>
                                            </div>
                                        </div>

                                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                            <label for="published_at" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Erstellt </label>
                                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                <input disabled :value="post.created_at" name="created_at" type="datetime-local"
                                                       class="max-w-lg block w-full shadow-sm focus:ring-brand-primary focus:border-brand-primary sm:max-w-xs sm:text-sm border-gray-300 rounded-md"/>
                                            </div>
                                        </div>

                                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                            <label for="published_at" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Aktualisiert </label>
                                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                <input disabled :value="post.updated_at" name="updated_at"
                                                       type="datetime-local"
                                                       class="max-w-lg block w-full shadow-sm focus:ring-brand-primary focus:border-brand-primary sm:max-w-xs sm:text-sm border-gray-300 rounded-md"/>

                                            </div>
                                        </div>
                                    </div>

                                </div>


                            </div>
                            <div class="bg-gray-200 bg-opacity-25 flex flex-row-reverse">
                                <div class="p-6 space-x-4">
                                    <jet-danger-button :disabled="form.processing" type="button" @click="deletePost">Löschen</jet-danger-button>
                                    <jet-button :disabled="form.processing">Speichern</jet-button>
                                </div>
                            </div>
                        </div>
                    </form>

                </div>

                <div class="mt-5 bg-white overflow-hidden shadow-xl sm:rounded-lg">

                    <form @submit.prevent="updateAttachment" class="space-y-8 divide-y divide-gray-200">
                        <div class="space-y-8 divide-y divide-gray-200 sm:space-y-5">
                            <div class="p-6">
                                <div>
                                    <div class="space-y-6 sm:space-y-5">
                                        <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
                                            <label for="published_at" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Aufnahme </label>
                                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                <file-input v-model="audioForm.audio" :error="audioForm.errors.audio" accept="audio/mp3,audio/*;capture=microphone"
                                                            class="max-w-lg block w-full focus:ring-brand-primary focus:border-brand-primary sm:max-w-xs sm:text-sm" type="file"/>
                                                <jet-input-error :message="audioForm.errors.audio" class="mt-2"/>
                                            </div>
                                        </div>

                                        <div v-if="audioForm.audio" class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                            <label for="published_at" class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2"> Anhören </label>
                                            <div class="mt-1 sm:mt-0 sm:col-span-2">
                                                <audio class="bg-white py-2" v-if="audioForm.audio.original_url" controls :src="audioForm.audio.original_url"></audio>
                                                <audio class="bg-white py-2" v-else-if="audio_url" :src="audio_url" ref="fileAudio" controls></audio>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-gray-200 bg-opacity-25 flex flex-row-reverse">
                                <div class="p-6 space-x-4">
                                    <jet-button :disabled="audioForm.processing">Speichern</jet-button>
                                </div>
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
import JetLabel from "../../Jetstream/Label";
import JetInputError from "../../Jetstream/InputError";
import JetInput from "../../Jetstream/Input";
import JetButton from "../../Jetstream/Button";
import JetDangerButton from "../../Jetstream/DangerButton";
import FileInput from "../../Shared/FileInput";
import {PaperClipIcon} from "@heroicons/vue/outline";


export default {
    metaInfo: {title: 'Create Post'},
    components: {FileInput, JetDangerButton, JetButton, JetInput, JetInputError, JetLabel, AppLayout, PaperClipIcon},
    props: {
        post: Object,
    },
    data() {
        return {
            form: this.$inertia.form({
                title: this.post.title,
                author: this.post.author,
                published_at: this.post.published_at,
            }),
            audioForm: this.$inertia.form({
                audio: this.post.audio,
            }),
            audio_url: null
        }
    },
    watch: {
        'audioForm.audio'(newValue) {
            this.audio_url = null;
            let blob = window.URL || window.webkitURL;

            if (newValue && blob) {
                this.audio_url = blob.createObjectURL(newValue);
            }
        }
    },
    methods: {
        updatePost() {
            this.form.put(route('dashboard.posts.update', this.post.id));
        },
        deletePost() {
            this.form.delete(route('dashboard.posts.destroy', this.post.id));
        },
        updateAttachment(){
            this.audioForm.post(route('dashboard.posts.audio', this.post.id));
        }
    }
}
</script>
