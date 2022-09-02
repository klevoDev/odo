<script setup>
import { RouterLink, RouterView } from 'vue-router'
</script>

<template>
  <header class="header">
    <div class="container">
        <div class="header__row">
            <div class="header__wrap-logo">
                <a class="header__logo logo" href="./index.html">
                    ODO
                </a>
            </div>
            <nav class="header__nav">
                <ul class="header__nav-list">
                    <li class="header__item">
                        <a class="header__link" href="index.html">
                            События
                        </a>
                    </li>
                    <li class="header__item">
                        <a class="header__link" href="./blog-list.html">
                            Блог
                        </a>
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
                    <a class="header__subscribe subscribe" href="#">
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
                      <a class="footer__logo logo" href="#">
                          ODO
                      </a>
                  </li>
                  <li class="footer__item">
                      <a class="footer__ref" href="#">
                          События
                      </a>
                  </li>
                  <li class="footer__item">
                      <a class="footer__ref" href="./blog-list.html">
                          Блог
                      </a>
                  </li>
                  <li class="footer__item">
                      <a class="footer__ref" href="#">
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
                      <a class="footer__subscribe subscribe" href="#">
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
