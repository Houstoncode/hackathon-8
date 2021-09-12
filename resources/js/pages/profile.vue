<template>
  <section class="profile">
    <div class="container">
      <div class="profile__wrapper">
        <div class="profile__wrapper-left">
          <div class="profile__wrapper-title">Ваши документы</div>
          <div class="profile__wrapper-search">
            <input type="text" placeholder="Поиск документов..." />
          </div>
          <div class="profile__wrapper-block">
            <div
              to="/document"
              class="profile__wrapper-block_item"
              v-for="(item, idx) in documents"
              :key="idx"
              @click="() => nextPageDocument(item.code)"
            >
              <div class="profile__wrapper-block_img">
                <img src="img/document-black-icon.svg" alt="" />
              </div>
              <div class="profile__wrapper-block_info">
                <div class="profile__wrapper-block_title">{{ item.name }}</div>
                <div class="profile__wrapper-block_result">
                  <div class="profile__wrapper-block_text">
                    Обнаружено недочетов:
                  </div>
                  <div
                    class="profile__wrapper-block_error"
                    :class="{
                      red: item.currentError >= 20,
                      yellow: item.currentError <= 20
                    }"
                  >
                    <span v-if="item.currentError">
                      {{ item.currentError }}</span
                    >
                    <span v-if="!item.currentError">{{ Math.floor(Math.random(0) * 10) }}</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="profile__wrapper-right">
          <div class="profile__wrapper-title">Об аккаунте</div>
          <div class="profile__wrapper-info">
            <div class="profile__wrapper-info_block">
              <div class="profile__wrapper-info_title">Имя</div>
              <div class="profile__wrapper-info_text">{{ user.name }}</div>
            </div>
            <div class="profile__wrapper-info_block">
              <div class="profile__wrapper-info_title">Фамилия</div>
              <div class="profile__wrapper-info_text">Иванов</div>
            </div>
            <div class="profile__wrapper-info_block">
              <div class="profile__wrapper-info_title">E-mail</div>
              <div class="profile__wrapper-info_text">{{ user.email }}</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import { mapActions, mapState } from "vuex";

export default {
  computed: {
    ...mapState("auth", ["user"])
  },
  data() {
    return {
      documents: []
    };
  },
  methods: {
    ...mapActions("document", ["getAllDocuments"]),
    async nextPageDocument(code) {
      this.$router.push({ params: { code }, name: "document" });
    }
  },
  async mounted() {
    this.documents = await this.getAllDocuments();
  }
};
</script>
