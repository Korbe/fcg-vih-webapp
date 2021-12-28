<template>
    <div v-if="editor" class="mb-1">
        <button :class="{ 'bg-gray-900 text-gray-200 rounded': editor.isActive('bold') }" class="px-2 py-1 mr-1" type="button" @click="editor.chain().focus().toggleBold().run()">
            <i class="fas fa-bold"></i>
        </button>
        <button :class="{ 'bg-gray-900 text-gray-200 rounded': editor.isActive('italic') }" class="px-2 py-1 mx-1" type="button" @click="editor.chain().focus().toggleItalic().run()">
            <i class="fas fa-italic"/>
        </button>
        <button :class="{ 'bg-gray-900 text-gray-200 rounded': editor.isActive('strike') }" class="px-2 py-1 mx-1" type="button" @click="editor.chain().focus().toggleStrike().run()">
            <i class="fas fa-strikethrough"></i>
        </button>
        <button :class="{ 'bg-gray-900 text-gray-200 rounded': editor.isActive('paragraph') }" class="px-2 py-1 mx-1" type="button" @click="editor.chain().focus().setParagraph().run()">
            <i class="fas fa-paragraph"></i>
        </button>
        <button :class="{ 'bg-gray-900 text-gray-200 rounded': editor.isActive('bulletList') }" class="px-2 py-1 mx-1" type="button" @click="editor.chain().focus().toggleBulletList().run()">
            <i class="fas fa-list"></i>
        </button>
        <button :class="{ 'bg-gray-900 text-gray-200 rounded': editor.isActive('orderedList') }" class="px-2 py-1 mx-1" type="button" @click="editor.chain().focus().toggleOrderedList().run()">
            <i class="fas fa-list-ol"></i>
        </button>
        <button :class="{ 'bg-gray-900 text-gray-200 rounded': editor.isActive('blockquote') }" class="px-2 py-1 mx-1" type="button" @click="editor.chain().focus().toggleBlockquote().run()">
            <i class="fas fa-quote-right"></i>
        </button>

        <button v-if="editor.isActive('link')" :class="{ 'bg-gray-900 text-gray-200 rounded': editor.isActive('link') }" class="px-2 py-1 mx-1" type="button"
                @click="editor.chain().focus().unsetLink().run()">
            <i class="fas fa-unlink"></i>
        </button>
        <button v-else class="px-2 py-1 mx-1" type="button" @click="setLink">
            <i class="fas fa-link"></i>
        </button>

        <button :class="{ 'bg-gray-900 text-gray-200 rounded': editor.isActive('heading', { level: 1 }) }" class="px-2 py-1 mx-1" type="button"
                @click="editor.chain().focus().toggleHeading({ level: 1 }).run()">
            H1
        </button>
        <button :class="{ 'bg-gray-900 text-gray-200 rounded': editor.isActive('heading', { level: 2 }) }" class="px-2 py-1 mx-1" type="button"
                @click="editor.chain().focus().toggleHeading({ level: 2 }).run()">
            H2
        </button>
        <button :class="{ 'bg-gray-900 text-gray-200 rounded': editor.isActive('heading', { level: 3 }) }" class="px-2 py-1 mx-1" type="button"
                @click="editor.chain().focus().toggleHeading({ level: 3 }).run()">
            H3
        </button>

        <button class="px-2 py-1 mx-1" type="button" @click="editor.chain().focus().undo().run()">
            <i class="fas fa-undo"></i>
        </button>
        <button class="px-2 py-1 mx-1" type="button" @click="editor.chain().focus().redo().run()">
            <i class="fas fa-redo"></i>
        </button>
        <!--    <button type="button" class="px-2 py-1 mx-1" @click="editor.chain().focus().toggleHeading({ level: 4 }).run()" :class="{ 'bg-gray-900 text-gray-200 rounded': editor.isActive('heading', { level: 4 }) }">
              h4
            </button>
            <button type="button" class="px-2 py-1 mx-1" @click="editor.chain().focus().toggleHeading({ level: 5 }).run()" :class="{ 'bg-gray-900 text-gray-200 rounded': editor.isActive('heading', { level: 5 }) }">
              h5
            </button>
            <button type="button" class="px-2 py-1 mx-1" @click="editor.chain().focus().toggleHeading({ level: 6 }).run()" :class="{ 'bg-gray-900 text-gray-200 rounded': editor.isActive('heading', { level: 6 }) }">
              h6
            </button>-->


        <button class="px-2 py-1 mx-1" type="button" @click="editor.chain().focus().setHorizontalRule().run()">
            Trenn-Linie
        </button>
        <button class="px-2 py-1 mx-1" type="button" @click="editor.chain().focus().setHardBreak().run()">
            Zeilenumbruch
        </button>
        <button class="px-2 py-1 mx-1" type="button" @click="editor.chain().focus().unsetAllMarks().run()">
            Formatierung löschen
        </button>
        <button class="px-2 py-1 mx-1" type="button" @click="editor.chain().focus().clearNodes().run()">
            Formatstruktur löschen
        </button>

    </div>

    <editor-content :editor="editor"/>
</template>

<script>
import {Editor, EditorContent} from '@tiptap/vue-3'
import Link from '@tiptap/extension-link'
import StarterKit from '@tiptap/starter-kit'

export default {
    name: "TipTapEditor",
    components: {
        EditorContent,
    },
    props: {
        modelValue: {
            type: String,
            default: '',
        },
    },
    data() {
        return {
            editor: null,
        }
    },
    mounted() {
        this.editor = new Editor({
            content: this.modelValue,
            extensions: [
                StarterKit,
                Link
            ],
            editorProps: {
                attributes: {
                    class: 'p-3 prose sm:prose lg:prose-lg lg:w-full lg:max-w-full focus:border-indigo-300 ' +
                        'border border-gray-300 rounded-md shadow-sm' +
                        'focus:ring focus:ring-indigo-200 focus:ring-opacity-50 focus:outline-none',
                },
            },
            onUpdate: () => {
                this.$emit('update:modelValue', this.editor.getHTML())
            },
        })
    },
    beforeUnmount() {
        this.editor.destroy()
    },
    watch: {
        modelValue(value) {
            const isSame = this.editor.getHTML() === value

            if (isSame) {
                return
            }

            this.editor.commands.setContent(this.modelValue, false)
        },
    },
    methods: {
        setLink() {
            const url = window.prompt('URL')

            this.editor.chain().focus().setLink({href: url}).run()
        },
    },
}
</script>

<style scoped>
.prose {
    max-width: unset;
}
</style>
