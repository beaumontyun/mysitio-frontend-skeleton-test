<template>
  <div class="container md:w-8/12 mb-20 md:mr-80 dark:bg-black">
    <img v-if="blog.image" class="block w-10 h-10 rounded-none mr-2 -my-2" :src="blog.image" />
    <br>
    <p class="font-semibold md:text-4xl dark:text-white">{{ blog.title }}</p>
    <br />
    <p class="subpixel-antialiased md:text-4xl dark:text-white">
      {{ blog.updated_at }}
    </p>
    <br />
    <!-- <p>{{blog.image}}</p> -->
    <p class="subpixel-antialiased md:text-4xl dark:text-white">{{ blog.body }}</p>
    <!-- <div v-if="blogs.length === 0">
      <p>Fetching data...</p>
    </div> -->
    <button
      class="px-8 py-4 bg-gray-50 border-t border-gray-100 flex items-center"
      type="button"
      @click="destroy($event, blog.id)"
    >
      Delete post
    </button>
  </div>
  <div class="container md:w-8/12 mb-20 md:mr-80 dark:bg-black">
    <Edit :currentID="blog.id"></Edit>
  </div>
</template>

<script>
import Layout from "../../Shared/Layout.vue";
import { Inertia } from '@inertiajs/inertia';
import Edit from './Edit.vue';

export default {
  components: {
    Edit
  },
  layout: (h, page) => h(Layout, () => child),
  layout: Layout,
  props: {
    blog: Object,
  },
  methods: {
    destroy(event, id) {
      if (confirm("Are you sure you want to delete this post?")) {
        Inertia.delete("/posts/" + id, { method: "delete" });
        console.log(id);
      }
    },
  },
};
</script>