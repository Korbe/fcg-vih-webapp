<template>
    <AppLayout :title="form.id ? 'News bearbeiten' : 'Neue Predigt'">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ form.id ? 'News bearbeiten' : 'News hochladen' }}
            </h2>
            <p class="mt-1 max-w-2xl text-sm text-gray-500">{{ form.id ? 'Bearbeite die News' : 'Lade aktuelle News hoch.' }}</p>
        </template>

        <div class="py-12">
            <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

                    <form class="space-y-10 divide-y divide-gray-200 sm:space-y-5" @submit.prevent="save">
                        <div class="p-4">
                            <div>
                                <div class="space-y-8 sm:space-y-5">
                                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:pt-5">
                                        <v-input id="alt" v-model="form.title" :error="form.errors.title" label="Titel"/>
                                        <VTextArea id="description" v-model="form.description" :error="form.errors.description" label="Beschreibung" />
                                    </div>

                                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                        <label class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2" for="title_image">Titel Bild</label>
                                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                                            <file-input id="title_image" v-model="form.title_image" accept="image/*"
                                                        class="max-w-lg block w-full focus:ring-brand-primary focus:border-brand-primary sm:max-w-xs sm:text-sm"
                                                        name="image"
                                                        type="file"/>
                                            <jet-input-error :message="form.errors.image" class="mt-2"/>
                                        </div>
                                    </div>

                                    <div class="sm:grid sm:grid-cols-3 sm:gap-4 sm:items-start sm:border-t sm:border-gray-200 sm:pt-5">
                                        <label class="block text-sm font-medium text-gray-700 sm:mt-px sm:pt-2" for="support_image">Unterstützungs Bild</label>
                                        <div class="mt-1 sm:mt-0 sm:col-span-2">
                                            <file-input id="support_image" v-model="form.support_image" accept="image/*"
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
                                <jet-button>{{ form.id ? 'Aktualisieren' : 'Hochladen' }}</jet-button>
                            </div>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import { useForm } from "@inertiajs/vue3";
import AppLayout from "@/Layouts/AppLayout.vue";
import JetInputError from "@/Jetstream/InputError.vue";
import JetButton from "@/Jetstream/Button.vue";
import FileInput from "@/Shared/FileInput.vue";
import VInput from "@/Shared/VInput.vue";
import VTextArea from "@/Shared/VTextarea.vue";

defineOptions({
  metaInfo: { title: "Create or Edit News" },
});

// If it's an edit, you'll get an existing news item, else an empty form for create
const props = defineProps({
  news: Object, // News object will be passed if it's an edit
});

const form = useForm({
  id: props.news?.id || null,
  title: props.news?.title || '',
  description: props.news?.description || '',
  title_image: null, // Optional: if you want to allow changing the image
  support_image: null, // Optional: if you want to allow changing the image
});

const save = () => {
  if (form.id) {
    // If an id exists, it's an edit request
    form.put(route('dashboard.news.update', form.id)); 
  } else {
    // Otherwise, it's a create request
    form.post(route("dashboard.news.store"));
  }
};
</script>