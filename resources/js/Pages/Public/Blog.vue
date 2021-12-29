<template>
    <public-layout>
        <BlogList :posts="posts"/>
    </public-layout>
</template>

<script>
import BlogList from './partials/BlogList'
import PublicLayout from "@/Layouts/PublicLayout";

export default {
    name: 'Blog',
    props: {
        posts: Object,
    },
    components: {
        PublicLayout,
        BlogList,
    },
}
</script>
