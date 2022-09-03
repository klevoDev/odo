<script setup>
import { RouterLink, RouterView } from 'vue-router'
import { provide } from 'vue'

provide('apiBase', 'https://onedayoffer.ru/api/')
provide('dev', true)

const openSubscriptionForm = () => {
  alert('Подписаться')
}

const openConctacts = () => {
  alert('Контакты')
}

</script>
<template>
  <header class="header">
    <div class="container">
      <div class="header__row">
        <div class="header__wrap-logo">
          <RouterLink class="header__logo" to="/">
            <img src="./img/logo-odo.png" alt="Logo one day offer.">
          </RouterLink>
        </div>
        <nav class="header__nav">
          <ul class="header__nav-list">
            <li class="header__item">
              <RouterLink class="header__link" to="/">
                События
              </RouterLink>
            </li>
            <li class="header__item">
              <RouterLink class="header__link" to="/blog">
                Блог
              </RouterLink>
            </li>
          </ul>
        </nav>
        <ul class="header__subscribe-list">
          <li class="header__item">
            <a class="header__telegram telegram _icon-telegram" href="https://t.me/onedayoffer" target="_blank">
              Телеграм канал
            </a>
          </li>
          <li class="header__item">
            <a class="header__subscribe subscribe" href="#" @click="openSubscriptionForm">
              Подписаться на события
            </a>
          </li>
        </ul>
        <div class="header__burger">
          <span class="header__span-burger"></span>
        </div>
      </div>
    </div>
  </header>
  <main class="page">
    <RouterView />
  </main>
  <footer class="footer">
    <div class="container">
      <div class="footer__row">
        <ul class="footer__list">
          <li class="footer__item">
            <RouterLink class="footer__logo" to="/">
              <img src="./img/logo-odo.png" alt="Logo one day offer.">
            </RouterLink>
          </li>
          <li class="footer__item">
            <RouterLink class="footer__ref" to="/">
              События
            </RouterLink>
          </li>
          <li class="footer__item">
            <RouterLink class="footer__ref" to="/blog">
              Блог
            </RouterLink>
          </li>
          <li class="footer__item">
            <a class="footer__ref" href="#" @click="openConctacts">
              Контакты
            </a>
          </li>
        </ul>
        <div class="footer__wrap-sub">
          <div class="footer__wrap-telegram">
            <a class="footer__telegram telegram _icon-telegram" href="https://t.me/onedayoffer" target="_blank">
              Телеграм канал
            </a>
          </div>
          <div class="footer__wrap-subscribe">
            <a class="footer__subscribe subscribe" href="#" @click="openSubscriptionForm">
              Подписаться на события
            </a>
          </div>
        </div>
      </div>
    </div>
  </footer>
</template>
<style scoped>
</style>
