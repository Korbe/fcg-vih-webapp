<template>
    <public-layout>
        <PostSingle :post="post"/>
    </public-layout>
</template>

<script>

import PostSingle from './partials/PostSingle'
import PublicLayout from "@/Layouts/PublicLayout";

export default {
    name: 'BlogPost',
    components: {
        PublicLayout,
        PostSingle,
    },
    props: {
        post: Object,
    },
}
</script>
