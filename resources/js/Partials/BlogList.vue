<template>
    <div id="posts" class="bg-gradient-to-b from-white to-gray-100">
        <div class="max-w-4xl mx-auto py-32 px-4">

            <div class="grid grid-cols-1 gap-6">
                <Post v-for="(post, index) in posts.data" :key="index" :index=index :post="post"/>


                <div v-if="posts.total === 0 "
                    class="text-center rounded-lg border border-gray-300 bg-white px-6 py-5        shadow-sm hover:border-brand-primary focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-brand-primary">
                    Noch keine Prediten
                </div>
            </div>

            <nav class="py-5 border-t border-gray-200 flex items-center justify-between sm:px-0">
                <div class="-mt-px w-0 flex-1 flex">
                    <Link v-if="posts.current_page > 1" preserve-scroll :href="posts.prev_page_url"
                          class="border-t-2 border-transparent pt-4 pr-1 inline-flex items-center  font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">
                        <ArrowNarrowLeftIcon class="mr-3 h-5 w-5 text-gray-400" aria-hidden="true"/>
                        Zurück
                    </Link>
                </div>
                <div v-if="posts.last_page > 1" class="hidden md:-mt-px md:flex">

<!--                    <Link :href="link.url" preserve-scroll
                        v-for="(link, index) in posts.links" :key="index"
                        :class="[link.active ? 'text-brand-primary-600' : 'text-gray-500', 'border-transparent  hover:text-gray-700 hover:border-gray-300 border-t-2 pt-4 px-4 inline-flex items-center  font-medium' ]"> {{link.label}}
                    </Link>-->

                    <Link v-if="posts.current_page > 1" preserve-scroll :href="posts.first_page_url"
                          class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 border-t-2 pt-4 px-4 inline-flex items-center  font-medium"> 1
                    </Link>

                    <span v-if="posts.current_page == posts.last_page" class="text-gray-500 pt-4 px-4 inline-flex items-center font-medium">
                        ...
                    </span>

                    <span class="border-brand-primary-500 text-brand-primary-600 border-t-2 pt-4 px-4 inline-flex items-center  font-medium" aria-current="page"> {{
                            posts.current_page
                        }} </span>

                    <span v-if="posts.current_page < posts.last_page" class="text-gray-500 pt-4 px-4 inline-flex items-center font-medium">
                        ...
                    </span>

                    <Link v-if="posts.current_page < posts.last_page" preserve-scroll :href="posts.last_page_url"
                          class="border-transparent text-gray-500 hover:text-gray-700 hover:border-gray-300 border-t-2 pt-4 px-4 inline-flex items-center  font-medium"> {{
                            posts.last_page
                        }}
                    </Link>
                </div>
                <div class="-mt-px w-0 flex-1 flex justify-end">
                    <Link v-if="posts.current_page < posts.last_page" preserve-scroll :href="posts.next_page_url"
                          class="border-t-2 border-transparent pt-4 pl-1 inline-flex items-center text-base font-medium text-gray-500 hover:text-gray-700 hover:border-gray-300">
                        Weiter
                        <ArrowNarrowRightIcon class="ml-3 h-5 w-5 text-gray-400" aria-hidden="true"/>
                    </Link>
                </div>
            </nav>

        </div>


    </div>


</template>

<script>
import {ArrowNarrowLeftIcon, ArrowNarrowRightIcon} from '@heroicons/vue/solid'
import Post from "@/Partials/Post";

export default {
    name: 'BlogList',
    props: {
        posts: Object,
    },
    components: {
        Post,

        ArrowNarrowLeftIcon,
        ArrowNarrowRightIcon
    },
    data() {
        return {}
    }
}
</script>
