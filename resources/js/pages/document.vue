<template>
  <section class="document">
    <div class="document__wrapper">
      <div class="document__wrapper-left">
        <h1 class="document__wrapper-error" v-if="!html">Документ не выбран!</h1>
        <div class="dock"  v-if="html" v-html="documentHTML"></div>
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