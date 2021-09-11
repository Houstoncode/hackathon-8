<template>
 
  <div class="main-layout">
    <Header />

    <div class="container mt-4">
      <child />
    </div>
  </div>
</template>

<script>
import Header from "../components/Header";
import Loader from "../components/Prealoder.vue";

export default {
  name: "MainLayout",

  components: {
    Header,
    Loader
  }
};
</script>
