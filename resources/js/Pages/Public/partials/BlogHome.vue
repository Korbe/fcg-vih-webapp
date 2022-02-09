<template>

    <div class="max-w-4xl mx-auto pt-20">
        <h1 class="h1 mb-5 text-center">Neuste Predigt anhören</h1>
        <p class="text-xl text-gray-600 text-center">
            Wir nehmen unsere Predigten jeden Gottesdienst auf.
        </p>
    </div>

    <div class="container flex justify-center mx-auto max-w-lg text-center mt-10">
        <div class="py-4 mb-6">
            <h2 class="h4 mb-2">
                <inertia-link :href="$page.props.post.url" class="hover:underline">{{ $page.props.post.title }}</inertia-link>
            </h2>
            <div class="my-4">
                <audio v-if="$page.props.post.audio" controls :src="$page.props.post.audio"></audio>
            </div>
            <footer class="text-sm">
                <div class="flex items-center">
                    <div class="flex flex-shrink-0 mr-3">
                        <a class="relative" href="#0">
                            <span aria-hidden="true" class="absolute inset-0 -m-px"><span class="absolute inset-0 -m-px bg-white rounded-full"></span></span>
                            <img :alt="$page.props.post.author.name" :src="$page.props.post.author.profile_photo_url" class="relative rounded-full" height="32" width="32"/>
                        </a>
                    </div>
                    <div>
                        <span class="text-gray-600">Von </span>
                        <a class="font-medium hover:underline" href="#0">{{ $page.props.post.author.name }}</a>
                        <span class="text-gray-600"> · {{ $page.props.post.created_at }}</span>
                    </div>
                </div>
            </footer>
        </div>
    </div>
    <div class="text-center mb-20">
        <inertia-link :href="route('public.blog')" class="btn text-white bg-brand-primary-default hover:bg-brand-primary-light w-full mb-4 sm:w-auto sm:mb-0" href="#0">
            Zu allen Predigten
        </inertia-link>
    </div>

</template>

<script>
export default {
    name: "BlogHome"
}
</script>
