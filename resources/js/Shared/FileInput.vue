<template>
    <div class="border border-gray-300 rounded-md shadow-sm p-2">


        <!--   focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50  -->

        <input ref="file" :accept="accept" class="hidden" type="file" @change="change">
        <div v-if="!modelValue">
            <button class="px-4 py-1 bg-gray-800 hover:bg-gray-700 rounded-md font-semibold text-xs text-white uppercase" type="button" @click="browse">
                Browse
            </button>
        </div>
        <div v-else class="flex items-center justify-between">
            <div class="flex-1 pr-1">{{ modelValue.name }} <span class="text-gray-500 text-xs">({{ filesize(modelValue.size) }})</span></div>
            <button class="px-4 py-1 bg-gray-800 hover:bg-gray-700 rounded-md font-semibold text-xs text-white uppercase" type="button" @click="remove">
                Remove
            </button>
        </div>
    </div>
</template>

<script>
export default {
    name: "FileInput",
    props: {
        modelValue: File,
        accept: String,
    },
    emits: ['update:modelValue'],
    watch: {
        value(value) {
            if (!value) {
                this.$refs.file.value = ''
            }
        },
    },
    methods: {
        filesize(size) {
            var i = Math.floor(Math.log(size) / Math.log(1024))
            return (size / Math.pow(1024, i)).toFixed(2) * 1 + ' ' + ['B', 'kB', 'MB', 'GB', 'TB'][i]
        },
        browse() {
            this.$refs.file.click()
        },
        change($event) {
            this.$emit('update:modelValue', $event.target.files[0]);
        },
        remove() {
            this.$emit('update:modelValue', null)
        },
    },
}
</script>
