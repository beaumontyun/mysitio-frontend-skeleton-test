<!-- Add content page -->

<!-- Design schema:
    1) minimalistic
    2) simple form -->

<!-- WIP: Consider whether user could add their items for sale using this link -->

<template>
  <div class="mb-4 text-ternary-dark dark:text-ternary-light text-lg">
    <form @submit.prevent="submit">
      <label for="title">Title: </label>
      <input
        type="text"
        id="title"
        v-model="form.title"
        placeholder="type something"
        class="rounded-full py-1 px-4"
      />
      <label for="body">Body: </label>
      <input
        type="text"
        id="body"
        v-model="form.body"
        placeholder="type something"
        class="rounded-full py-1 px-4"
      />
      <label for="image">Image:</label>
      <input
        type="file"
        id="image"
        @input="form.image = $event.target.files[0]"
      />
      <progress
        v-if="form.progress"
        :value="form.progress.percentage"
        max="100"
      >
        {{ form.progress.percentage }}%
      </progress>
      <button type="submit">Submit</button>
    </form>
  </div>
</template>

<script>
import Layout from "../../Shared/Layout.vue";
import { useForm } from '@inertiajs/inertia-vue3'

export default {
  layout: (h, page) => h(Layout, () => child),
  layout: Layout,
  setup() {
    const form = useForm({
      title: null,
      body: null,
      image: null,
    });

    function submit() {
      form.post("/add");
    }

    return { form, submit };
  },
};
</script>

<style scoped>
* {
  outline: 1px solid red;
}
</style>