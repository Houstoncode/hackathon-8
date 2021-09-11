<template>
  <section class="home">
    <div class="container">
      <div class="home__title">Статистика использования сайта</div>
      <div class="home__wrapper">
        <div class="home__wrapper-left">
          <div class="home__wrapper-static">
            <div class="home__wrapper-static_item">
              <div class="home__wrapper-static_img">
                <img src="img/static-1.svg" alt="" />
              </div>
              <div class="home__wrapper-static_info">
                <div class="home__wrapper-static_title">
                  Документов обработано
                </div>
                <div class="home__wrapper-static_number">3872</div>
              </div>
            </div>

            <div class="home__wrapper-static_item">
              <div class="home__wrapper-static_img">
                <img src="img/static-2.svg" alt="" />
              </div>
              <div class="home__wrapper-static_info">
                <div class="home__wrapper-static_title">
                  Недочетов найдено
                </div>
                <div class="home__wrapper-static_number">27414</div>
              </div>
            </div>
          </div>

          <div class="home__wrapper-document">
            <div class="home__wrapper-document_title">
              Последние проверенные документы
            </div>
            <div class="home__wrapper-document_block">
              <div class="home__wrapper-document_item">
                <div class="home__wrapper-document_title">Право на хату</div>
                <div class="home__wrapper-document_img">
                  <img src="img/document-icon.svg" alt="" />
                </div>
              </div>

              <div class="home__wrapper-document_item">
                <div class="home__wrapper-document_title">Акт Детсада</div>
                <div class="home__wrapper-document_img">
                  <img src="img/document-icon.svg" alt="" />
                </div>
              </div>

              <div class="home__wrapper-document_item">
                <div class="home__wrapper-document_title">Право на хату</div>
                <div class="home__wrapper-document_img">
                  <img src="img/document-icon.svg" alt="" />
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="home__wrapper-right">
          <div class="home__wrapper-right_title">Как это работает ?</div>
          <ul class="home__wrapper-right_spisok">
            <li class="home__wrapper-right_li">
              1. Подговьте PDF документ который подлежит
              <span>антикоррупционной экспертизе</span>
            </li>
            <li class="home__wrapper-right_li">
              2. Загрузите файл в окно обработки
            </li>
            <li class="home__wrapper-right_li">
              3. Дождитесь окончания экспертизы
            </li>
            <li class="home__wrapper-right_li">
              4. Ознакомьтесь с результами
            </li>
          </ul>
          <div class="home__wrapper-text">
            Наша система выдаст все несостыковки в документе с ссылками на
            постановления и указы правительства РФ
          </div>
          <button class="home__wrapper-btn" @click="isOpen = !isOpen">Загрузить файл и проверить</button>
        </div>
      </div>
    </div>

    <modalDownload v-if="isOpen" @closeModal="isOpen = false" />
  </section>
</template>

<script>
import modalDownload from "../components/ModalDownload.vue";

export default {
  middleware: "auth",
  metaInfo() {
    return { title: this.$t("home") };
  },
  data() {
    return {
      isOpen: false
    };
  },
  components: {
    modalDownload
  }
};
</script>
