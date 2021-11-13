<template>
  <div id="header" class="sm:container sm:mx-auto bg-white">
    <div
      class="
        z-10
        max-w-screen-lg
        xl:max-w-screen-xl
        block
        sm:flex sm:justify-between sm:items-center
        my-6
      "
    >
      <div id="search-wrapper" class="m-1">
        <input
          type="text"
          v-model="search"
          placeholder="Search something"
          class="rounded-full py-1 px-4"
        />
      </div>
      <!-- Header small screen menu start -->
      <div class="flex justify-between items-center px-4 sm:px-0">
        <!-- Theme switcher small screen start -->
        <!-- <theme-switcher
          :theme="theme"
          @themeChanged="updateTheme"
          class="
            block
            sm:hidden
            bg-ternary-light
            dark:bg-ternary-dark
            hover:bg-hover-light
            dark:hover:bg-hover-dark
            hover:shadow-sm
            px-2.5
            py-2
            rounded-lg
            ml-10
          "
        /> -->
        <!-- Theme switcher small screen end -->
      </div>
      <!-- Header small screen menu end -->

      <!-- Header right section end -->
      <div
        class="hidden sm:flex justify-between items-center flex-col md:flex-row"
      >
        <!-- Theme switcher largr screen start -->
        <!-- <theme-switcher
          :theme="theme"
          @themeChanged="updateTheme"
          class="
            ml-8
            bg-primary-light
            dark:bg-ternary-dark
            px-3
            py-2
            shadow-sm
            rounded-xl
            cursor-pointer
          "
        /> -->
        <!-- Theme switcher largr screen end -->
      </div>
      <!-- Header right section ends -->
    </div>
  </div>
</template>

<script>
import feather from "feather-icons";
import ThemeSwitcher from "./ThemeSwitcher";

export default {
  props: {},
  components: {
    ThemeSwitcher,
  },
  data() {
    return {
      //   theme: '',
      postList: "",
    };
  },
  created() {
    this.theme = localStorage.getItem("theme") || "light";
  },
  mounted() {
    feather.replace();
    this.theme = localStorage.getItem("theme") || "light";
  },
  methods: {
    updateTheme(theme) {
      this.theme = theme;
    },
  },
  updated() {
    feather.replace();
  },
  computed: {
    filteredList() {
      return this.postList;
    },
  },
};
</script>

<style>
</style>