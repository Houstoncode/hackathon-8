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
            <router-link to="/document"
              class="profile__wrapper-block_item"
              v-for="(item, idx) in documents"
              :key="idx"
            >
              <div class="profile__wrapper-block_img">
                <img src="img/document-black-icon.svg" alt="" />
              </div>
              <div class="profile__wrapper-block_info">
                <div class="profile__wrapper-block_title">{{ item.title }}</div>
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
                    {{ item.currentError }}
                  </div>
                </div>
              </div>
            </router-link>
          </div>
        </div>

        <div class="profile__wrapper-right">
            <div class="profile__wrapper-title">Об аккаунте</div>
            <div class="profile__wrapper-info">
                <div class="profile__wrapper-info_block">
                    <div class="profile__wrapper-info_title">Имя</div>
                    <div class="profile__wrapper-info_text">Иван</div>
                </div>
                 <div class="profile__wrapper-info_block">
                    <div class="profile__wrapper-info_title">Фамилия</div>
                    <div class="profile__wrapper-info_text">Иванов</div>
                </div>
                 <div class="profile__wrapper-info_block">
                    <div class="profile__wrapper-info_title">E-mail</div>
                    <div class="profile__wrapper-info_text">ivan.ivanov.yandex.ru</div>
                </div>
            </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  data() {
    return {
      documents: [
        {
          title: "Право на очередность жилья",
          currentError: 5
        },
        {
          title: "Право на очередность жилья",
          currentError: 5
        },
        {
          title: "Право на очередность жилья",
          currentError: 5
        },
        {
          title: "Право на очередность жилья",
          currentError: 5
        },
        {
          title: "Право на очередность жилья",
          currentError: 5
        }
      ]
    };
  }
};
</script>
