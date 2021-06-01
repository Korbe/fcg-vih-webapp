<template>
  <div class="flex flex-col min-h-screen overflow-hidden">

    <!-- Site header -->
    <Header />

    <!-- Page content -->
    <main class="flex-grow">

      <!-- Page sections -->
      <BlogList :posts="posts" />

    </main>

    <!-- Site footer -->
    <Footer />

  </div>
</template>

<script>
import Header from './partials/Header'
import BlogList from './partials/BlogList'
import Footer from './partials/Footer'

export default {
  name: 'Blog',
  props: {
    posts: Object,
  },
  components: {
    Header,
    BlogList,
    Footer,
  },
}
</script>
