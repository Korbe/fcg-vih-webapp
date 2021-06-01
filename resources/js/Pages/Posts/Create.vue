<template>
  <AppLayout>

    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Create Post
      </h2>
    </template>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
          <form @submit.prevent="createPost">
            <div class="p-6 bg-white border-b border-gray-200">
              <div class="grid grid-cols-6 gap-6">

                <div class="col-span-6">
                  <jet-label for="title" value="Title"/>
                  <jet-input id="title" type="text" class="mt-1 block w-full" v-model="form.title" autocomplete="name"/>
                  <jet-input-error :message="form.errors.title" class="mt-2"/>
                </div>

                <div class="col-span-6">
                  <jet-label for="content" value="Text"/>
                  <tip-tap-editor v-model="form.content"/>
                  <jet-input-error :message="form.errors.content" class="mt-2"/>
                </div>

              </div>

            </div>

            <div class="bg-gray-200 bg-opacity-25 flex flex-row-reverse">
              <div class="p-6">
                <jet-button>Erstellen</jet-button>
              </div>
            </div>
          </form>

        </div>
      </div>
    </div>

  </AppLayout>

</template>

<script>
import AppLayout from "../../Layouts/AppLayout";
import JetLabel from "../../Jetstream/Label";
import JetInputError from "../../Jetstream/InputError";
import JetInput from "../../Jetstream/Input";
import TipTapEditor from "../../Shared/TipTapEditor";
import JetButton from "../../Jetstream/Button";


export default {
  metaInfo: {title: 'Create Post'},
  components: {JetButton, TipTapEditor, JetInput, JetInputError, JetLabel, AppLayout},
  data() {
    return {
      form: this.$inertia.form({
        title: null,
        content: null,
      }),
    }
  },
  methods: {
    createPost() {
      /*if (this.$refs.photo) {
        this.form.photo = this.$refs.photo.files[0]
      }*/

      if(this.form.content === "<p></p>")
        this.form.content = null;

      this.form.post(route('posts.store'), {
        preserveScroll: true
      });
    },
  }
}
</script>