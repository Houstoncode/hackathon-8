<template>
  <header class="header" :class="{ 'header-submenu-open': isOpenSubmenu }">
    <div class="container">
      <div class="header__wrapper">
        <router-link to="/" class="header__wrapper-logo">
          <img src="img/logo-icon.svg" alt="" />
        </router-link>
        <div class="header__wrapper-bar">
          <div class="header__wrapper-bar_top">
            <div class="header__wrapper-bar_left">
              <div class="header__wrapper-bar_name">{{ user.name }}</div>
              <div class="header__wrapper-bar_email">{{ user.email }}</div>
            </div>
            <div
              class="header__wrapper-bar_right"
              @click="isOpenSubmenu = !isOpenSubmenu"
            >
              <img :src="user.photo_url" alt="" />
            </div>
          </div>
          <div class="header__wrapper-bar_submenu">
            <router-link to="/profile" class="header__wrapper-bar_btn"
              >Профиль</router-link
            >
            <button @click="handleLogout" class="header__wrapper-bar_btn">
              Выйти
            </button>
          </div>
        </div>
      </div>
    </div>
  </header>
</template>

<script>
import { mapState, mapActions } from "vuex";

export default {
  data() {
    return {
      isOpenSubmenu: false
    };
  },
  methods: {
    ...mapActions("auth", ["logout"]),
    async handleLogout() {
      await this.logout();

      this.$router.push("/login");
    }
  },
  computed: {
    ...mapState("auth", ["user"])
  }
};
</script>
