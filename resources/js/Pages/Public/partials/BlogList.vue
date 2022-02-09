<template>
    <section>
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            <div class="pt-32 pb-12 md:pt-40 md:pb-20">

                <!-- Page header -->
                <div class="max-w-3xl pb-8 md:pb-20 text-center md:text-left">
                    <h1 class="h1 mb-4">Hören Sie sich unsere Predigten ganz bequem an</h1>
                    <p class="text-xl text-gray-600">Bleiben Sie auf dem Laufenden über die neuesten Predigten von FCG Villach.</p>
                </div>

                <!-- Main content -->
                <div class="md:flex md:justify-between">

                    <!-- Articles container -->
                    <div class="md:flex-grow ">

                        <article v-for="post in posts" class="flex items-center py-4 mb-6 border-b border-gray-200">

                            <div>
                                <h2 class="h4 mb-2"> {{ post.title }} </h2>
                                <audio class="my-4" v-if="post.audio" controls :src="post.audio"></audio>
                                <footer class="text-sm">
                                    <div class="flex items-center">
                                        <div class="flex flex-shrink-0 mr-3">
                                            <a class="relative" href="#0">
                                                <span aria-hidden="true" class="absolute inset-0 -m-px"><span class="absolute inset-0 -m-px bg-white rounded-full"></span></span>
                                                <img :alt="post.author.name" :src="post.author.profile_photo_url" class="relative rounded-full" height="32" width="32"/>
                                            </a>
                                        </div>
                                        <div>
                                            <span class="text-gray-600">Von </span>
                                            <a class="font-medium hover:underline" href="#0">{{ post.author.name }}</a>
                                            <span class="text-gray-600"> · {{ post.created_at }}</span>
                                        </div>
                                    </div>
                                </footer>
                            </div>

                        </article>
                    </div>
                </div>

            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: 'BlogList',
    props: {
        posts: Object,
    },
}
</script>
