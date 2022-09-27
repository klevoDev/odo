<script>
import { RouterLink } from 'vue-router'

export default {
  props: {
    name: String,
    status: String,
    company: { name: String, sub: String, logo: String, logoAlt: String },
    stack: Array,
    eventDt: String,
    eventDt2: String,
    eventInfo: String,
    link: String
  },
  methods: {
    backToCards: function () {
      this.$parent.closeOffer()
    }
  }
}

</script>
<template>
  <!-- начало карточки -->
  <div :class="{ 'tickets__column': status === 'active', 'completed__column': status !== 'active' }">
    <div :class="{ 'tickets__item': status === 'active', 'completed__item': status !== 'active' }">
      <!-- заголовок карточки -->
      <h3 :class="{ 'tickets__title title': status === 'active', 'completed__title': status !== 'active' }">
        {{name}}
      </h3>
      <!-- перечесление навыков -->
      <ul :class="{ 'tickets__stack': status === 'active', 'completed__stack': status !== 'active' }">
        <li v-for="s in stack" :class="{ 'tickets__point': status === 'active', 'completed__point': status !== 'active' }">
          {{s}}
        </li>
      </ul>
      <!-- дата проведения события -->
      <ul :class="{ 'tickets__data-list': status === 'active', 'completed__data-list': status !== 'active' }">
        <li :class="{ 'tickets__data-point': status === 'active', 'completed__data-point': status !== 'active' }">
          <strong>{{eventDt}}</strong>
        </li>
        <li :class="{ 'tickets__data-point': status === 'active', 'completed__data-point': status !== 'active' }" v-if="eventDt2">
          <strong v-html="eventDt2"></strong>
        </li>
        <li :class="{ 'tickets__data-info': status === 'active', 'completed__data-info': status !== 'active' }">
          {{eventInfo}}
        </li>
      </ul>
      <!-- лого компаниии и кнопка -->
      <div :class="{ 'tickets__wrap-company': status === 'active', 'completed__wrap-company': status !== 'active' }">
        <div :class="{ 'tickets__name-company': status === 'active', 'completed__name-company': status !== 'active' }">
          <img :class="{ 'tickets__company-logo': status === 'active', 'completed__company-logo': status !== 'active' }" :src="company.logo" :alt="company.logoAlt">
          <span :class="{ 'tickets__span-name': status === 'active', 'completed__span-name': status !== 'active' }">
            {{company.name}}
          </span>
        </div>
        <div class="tickets__wrap-button" v-if="status === 'active'">
          <a class="tickets__button button" :href="link" target="_blank">
            Участвовать
          </a>
        </div>
      </div>
    </div>
  </div>
  <!-- карточка с картинкой скоро новое событие -->

</template>
<style>
.tickets__button {
  cursor: pointer;
}
</style>
