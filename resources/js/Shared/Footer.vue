<template>
  <div class="text-ternary-dark dark:text-ternary-light text-lg bg-white">
    <div class="m-6 flex justify-between">
      <Link :href="route('posts')" method="get">
        <i data-feather="home" class="ml-0 sm:ml-1 mr-2 sm:mr-3 w-5 sm:w-6"></i>
      </Link>
      <Link :href="route('market')" method="get"
        ><i
          data-feather="package"
          class="ml-0 sm:ml-1 mr-2 sm:mr-3 w-5 sm:w-6"
        ></i
      ></Link>
      <Link :href="route('add')" method="get"
        ><i
          data-feather="plus-square"
          class="ml-0 sm:ml-1 mr-2 sm:mr-3 w-5 sm:w-6"
        ></i
      ></Link>
      <Link :href="route('message')" method="get"
        ><i data-feather="send" class="ml-0 sm:ml-1 mr-2 sm:mr-3 w-5 sm:w-6"></i
      ></Link>
      <Link :href="route('profile')" method="get"
        ><i data-feather="user" class="ml-0 sm:ml-1 mr-2 sm:mr-3 w-5 sm:w-6"></i
      ></Link>
    </div>
  </div>
</template>

<script>
import { Link } from "@inertiajs/inertia-vue3";
import feather from "feather-icons";

export default {
  components: {
    Link,
  },
};
</script>

<style>
</style>