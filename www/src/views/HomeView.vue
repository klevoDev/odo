<script>
import { RouterLink } from 'vue-router'
import { inject } from 'vue'
import axios from 'axios'
import OfferCard from '@/components/OfferCard.vue'
import OfferCardDetail from '@/components/OfferCardDetail.vue'

const getData = url => axios.get(url)
const setLocalImgs = c => {
  if (c.company) {
    c.company.logo = c.company.logo.replace('img/', 'src/img/')
    c.company.logoEnd = c.company.logoEnd.replace('img/', 'src/img/')
  }
  if (c.logo) {
    c.logo = c.logo.replace('img/', 'src/img/')
    c.logoEnd = c.logoEnd.replace('img/', 'src/img/')
  }
  return c
}

const now = new Date()
let curMonth
if (now.getDate() <= 15) {
  const lastMonth = new Date(now)
  lastMonth.setMonth(lastMonth.getMonth() - 1)
  curMonth = lastMonth.toISOString().substr(0, 7)
} else {
  curMonth = now.toISOString().substr(0, 7)
}

const minMonth = '2022-08'
const maxMonth = curMonth

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
let completedAll = []
let completedByMonth = []
export default {
  setup () {
    apiBase = inject('apiBase')
    dev = inject('dev')
  },
  components: {
    OfferCard,
    OfferCardDetail
  },
  data () {
    return {
      offer: null,
      cards: [],
      completed: [],
      stats: {},
      curMonth: curMonth,
      maxMonth: maxMonth,
      minMonth: minMonth,
      offsetCnt: 0,
      dev
    }
  },
  beforeMount () {
    this.loadData()
    // console.log('before mount')
  },
  mounted () {
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
          console.log('loaded data')
          cardsAll = resp[0].data.data.slice(0)
          if (dev) {
            cardsAll = cardsAll.map(setLocalImgs)
          }
          self.cards = cardsAll.filter(c => c.status === 'active')
          completedAll = cardsAll.filter(c => c.status === 'completed') // c => c.completedDt && c.completedDt.substr(0, 7) === curMonth)

          // if (dev) {
          //   // TEMP FOR TEST
          //   self.cards = self.cards.slice(0).concat(self.cards.slice(0)).concat(self.cards.slice(0)).concat(self.cards.slice(0))
          //   // self.completed = cardsAll.slice(0).map(c => { c.status = 'completed'; return c })
          //   completedAll = completedAll.concat(cardsAll.slice(0))
          // }

          self.stats = resp[1].data.data
          this.updateCompletedCards()
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
      const num = parseInt(isoDt.substr(5, 2), 10)
      const months = ['Январь', 'Февраль', 'Март', 'Апрель', 'Май', 'Июнь', 'Июль', 'Август', 'Сентябрь', 'Октябрь', 'Ноябрь', 'Декабрь']
      return months[num - 1]
    },
    getStatsMonthName: function (isoDt) {
      const num = parseInt(isoDt.substr(5, 2), 10)
      const months = ['января', 'февраля', 'марта', 'апреля', 'мая', 'июня', 'июля', 'августа', 'сентября', 'октября', 'ноября', 'декабря']
      return months[num - 1]
    },
    updateCompletedCards: function () {
      // console.log(this.curMonth)
      completedByMonth = completedAll
        .filter(c => c.completedDt && c.completedDt.substr(0, 7) === this.curMonth)

      this.completed = completedByMonth.slice(this.offsetCnt, this.offsetCnt + 3)
      this.stats.completed = completedByMonth.length
      const unique = {}
      completedByMonth.forEach(c => {
        if (!unique[c.company.name]) {
          unique[c.company.name] = c.company
          unique[c.company.name].cnt = 0
        } else {
          unique[c.company.name].cnt++
        }
      })

      const oftenHiredCompanies = Object.keys(unique).map(key => unique[key])
      oftenHiredCompanies.sort((a, b) => a.cnt > b.cnt ? -1 : 1)

      /*if (dev) {
        oftenHiredCompanies = oftenHiredCompanies.map(setLocalImgs)
      }*/
      this.stats.fastHireCompanies = oftenHiredCompanies.length
      this.stats.oftenHiredCompanies = oftenHiredCompanies.slice(0, 3)
    },
    // TEMP OFF
    // showCompletedByMonth: function (monthIso) {
    //   this.curMonth = monthIso
    //   this.updateCompletedCards()
    // },
    prevCompletedMonths: function () {
      this.curMonth = decMonth(this.curMonth)
      this.offsetCnt = 0
      this.updateCompletedCards()
    },
    nextCompletedMonths: function () {
      this.curMonth = incMonth(this.curMonth)
      this.offsetCnt = 0
      this.updateCompletedCards()
    },
    makeStep: function (direction, cnt) {
      let newOffsetCnt
      if (direction === 'left') {
        newOffsetCnt = this.offsetCnt - cnt
      } else if (direction === 'right') {
        newOffsetCnt = this.offsetCnt + cnt
      }

      if (newOffsetCnt > -1 && newOffsetCnt < completedByMonth.length - 2) {
        this.offsetCnt = newOffsetCnt
      }

      console.log(this.offsetCnt)
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
          <h1 class="start__heading" itemprop="name">
            One Day Offer
          </h1>
          <p class="start__text" itemprop="description">
            Все вакансии быстрого найма от лучших компаний страны
          </p>
          <div class="start__wrap-subscribe" v-if="dev">
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
        <OfferCard v-for="c in cards" v-bind="c" itemscope itemtype="https://schema.org/Offer" /> <!-- @click="offer = c" -->
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
        Статистика <span>{{getStatsMonthName(curMonth)}}</span>
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
          Уже завершены&nbsp;
          <small class="_icon-data-left" v-if="stats.completed > 3" @click="makeStep('left', 1)"></small>&nbsp;
          <small class="_icon-data-right" v-if="stats.completed > 3" @click="makeStep('right', 1)"></small>
        </h2>
        <ul class="completed__list-data">
          <li class="completed__left-button">
            <a class="completed__left _icon-data-left" @click="prevCompletedMonths"></a>
          </li>
          <li class="completed__wrap-month">
            <a class="completed__month">
              {{getMonthName(curMonth)}}
            </a>
          </li>
          <li class="completed__rigth-button">
            <a class="completed__rigth _icon-data-right" @click="nextCompletedMonths"></a>
          </li>
          <li v-for="y in stats.completedYears" class="completed__year">
            {{y.name}}
          </li>
        </ul>
      </div>
      <div class="completed__row">
        <OfferCard v-for="c in completed" v-bind="c" class="completed__column" itemscope itemtype="https://schema.org/Offer" />
      </div>
    </div>
  </section>
</template>
<style>
.completed__month__active {
  color: #151f2d !important;
}

._icon-data-left,
._icon-data-right {
  cursor: pointer;
}

</style>
