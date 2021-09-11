<template>
  <section class="document">
    <div class="document__wrapper">
      <div class="document__wrapper-left">
        <div class="dock" v-html="html"></div>
      </div>
      <div class="document__wrapper-right">

      </div>
    </div>
  </section>
</template>

<script>
export default {
  data() {
    return {
      html: ``
    }
  }
}
</script>