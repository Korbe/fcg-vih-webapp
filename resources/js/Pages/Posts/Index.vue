<template>
    <AppLayout>

        <template #header>
            <div class="flex flex items-center">
                <h2 class="flex-1 font-semibold text-xl text-gray-800 leading-tight">
                    Posts
                </h2>
                <inertia-button :to="route('posts.create')">Create Post</inertia-button>
            </div>

        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <table class="w-full whitespace-no-wrap">
                        <tr class="text-left font-bold">
                            <th class="px-6 pt-6 pb-4">Name</th>
                            <th class="px-6 pt-6 pb-4">Kategorie</th>
                            <th class="px-6 pt-6 pb-4">Erstellt</th>
                            <th class="px-6 pt-6 pb-4" colspan="2">Aktualisiert</th>
                        </tr>


                        <tr v-for="post in posts" :key="post.id" class="hover:bg-gray-100 focus-within:bg-gray-100">
                            <td class="border-t">
                                <inertia-link :href="route('posts.edit', post.id)" class="px-6 py-4 flex items-center focus:text-indigo-500">
                                    {{ post.title }}
                                    <i v-if="post.deleted_at" class="fas fa-trash flex-shrink-0 w-3 h-3 fill-gray-400 ml-2"/>
                                </inertia-link>
                            </td>
                            <td class="border-t">
                                <inertia-link :href="route('posts.edit', post.id)" class="px-6 py-4 flex items-center" tabindex="-1">
                                    <div>
                                        Kat
                                    </div>
                                </inertia-link>
                            </td>
                            <td class="border-t">
                                <inertia-link :href="route('posts.edit', post.id)" class="px-6 py-4 flex items-center" tabindex="-1">
                                    {{ post.created_at }}
                                </inertia-link>
                            </td>
                            <td class="border-t">
                                <inertia-link :href="route('posts.edit', post.id)" class="px-6 py-4 flex items-center" tabindex="-1">
                                    {{ post.updated_at }}
                                </inertia-link>
                            </td>

                            <td class="border-t w-px">
                                <inertia-link :href="route('posts.edit', post.id)" class="px-4 flex items-center" tabindex="-1">
                                    <i class="fas fa-chevron-right w-6 h-6 fill-gray-400"></i>
                                </inertia-link>
                            </td>
                        </tr>
                        <tr v-if="posts.length === 0">
                            <td class="border-t px-6 py-4 text-center" colspan="5">Keine Beiträge gefunden</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<script>
import AppLayout from "../../Layouts/AppLayout";
import InertiaButton from "../../Shared/InertiaButton";

export default {
    components: {InertiaButton, AppLayout},
    props: {
        posts: Object,
        filters: Object,
    },
    data() {
        return {}
    }
}
</script>
