<template>
  <div class="flex flex-col min-h-screen overflow-hidden">

    <!-- Site header -->
    <Header />

    <!-- Page content -->
    <main class="flex-grow">

      <!-- Page sections -->
      <HeroHome />
      <EventsHome />
      <News />
      <Cta />

    </main>

    <!-- Site footer -->
    <Footer />

  </div>
</template>

<script>
import Header from './partials/Header.vue'
import HeroHome from './partials/HeroHome.vue'
import News from './partials/News.vue'
import Cta from './partials/Cta.vue'
import Footer from './partials/Footer.vue'
import EventsHome from './partials/EventsHome.vue'

export default {
  name: 'Home',
  components: {
    Header,
    HeroHome,
    EventsHome,
    News,
    Cta,
    Footer,
  },
}
</script>