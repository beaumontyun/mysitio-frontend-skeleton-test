<!-- Header and footer are shared components (not appearing directly in this vue component) -->

<!-- Design schema: 
        1) clean
        2) relevant
        3) responsive -->

<!-- Design schema - components:
        1) top - 
        2) the rest - API call to database for all posts relevant to the # or search -->

<template>
  <div>
    <div class="mb-4 text-ternary-dark dark:text-ternary-light text-lg">
      <!-- The top section of homepage, reserved for hastags, news, and other features -->
      <div>
        <p>Top Component</p>
      </div>
      <!-- The rest of the homepage contents -->
      <div>
        <p>The Rest</p>
        <div class="wrapper" v-if="blogs.length">
          <div class="blog" v-for="blog in blogs" :key="blog">
            <Link :href="route('posts.show', {post: blog.id})">
              <!-- <img v-bind:src="blog.image"/> -->
              <small>posted by: {{ blog.id }}</small>
              {{ blog.title }}
            </Link>
            <button
              class="
                px-8
                py-4
                bg-gray-50
                border-t border-gray-100
                flex
                items-center
              "
              type="button"
              @click="destroy($event, blog.id)"
            >
              Delete post
            </button>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import Layout from "../../Shared/Layout.vue";
import { Inertia } from '@inertiajs/inertia';

export default {
  components: {
    Link,
  },
  layout: (h, page) => h(Layout, () => child),
  layout: Layout,
  props: {
    blogs: Object,
  },
  methods: {
    destroy(event, id) {
      if (confirm("Are you sure you want to delete this post?")) {
        console.log(id);
        Inertia.visit("/posts/" + id, { method: 'delete'});
      }
    },
  },
};
</script>