<template>

    <div class="grid grid-cols-1 gap-4">
        <post-audio-player :ref="'post'+index" v-for="(post, index) in posts.data" :key="index" :index=index :post="post" />

        <!--empty state-->
        <div v-if="posts.total === 0 "
             class="text-center rounded-lg border border-gray-300 bg-white px-6 py-5 shadow-sm hover:border-brand-primary focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-brand-primary">
            Noch keine Prediten
        </div>
    </div>

    <pagination :data="posts" />

</template>

<script>

import PostAudioPlayer from "@/Partials/PostAudioPlayer";
import Pagination from './Pagination.vue';

export default {
    name: 'BlogList',
    props: {
        posts: Object,
    },
    components: {
        PostAudioPlayer,
        Pagination
    },
}
</script>
