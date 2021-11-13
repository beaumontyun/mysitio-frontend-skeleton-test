<!-- Header and footer are shared components (not appearing directly in this vue component) -->

<!-- Design schema: 
        1) clean
        2) relevant
        3) responsive -->

<!-- Design schema - components:
        1) top - Search bar
        2) middle - categories and filters
        3) the rest - API call to database for all posts relevant to the # or search -->

<template>
  <div class="mb-4 text-ternary-dark dark:text-ternary-light text-lg">
    <div>Marketplace - Top component</div>
    <div>Mid component</div>
    <div>The Rest</div>
  </div>
</template>

<script>
import Layout from "../../Shared/Layout.vue";

export default {
  layout: (h, page) => h(Layout, () => child),
  layout: Layout,
};
</script>

<style>
</style>