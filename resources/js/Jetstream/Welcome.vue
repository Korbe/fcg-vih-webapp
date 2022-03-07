<template>
    <div>
        <div class="p-6 sm:px-20 bg-white border-b border-gray-200">
            <div>
                <jet-application-logo class="block h-12 w-auto" />
            </div>

            <div class="mt-8 text-2xl">
                Willkommen im FCG-Villach Dashboard
            </div>
        </div>

        <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2">
            <div class="p-6">
                <div class="flex items-center">
                    <BookOpenIcon class="w-8 h-8 text-gray-400" />
                    <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="https://laravel.com/docs">Neue Predigt</a></div>
                </div>

                <div class="ml-12">

                    <Link :href="route('dashboard.posts.create')">
                        <div class="mt-3 flex items-center text-sm font-semibold text-brand-primary-700">
                                <div>Neu erstellen</div>

                                <div class="ml-1 text-brand-primary">
                                    <PlusIcon class="w-4 h-4" />
                                </div>
                        </div>
                    </Link>
                </div>
            </div>

            <div class="p-6 border-t border-gray-200 md:border-t-0 md:border-l">
                <div class="flex items-center">
                    <CollectionIcon class="w-8 h-8 text-gray-400" />
                    <div class="ml-4 text-lg text-gray-600 leading-7 font-semibold"><a href="https://laracasts.com">Alle Predigten</a></div>
                </div>

                <div class="ml-12">
                    <div class="mt-2 text-sm text-gray-500">
                    </div>

                    <Link :href="route('dashboard.posts.index')">
                        <div class="mt-3 flex items-center text-sm font-semibold text-brand-primary-700">
                                <div>Predigten anzeigen</div>

                                <div class="ml-1 text-brand-primary">
                                    <svg viewBox="0 0 20 20" fill="currentColor" class="w-4 h-4"><path fill-rule="evenodd" d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                                </div>
                        </div>
                    </Link>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import { defineComponent } from 'vue'
    import JetApplicationLogo from '@/Jetstream/ApplicationLogo.vue'
    import {PlusIcon, CollectionIcon, BookOpenIcon} from "@heroicons/vue/outline";

    export default defineComponent({
        components: {
            JetApplicationLogo, PlusIcon, CollectionIcon, BookOpenIcon
        },
    })
</script>
