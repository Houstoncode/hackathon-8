<template>
  <div>
    <div class="modal__filter" @click="$emit('closeModal')"></div>
    <div class="modal-download">
      <div class="modal-download__title">Перетащите файл PDF</div>
      <div class="modal-download__img">
        <input type="file" />
        <img src="img/download-icon.svg" alt="" />
      </div>
      <button class="modal-download__btn">Обработать</button>
    </div>
  </div>
</template>
