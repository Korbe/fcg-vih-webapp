<template>
    <inertia-link :class="classes" :href="to" tag="button">
        <slot></slot>
    </inertia-link>
</template>

<script>
export default {
    name: "InertiaButton",

    props: ['to'],

    computed: {
        classes() {
            return 'inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition'
        }
    }
}
</script>
