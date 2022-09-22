<script>
import { RouterLink } from 'vue-router'
import { inject } from 'vue'
import axios from 'axios'
import OfferCardDetail from '@/components/OfferCardDetail.vue'

const getData = url => axios.get(url)
const setLocalImgs = c => {
  if (c.company) {
    c.company.logo = c.company.logo.replace('img/', 'src/img/')
  }
  if (c.logo) {
    c.logo = c.logo.replace('img/', 'src/img/')
  }
  return c
}

const now = new Date()
const maxMonth = now.toISOString().substr(0, 7)
const minMonth = '2022-07'
now.setMonth(now.getMonth() - 1)
const curMonth = now.toISOString().substr(0, 7)

const incMonth = isoDt => {
  const dt = new Date(isoDt)
  dt.setMonth(dt.getMonth() + 1)
  const res = dt.toISOString().substr(0, 7)
  if (res > maxMonth) {
    return isoDt
  }
  return res
}

const decMonth = isoDt => {
  const dt = new Date(isoDt)
  dt.setMonth(dt.getMonth() - 1)
  const res = dt.toISOString().substr(0, 7)
  if (res < minMonth) {
    return isoDt
  }
  return res
}

let apiBase
let dev
let cardsAll = []
export default {
  setup() {
    apiBase = inject('apiBase')
    dev = inject('dev')
  },
  components: {
    OfferCardDetail
  },
  data() {
    return {
      offer: null,
      cards: [],
      completed: [],
      stats: {},
      curMonth: curMonth,
      maxMonth: maxMonth,
      minMonth: minMonth
    }
  },
  beforeMount() {
    this.loadData()
    // console.log('before mount')
  },
  mounted() {
    // console.log('mounted')
  },
  methods: {
    loadData: function () {
      const self = this
      Promise.all([
        getData(`${apiBase}cards.php`),
        getData(`${apiBase}stats.php`)
      ])
        .then(resp => {
          // toastr.success('Карточки успешно получены')
          cardsAll = resp[0].data.data
          if (dev) {
            cardsAll = cardsAll.map(setLocalImgs)
          }
          self.cards = cardsAll.filter(c => c.status === 'active')
          self.completed = cardsAll.filter(c => c.status === 'completed' && c.completedDt && c.completedDt.substr(0, 7) === curMonth)
          const oftenHiredCompanies = self.completed.map(item => item.company)
          // if (dev) {
          //   oftenHiredCompanies = oftenHiredCompanies.map(setLocalImgs)
          // }
          resp[1].data.data.oftenHiredCompanies = oftenHiredCompanies
          self.stats = resp[1].data.data
          console.log('loaded data')
        })
        .catch(err => {
          console.log(err)
          // toastr.error(err.message)
        })
    },
    closeOffer: function () {
      this.offer = null
    },
    openSubscription: function (position, state) {
      this.$parent.$parent.openSubscription(position, state)
    },
    getMonthName: function (isoDt) {
      const num = parseInt(isoDt.substr(6, 2), 10)
      const months = ['января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря']
      return months[num - 1]
    },
    updateCompletedCards: function () {
      console.log(this.curMonth)
      this.completed = cardsAll.filter(c => c.status === 'completed' && c.completedDt && c.completedDt.substr(0, 7) === this.curMonth)
      this.stats.completed = this.completed.length
      const unique = {}
      this.completed.forEach(c => {
        unique[c.company.name] = true
      })
      this.stats.fastHireCompanies = Object.keys(unique).length
      this.stats.oftenHiredCompanies = this.completed.map(item => item.company)
    },
    showCompletedByMonth: function (monthIso) {
      this.curMonth = monthIso
      this.updateCompletedCards()
    },
    prevCompletedMonths: function () {
      this.curMonth = decMonth(this.curMonth)
      this.updateCompletedCards()
    },
    nextCompletedMonths: function () {
      this.curMonth = incMonth(this.curMonth)
      this.updateCompletedCards()
    }
  }
}
</script>

<template>
  <section class="page__start start">
    <div class="container">
      <div class="start__row">
        <div class="start__body">
          <h2 class="start__label subheading">
            найди свой
          </h2>
          <h1 class="start__heading">
            One Day Offer
          </h1>
          <p class="start__text">
            Все вакансии быстрого найма от лучших компаний страны
          </p>
          <div class="start__wrap-subscribe">
            <a class="start__subscribe subscribe" href="#" @click="openSubscription('middle')">
              Подписаться на события
            </a>
          </div>
        </div>
        <div class="start__wrap-picture">
          <img class="start__picture" src="./../img/man.png" alt="A person is looking for a job.">
        </div>
      </div>
    </div>
  </section>
  <OfferCardDetail v-if="offer" v-bind="offer" />
  <div class="page__tickets tickets" v-if="!offer">
    <div class="container">
      <div class="tickets__row">
        <!-- начало карточки -->
        <div class="tickets__column" v-for="c in cards" @click="offer = c">
          <div class="tickets__item">
            <!-- заголовок карточки -->
            <h3 class="tickets__title title">
              {{c.name}}
            </h3>
            <!-- перечесление навыков -->
            <ul class="tickets__stack">
              <li v-for="s in c.stack" class="tickets__point">
                {{s}}
              </li>
            </ul>
            <!-- дата проведения события -->
            <ul class="tickets__data-list">
              <li class="tickets__data-point">
                <strong>{{c.eventDt}}</strong>
              </li>
              <li class="tickets__data-point" v-if="c.eventDt2">
                <strong v-html="c.eventDt2"></strong>
              </li>
              <li class="tickets__data-info">
                {{c.eventInfo}}
              </li>
            </ul>
            <!-- лого компаниии и кнопка -->
            <div class="tickets__wrap-company">
              <div class="tickets__name-company">
                <img class="tickets__company-logo" src="./../img/yan.png" alt="">
                <span class="tickets__span-name">
                  {{c.company.name}}
                </span>
              </div>
              <div class="tickets__wrap-button">
                <a class="tickets__button button" :href="c.link" target="_blank">
                  Участвовать
                </a>
              </div>
            </div>
          </div>
        </div>
        <!-- карточка с картинкой скоро новое событие -->
        <div class="tickets__column">
          <div class="tickets__item-shadow">
            <h3 class="tickets__title-shadow">
              Скоро тут будет новое событие
            </h3>
            <div class="tickets__wrap-img-load">
              <img class="tickets__wrap-load" src="./../img/ellipse.png" alt="Uploading a future offer.">
            </div>
            <div class="tickets__wrap-cartoon">
              <img class="tickets__cartoon" src="./../img/girl-help.png" alt="The girl shows where the offer card will be.">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <section class="page__statistics statistics" v-if="!offer">
    <div class="container">
      <h2 class="statistics__subheading">
        Статистика <span>{{getMonthName(curMonth)}}</span>
      </h2>
      <div class="statistics__row">
        <div class="statistics__column">
          <div class="statistics__wrap-event">
            <span class="statistics__number">{{stats.completed}}</span>
            <span class="statistics__event">Проведенных мероприятий</span>
          </div>
        </div>
        <div class="statistics__column">
          <div class="statistics__wrap-biz">
            <span class="statistics__number">{{stats.fastHireCompanies}}</span>
            <span class="statistics__biz">Компаний в быстром найме</span>
          </div>
        </div>
        <div class="statistics__column">
          <div class="statistics__wrap-top">
            <ul class="statistics__list">
              <li v-for="c in stats.oftenHiredCompanies" class="statistics__company-item">
                <img class="statistics__company" :src="c.logo" :alt="c.logoAlt">
                <span class="statistics__span">{{c.name}}</span>
              </li>
            </ul>
            <p class="statistics__text-top">
              Часто нанимают
            </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <section class="page__completed completed" v-if="!offer">
    <div class="container">
      <div class="completed__row-data">
        <h2 class="completed__subheading">
          Уже завершены
        </h2>
        <ul class="completed__list-data">
          <li class="completed__left-button" v-show="curMonth !== minMonth">
            <a class="completed__left _icon-data-left" @click="prevCompletedMonths" style="cursor: pointer;"></a>
          </li>
          <li v-for="m in stats.completedMonths" class="completed__wrap-month">
            <a class="completed__month" @click="showCompletedByMonth(m.monthIso)" :class="{ 'completed__month__active': m.monthIso === curMonth }" style="cursor: pointer;">
              {{m.name}}
            </a>
          </li>
          <li class="completed__rigth-button" v-show="curMonth !== maxMonth">
            <a class="completed__rigth _icon-data-right" @click="nextCompletedMonths" style="cursor: pointer;"></a>
          </li>
          <li v-for="y in stats.completedYears" class="completed__year">
            {{y.name}}
          </li>
        </ul>
      </div>
      <div class="completed__row">
        <div v-for="c in completed" class="completed__column">
          <div class="completed__item">
            <h3 class="completed__title title">
              {{c.name}}
            </h3>
            <ul class="completed__stack">
              <li v-for="s in c.stack" class="completed__point">
                {{s}}
              </li>
            </ul>
            <ul class="completed__data-list">
              <li class="completed__data-point">
                {{c.eventDt}}
              </li>
              <li class="completed__data-point" v-if="c.eventDt2">
                {{c.eventDt2}}
              </li>
              <li class="completed__data-point">
                {{c.eventInfo}}
              </li>
            </ul>
            <div class="completed__wrap-company">
              <div class="completed__name-company">
                <img class="completed__company-logo" :src="c.company.logo" :alt="c.company.logoAlt">
              </div>
              <span class="completed__span-name">
                {{c.company.sub}}
              </span>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<style>
.completed__month__active {
  color: #151f2d !important;
}
</style>