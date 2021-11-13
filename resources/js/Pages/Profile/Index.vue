<!-- footer are shared components (not appearing directly in this vue component) -->

<!-- Design schema:
    1) Header bar have no search bar, just the word "Profile" + a settings icon for popout setting
    2) minimalistic profile section (avatar, name, date joined, bio) -->

<!-- Components:
    1) WIP -->
<template>
  <div>
    <p>Profile page</p>
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