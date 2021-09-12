<template>
  <section class="document">
    <div class="document__wrapper">
      <Loader v-show="!documentHTML" />

      <div class="document__wrapper-left">
        <div class="dock" v-if="documentHTML" v-html="documentHTML"></div>
      </div>
      <div class="document__wrapper-right"></div>
    </div>
  </section>
</template>

<script>
import { mapState, mapActions } from "vuex";

export default {
  computed: {
    ...mapState("document", ["documentHTML"])
  },
  data() {
    return {
      html: ``
    };
  },
  methods: {
    ...mapActions("document", ["getDocument"])
  },
  mounted() {
    this.getDocument(this.$route.params.code);
  }
};
</script>
