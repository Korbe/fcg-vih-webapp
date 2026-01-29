<template>
    <transition name="fade">
        <div v-if="show" class="fixed inset-0 flex items-center flex-col justify-center bg-white z-50">
            <img src="/images/fcg-villach-logo-minimal.png" alt="Logo" class="w-auto h-32 mb-4" />
            <h1 class="text-3xl animate-pulse text-brand-text dark:text-brand-text-dark">fcg-Villach.at</h1>
        </div>
    </transition>
</template>

<script setup>
import { ref, onMounted } from "vue";

// Zustand des Splash Screens
const show = ref(false);

onMounted(() => {
    if (!sessionStorage.getItem("splashSeen")) {
        show.value = true;
        setTimeout(() => {
            show.value = false;
            sessionStorage.setItem("splashSeen", "true");
        }, 1000);
    }
});
</script>

<style>
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.5s ease;
}

.fade-enter,
.fade-leave-to {
    opacity: 0;
}
</style>