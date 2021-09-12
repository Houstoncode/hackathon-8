<template>
  <section class="document">
    <div class="document__wrapper">
      <Loader v-show="!documentHTML" />

      <div class="document__wrapper-left">
        <div class="dock" v-if="documentHTML" v-html="documentHTML"></div>
      </div>
      <div class="document__wrapper-right">
        <div class="document__wrapper-right_result">
          <div class="document__wrapper-right_number">
            Ошибок найдено: <span>4</span>
          </div>
          <ul class="document__wrapper-right_spisok">
            <li>1. Правок акт 15</li>
            <li>2. Правок акт 10</li>
            <li>3. Правок акт 25</li>
            <li>4. Правок акт 15</li>
          </ul>
        </div>

        <a
          href="img/file.pdf"
          download=""
          class="document__wrapper-right_download"
          >Скачать итоговый <br />
          отчет</a
        >
      </div>
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
