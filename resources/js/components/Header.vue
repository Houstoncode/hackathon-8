<template>
  <header class="header">
    <div class="container">
      <div class="header__wrapper">
        <router-link to="/home" class="header__wrapper-logo">
          <img src="img/logo-icon.svg" alt="" />
        </router-link>
        <div class="header__wrapper-bar">
          <div class="header__wrapper-bar_top">
            <div class="header__wrapper-bar_left">
              <div class="header__wrapper-bar_name">Иванов Иван</div>
              <div class="header__wrapper-bar_email">ivan.ivanov.yandex.ru</div>
            </div>
            <div class="header__wrapper-bar_right">
                <img src="img/avatar.jpg" alt="">
            </div>
          </div>
          <div class="header__wrapper-bar_submenu">
            <router-link to="/" class="header__wrapper-bar_btn"
              >Личные данные</router-link
            >
            <router-link to="/" class="header__wrapper-bar_btn"
              >Выйти</router-link
            >
          </div>
        </div>
      </div>
    </div>
  </header>
</template>
