<template>
    <div
        class="flex flex-col md:flex-row text-center rounded-lg border border-gray-300 bg-white px-6 py-5  items-center justify-center
        md:text-left md:justify-start
        shadow-sm hover:border-brand-primary focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-brand-primary">

        <div class="pb-3 md:pb-0 flex-shrink-0">
            <img :alt="post.author" :src="post.author_image" class="relative rounded-full h-16 w-16" />
        </div>


        <div class="basis-full w-full md:pl-4">
            <p class="text-xl md:text-2xl font-medium text-gray-900">
                {{ post.title }}
            </p>
            <p class="pt-2 text-base text-gray-500">
                <span class="font-medium hover:underline">{{ post.author }}</span>
                <span class="text-gray-600"> · {{ post.published_at }}</span>
            </p>
        </div>

        <div class="pt-5 md:pt-0 md:pl-2 flex-none">
            <audio class="bg-white py-2" :id="'audio_' + index" v-if="post.audio" controls :src="post.audio"></audio>
        </div>

    </div>
</template>
<script>
export default {
    name: 'Post',
    props: {
        post: {
            type: Object
        },
        index: {
            type: Number
        }
    },
}
</script>
