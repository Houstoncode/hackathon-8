<template>
  <div>
    <div class="modal__filter" @click="$emit('closeModal')"></div>
    <div class="modal-download">
      <div class="modal-download__title">Перетащите файл PDF</div>
      <div class="modal-download__img">
        <input
          type="file"
          ref="inputDocument"
          @change="fileDocument = $refs.inputDocument.value"
        />

        <Loader v-if="isLoader" />
        <img v-if="!isLoader" src="img/download-icon.svg" alt="" />
      </div>
      <button
        class="modal-download__btn"
        :disabled="!fileDocument"
        @click="ConvertToHTML"
      >
        Проверить
      </button>
    </div>
  </div>
</template>

<script>
import { mapActions, mapState } from "vuex";

export default {
  data() {
    return {
      fileDocument: "",
      isLoader: false
    };
  },
  computed: {
    ...mapState("document", ["documentCode"])
  }, 
  methods: {
    ...mapActions("document", ["getConvertToHTML"]),
    async ConvertToHTML() {
      this.isLoader = true;
      await this.getConvertToHTML();
      console.log(this.documentCode)
      this.$router.push({ name: "document", params: { code: this.documentCode} });
    }
  }
};
</script>
