<script setup>
import { RouterLink } from 'vue-router'
</script>

<template>
  <div class="page__blog blog">
    <div class="container">
      <div class="blog__wrap-blog">
        <div class="blog__row">
          <div class="blog__wrap-image">
            <img class="blog__image" src="./../img/pic.jpg" alt="Here is the actual description of the picture.">
          </div>
          <div class="blog__body">
            <h2 class="blog__subheading subheading">
              Заголовок длинный в 2 строки
            </h2>
            <p class="blog__text">
              Подзаголовок Подзаголовок Подзаголовок Подзаголовок Подзаголовок длинный описание в 3 строки
            </p>
            <div class="blog__tag">
              #ключевик #ключевик #ключевик #ключевик
            </div>
            <div class="blog__wrap-more">
              <RouterLink class="blog__more" to="/blog-article">
                Читать полностью
              </RouterLink>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="page__blog blog">
    <div class="container">
      <div class="blog__wrap-blog">
        <div class="blog__row">
          <div class="blog__wrap-image">
            <img class="blog__image" src="./../img/pic.jpg" alt="Here is the actual description of the picture.">
          </div>
          <div class="blog__body">
            <h2 class="blog__subheading subheading">
              Заголовок длинный в 2 строки
            </h2>
            <p class="blog__text">
              Подзаголовок Подзаголовок Подзаголовок Подзаголовок Подзаголовок длинный описание в 3 строки
            </p>
            <div class="blog__tag">
              #ключевик #ключевик #ключевик #ключевик
            </div>
            <div class="blog__wrap-more">
              <RouterLink class="blog__more" to="/blog-article">
                Читать полностью
              </RouterLink>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
