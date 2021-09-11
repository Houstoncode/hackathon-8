<template>
  <section class="document">
    <div class="container">
      <div class="document__wrapper">
        <div class="document__wrapper-left" v-html="Dock">

        </div>
        <div class="document__wrapper-right"></div>
      </div>
    </div>
  </section>
</template>

<script>
import Dock from "../components/dock.vue";

export default {
  components: {
    Dock
  }
};
</script>
