<template>

    <nav class="py-5 border-t border-gray-200 flex items-center justify-between sm:px-0">
        <div class="-mt-px w-0 flex-1 flex">
            <inertia-link v-if="data.current_page > 1" :href="data.prev_page_url"
                          class="border-t-2 border-transparent pt-4 pr-1 inline-flex items-center  font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300"
                          preserve-scroll>
                <ArrowNarrowLeftIcon aria-hidden="true" class="mr-3 h-5 w-5 text-gray-400"/>
                Zurück
            </inertia-link>
        </div>
        <div v-if="data.last_page > 1" class="hidden md:-mt-px md:flex">

            <inertia-link v-if="data.current_page > 1" :href="data.first_page_url"
                          class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 border-t-2 pt-4 px-4 inline-flex items-center  font-medium"
                          preserve-scroll>
                1
            </inertia-link>

            <span v-if="data.current_page == data.last_page"
                  class="text-gray-500 pt-4 px-4 inline-flex items-center font-medium">
                        ...
                    </span>

            <span
                aria-current="page"
                class="border-brand-primary-500 text-brand-primary-600 border-t-2 pt-4 px-4 inline-flex items-center  font-medium"> {{
                    data.current_page
                }} </span>

            <span v-if="data.current_page < data.last_page"
                  class="text-gray-500 pt-4 px-4 inline-flex items-center font-medium">
                        ...
                    </span>

            <inertia-link v-if="data.current_page < data.last_page" :href="data.last_page_url"
                          class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 border-t-2 pt-4 px-4 inline-flex items-center  font-medium"
                          preserve-scroll>
                {{
                    data.last_page
                }}
            </inertia-link>
        </div>
        <div class="-mt-px w-0 flex-1 flex justify-end">
            <inertia-link v-if="data.current_page < data.last_page" :href="data.next_page_url"
                          class="border-t-2 border-transparent pt-4 pl-1 inline-flex items-center text-base font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300"
                          preserve-scroll>
                Weiter
                <ArrowNarrowRightIcon aria-hidden="true" class="ml-3 h-5 w-5 text-gray-400"/>
            </inertia-link>
        </div>
    </nav>
    
</template>

<script>
import {ArrowNarrowLeftIcon, ArrowNarrowRightIcon} from '@heroicons/vue/solid'

export default {
    name: 'Pagination',
    components: {
        ArrowNarrowLeftIcon, ArrowNarrowRightIcon
    },
    props: {
        data: Object
    }
}
</script>
