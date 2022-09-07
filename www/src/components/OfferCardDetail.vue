<script>
import { RouterLink } from 'vue-router'

export default {
  props: {
    name: String,
    company: { name: String, sub: String, logo: String, logoAlt: String },
    stack: [String],
    eventDt: String
  },
  methods: {
    backToCards: function () {
      this.$parent.closeOffer()
    }
  }
}
</script>

<template>
  <section class="page__details details">
    <div class="container">
      <div class="note__wrap-back">
        <a class="note__back _icon-back-arrow" href="#" @click="backToCards">
          Назад к событиям
        </a>
      </div>
      <div class="details__wrap" @click="backToCards">
        <div class="details__wrap-headig">
          <h2 class="details__subheading">
            {{name}}
          </h2>
          <ul class="details__company-info">
            <li class="details__wrap-logo">
              <img class="details__logo" :src="company.logo" :alt="company.logoAlt">
            </li>
            <li class="details__about-company">
              {{company.name}} <br>
              <span class="details__span-company">
                {{company.sub}}
              </span>
            </li>
          </ul>
        </div>
        <ul class="details__stack-list">
          <li class="details__point" v-for="s in stack">
            {{s}}
          </li>
        </ul>
        <div class="details__wrap-stages">
          <ul class="details__stage-list">
            <li class="details__stage-one">
              <span class="details__number">
                1
              </span>
            </li>
            <li class="details__line">
            </li>
            <li class="details__stage-one">
              <span class="details__number">
                2
              </span>
            </li>
            <li class="details__line">
            </li>
            <li class="details__stage-one">
              <span class="details__number">
                3
              </span>
            </li>
            <li class="details__line">
            </li>
            <li class="details__stage-one">
              <span class="details__number">
                4
              </span>
            </li>
          </ul>
          <ul class="details__stage-info-list">
            <li class="details__info-one">
              Заявка на участие <br>
              <span class="details__span">
                до 18 августа
              </span>
            </li>
            <li class="details__info-two">
              Интервью <br>
              <span class="details__span">
                1,5 часа, с решением задач
              </span>
            </li>
            <li class="details__info-three">
              Кодинг <br>
              <span class="details__span">
                Тестирование
              </span>
            </li>
            <li class="details__info-four">
              Оффер <br>
              <span class="details__span">
                Презентация плюшек
              </span>
            </li>
          </ul>
        </div>
        <div class="details__topic topic">
          Где когда и во сколько?
        </div>
        <p class="details__text text-details">
          {{eventDt}}
        </p>
        <div class="details__topic topic">
          Требования к участникам?
        </div>
        <p class="details__text text-details">
          Опыт коммерческой разработки на любом языке программирования от 3 лет.
        </p>
        <div class="details__topic topic">
          Что будет на собесе?
        </div>
        <p class="details__text text-details">
          После регистрации вам придет ссылка на Яндекс.Контест, который вы сможете решить в удобное для вас время. После чего с вами свяжется рекрутер, чтобы познакомиться и рассказать подробнее о мероприятии.
          Затем вы пройдете технические секции 25 августа, и мы пригласим вас на финалы 26 августа.
          На технических секциях вы познакомитесь с командами и покажете, что вы знаете об анализе данных, математической статистике, разработке и проектирование процессов.
        </p>
        <div class="details__topic topic">
          В какие команды нанимаем?
        </div>
        <p class="details__text text-details">
          После регистрации вам придет ссылка на Яндекс.Контест, который вы сможете решить в удобное для вас время. После чего с вами свяжется рекрутер, чтобы познакомиться и рассказать подробнее о мероприятии.
        </p>
        <div class="details__wrap-button">
          <a class="details__button" href="https://yandex.ru/promo/events/fasttrack_crowd?from=home">
            Участвовать
          </a>
        </div>
      </div>
      <h3 class="details__title">
        Другие события этой компании
      </h3>
      <div class="tickets__row">
        <div class="tickets__column">
          <div class="tickets__item">
            <h3 class="tickets__title title">
              Frontend Mobile
            </h3>
            <ul class="tickets__stack">
              <li class="tickets__point">
                HTML
              </li>
              <li class="tickets__point">
                CSS
              </li>
              <li class="tickets__point">
                JS
              </li>
              <li class="tickets__point">
                React
              </li>
            </ul>
            <ul class="tickets__data-list">
              <li class="tickets__data-point">
                25 августа с 10:00
              </li>
              <li class="tickets__data-point">
                27 августа до 23:00
              </li>
              <li class="tickets__data-point">
                Заявки принимаются до 18.08
              </li>
            </ul>
            <ul class="tickets__company-info">
              <li class="tickets__wrap-logo">
                <img class="tickets__logo" src="./../img/yandex.png" alt="Company logo providing one day offer.">
              </li>
              <li class="tickets__about-company">
                Яндекс <br>
                <span class="tickets__span-company">
                  Маркет, B2B
                </span>
              </li>
              <li class="tickets__wrap-button">
                <a class="tickets__button" href="https://yandex.ru/jobs/hiring-events?ysclid=l5i3xud1wf755747148" target="_blank">
                  Участвовать
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="tickets__column">
          <div class="tickets__item">
            <a href="#" class="tickets__more"></a>
            <h3 class="tickets__title title">
              Frontend Mobile
            </h3>
            <ul class="tickets__stack">
              <li class="tickets__point">
                HTML
              </li>
              <li class="tickets__point">
                CSS
              </li>
              <li class="tickets__point">
                JS
              </li>
              <li class="tickets__point">
                React
              </li>
            </ul>
            <ul class="tickets__data-list">
              <li class="tickets__data-point">
                25 августа с 10:00
              </li>
              <li class="tickets__data-point">
                27 августа до 23:00
              </li>
              <li class="tickets__data-point">
                Заявки принимаются до 18.08
              </li>
            </ul>
            <ul class="tickets__company-info">
              <li class="tickets__wrap-logo">
                <img class="tickets__logo" src="./../img/yandex.png" alt="Company logo providing one day offer.">
              </li>
              <li class="tickets__about-company">
                Яндекс <br>
                <span class="tickets__span-company">
                  Маркет, B2B
                </span>
              </li>
              <li class="tickets__wrap-button">
                <a class="tickets__button" href="https://yandex.ru/jobs/hiring-events?ysclid=l5i3xud1wf755747148" target="_blank">
                  Участвовать
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="tickets__column">
          <div class="tickets__item">
            <h3 class="tickets__title title">
              Frontend Mobile
            </h3>
            <ul class="tickets__stack">
              <li class="tickets__point">
                HTML
              </li>
              <li class="tickets__point">
                CSS
              </li>
              <li class="tickets__point">
                JS
              </li>
              <li class="tickets__point">
                React
              </li>
            </ul>
            <ul class="tickets__data-list">
              <li class="tickets__data-point">
                25 августа с 10:00
              </li>
              <li class="tickets__data-point">
                27 августа до 23:00
              </li>
              <li class="tickets__data-point">
                Заявки принимаются до 18.08
              </li>
            </ul>
            <ul class="tickets__company-info">
              <li class="tickets__wrap-logo">
                <img class="tickets__logo" src="./../img/yandex.png" alt="Company logo providing one day offer.">
              </li>
              <li class="tickets__about-company">
                Яндекс <br>
                <span class="tickets__span-company">
                  Маркет, B2B
                </span>
              </li>
              <li class="tickets__wrap-button">
                <a class="tickets__button" href="https://yandex.ru/jobs/hiring-events?ysclid=l5i3xud1wf755747148" target="_blank">
                  Участвовать
                </a>
              </li>
            </ul>
          </div>
        </div>
        <div class="tickets__column">
          <div class="tickets__item">
            <h3 class="tickets__title title">
              Frontend Mobile
            </h3>
            <ul class="tickets__stack">
              <li class="tickets__point">
                HTML
              </li>
              <li class="tickets__point">
                CSS
              </li>
              <li class="tickets__point">
                JS
              </li>
              <li class="tickets__point">
                React
              </li>
            </ul>
            <ul class="tickets__data-list">
              <li class="tickets__data-point">
                25 августа с 10:00
              </li>
              <li class="tickets__data-point">
                27 августа до 23:00
              </li>
              <li class="tickets__data-point">
                Заявки принимаются до 18.08
              </li>
            </ul>
            <ul class="tickets__company-info">
              <li class="tickets__wrap-logo">
                <img class="tickets__logo" src="./../img/yandex.png" alt="Company logo providing one day offer.">
              </li>
              <li class="tickets__about-company">
                Яндекс <br>
                <span class="tickets__span-company">
                  Маркет, B2B
                </span>
              </li>
              <li class="tickets__wrap-button">
                <a class="tickets__button" href="https://yandex.ru/jobs/hiring-events?ysclid=l5i3xud1wf755747148" target="_blank">
                  Участвовать
                </a>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
