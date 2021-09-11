<template>
  <section class="document">
    <div class="document__wrapper">
      <div class="document__wrapper-left">
        <div class="dock" v-html="documentHTML"></div>
      </div>
      <div class="document__wrapper-right">

      </div>
    </div>
  </section>
</template>

<script>
import { mapState } from 'vuex';

export default {
  computed: {
    ...mapState('document', ['documentHTML'])
  },
  data() {
    return {
      html: ``
    }
  }
}
</script>