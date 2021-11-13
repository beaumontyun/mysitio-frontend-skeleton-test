<!-- Edit page for the blog -->

<template>
  <div class="mb-4 text-ternary-dark dark:text-ternary-light text-lg">
    <form
      @submit.prevent="form.put(route('posts.update', { post: currentID }))"
    >
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
      <!-- <file-input
        v-model="form.image"
        :error="form.errors.image"
        class="pr-6 pb-8 w-full lg:w-1/2"
        type="file"
        accept="image/*"
        label="image"
      /> -->
      <input
        type="file"
        id="image"
        @input="form.image = $event.target.files[0]"
      />
      <!-- <progress
        v-if="form.progress"
        :value="form.progress.percentage"
        max="100"
      >
        {{ form.progress.percentage }}%
      </progress> -->
      <button type="submit" :disabled="form.processing">Submit</button>
    </form>
  </div>
</template>

<script>
import Layout from "../../Shared/Layout.vue";
import { useForm } from "@inertiajs/inertia-vue3";

export default {
  layout: (h, page) => h(Layout, () => child),
  layout: Layout,
  props: {
    blog: Object,
    currentID: Number,
  },
  setup() {
    const form = useForm({
      title: null,
      body: null,
      image: null,
    });
    return { form };
  },
};
</script>