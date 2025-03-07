<template>
    <AppLayout title="News">
        <template #header>
            <div class="flex flex items-center">
                <h2 class="flex-1 font-semibold text-xl text-gray-800 leading-tight">
                    News
                </h2>
                <inertia-button :to="route('dashboard.news.create')">News hochladen</inertia-button>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

                <div class="flex flex-col">

                    <div class="overflow-x-auto bg-white sm:rounded-md">
                        <div class="align-middle inline-block min-w-full">
                            <div class="shadow overflow-hidden border-b border-gray-200">

                                <table class="min-w-full divide-y divide-gray-200">
                                    <thead class="bg-white py-10">
                                        <tr>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                                Titel</th>
                                            <th scope="col"
                                                class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                                Titelbild</th>
                                                <th scope="col"
                                                class="px-6 py-3 text-left text-sm font-medium text-gray-500 uppercase tracking-wider">
                                                Unterstützungsbild</th>
                                            <th scope="col" class="relative px-6 py-3">
                                                <span class="sr-only">Löschen</span>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody class="bg-white divide-y divide-gray-200">
                                        <tr v-for="(item, index) in news" :key="item.id"
                                            :class="index % 2 === 0 ? '' : 'bg-gray-50'">

                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 w-52">
                                                        <span>{{ item.title }}</span>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 w-32">
                                                        <img loading="lazy" class="rounded"
                                                            :src="item.media[0].original_url"/>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap">
                                                <div class="flex items-center">
                                                    <div class="flex-shrink-0 w-32">
                                                        <img loading="lazy" class="rounded"
                                                            :src="item.media[1].original_url"/>
                                                    </div>
                                                </div>
                                            </td>

                                            <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                                                <button @click="deleteItem(item.id)"
                                                    :href="route('dashboard.news.destroy', item.id)"
                                                    class="flex text-brand-primary-600 hover:text-brand-primary-900">
                                                    <TrashIcon class="h-5 w-5 mr-2" />Löschen
                                                </button>
                                            </td>
                                        </tr>
                                        <tr v-if="news.length === 0">
                                            <td colspan="5"
                                                class="text-center px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                                Keine Neuigkeiten
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import InertiaButton from "@/Shared/InertiaButton.vue";
import { TrashIcon } from '@heroicons/vue/24/solid'
import { onMounted } from "vue";
import { router } from '@inertiajs/vue3'


const props = defineProps({
    news: Array,
});

onMounted(() => {
    console.log(props.news);
});

const deleteItem = (id) => {
    router.delete(route('dashboard.news.destroy', id))
}
</script>
