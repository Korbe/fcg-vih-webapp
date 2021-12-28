<template>
    <div class="flex flex-col min-h-screen overflow-hidden">

        <!-- Site header -->
        <Header/>

        <!-- Page content -->
        <main class="flex-grow">

            <!-- Page sections -->
            <PostSingle :post="post"/>

        </main>

        <!-- Site footer -->
        <Footer/>

    </div>
</template>

<script>

import PostSingle from './partials/PostSingle'
import Footer from './partials/Footer'
import Header from "./partials/Header";

export default {
    name: 'BlogPost',
    components: {
        Header,
        PostSingle,
        Footer,
    },
    props: {
        post: Object,
    },
}
</script>
