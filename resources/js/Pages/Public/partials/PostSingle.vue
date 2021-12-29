<template>
    <section>
        <div class="max-w-6xl mx-auto px-4 sm:px-6">
            <div class="pt-32 pb-12 md:pt-40 md:pb-20">
                <div class="max-w-3xl mx-auto lg:max-w-none">

                    <article class="">

                        <!-- Article header -->
                        <header class="max-w-3xl mx-auto mb-14">
                            <h1 class="h1 text-center mb-4">{{ post.title }}</h1>
                        </header>
                        <!-- Main content -->
                        <div>

                            <!-- Article meta -->
                            <div class="flex items-center justify-center mb-6">
                                <div class="flex flex-shrink-0 mr-3">
                                    <a class="relative" href="#0">
                                        <span aria-hidden="true" class="absolute inset-0 -m-px"><span class="absolute inset-0 -m-px bg-white rounded-full"></span></span>
                                        <img :alt="post.author.name" :src="post.author.profile_photo_url" class="relative rounded-full" height="32" width="32"/>
                                    </a>
                                </div>
                                <div>
                                    <a class="font-medium hover:underline" href="#0">{{ post.author.name }}</a>
                                    <span class="text-gray-600"> · {{ post.created_at }}</span>

                                </div>
                            </div>
                            <hr class="w-16 h-px pt-px mx-auto bg-gray-200 border-0 mb-6"/>

                            <audio v-if="post.audio" controls>
                                <source :src="post.audio">
                            </audio>

                            <!-- Article body -->
                            <div class="prose prose-sm sm:prose lg:prose-lg xl:prose-2xl mx-auto text-gray-600">

                                <div v-html="post.content"/>


                                <div>
                                    <hr class="w-full h-px pt-px mt-8 bg-gray-200 border-0"/>
                                    <inertia-link class="inline-flex items-center text-base text-blue-600 font-medium hover:underline" href="/blog">
                                        <svg class="w-3 h-3 fill-current text-blue-400 flex-shrink-0 mr-2" viewBox="0 0 12 12" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M.293 5.282L5 .5l1.414 1.436-3 3.048H12v2.032H3.414l3 3.048L5 11.5.293 6.718a1.027 1.027 0 010-1.436z"/>
                                        </svg>
                                        <span>Zurück zu allen Predigten</span>
                                    </inertia-link>
                                </div>
                            </div>

                        </div>

                        <!-- Article footer -->
                    </article>

                </div>

            </div>
        </div>
    </section>
</template>

<script>
export default {
    name: 'PostSingle',
    props: {
        post: Object,
    },
}
</script>
