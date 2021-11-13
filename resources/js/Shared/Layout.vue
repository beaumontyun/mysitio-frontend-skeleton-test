<template>
  <main class="min-h-full flex flex-col">
    <Header class="sticky top-0"></Header>
    <article class="py-1 flex-2 overflow-auto">
      <slot />
    </article>
    <Footer class="fixed bottom-0 w-full mt-auto"></Footer>
  </main>
</template>

<script>
import Header from "./Header.vue";
import Footer from "./Footer.vue";

export default {
  components: {
    Header,
    Footer,
  },
};
</script>