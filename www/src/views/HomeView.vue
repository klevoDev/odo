<script setup>
  const getData = url => axios.get(url)
  const prevCompletedMonths = () => {
    alert('Листаем влево')
  }
  const nextCompletedMonths = () => {
    alert('Листаем вправо')
  }

  import { ref, onBeforeMount, reactive } from 'vue'
  let cards = reactive([{ company: {} }])
  let completed = reactive([{ company: {} }])
  let stats = reactive({
    completed: 100
  })

  // onBeforeMount(() => {
  const apiBase = 'https://onedayoffer.ru/api/'
  Promise.all([
    getData(`${apiBase}cards.php`),
    getData(`${apiBase}stats.php`)
  ])
  .then(resp => {
    // toastr.success('Карточки успешно получены')
    const cardsAll = resp[0].data.data
    stats = resp[1].data.data

    cards = cardsAll.filter(c => c.status === 'active')
    completed = cardsAll.filter(c => c.status === 'completed')
  })
  .catch(err => {
    console.log(err)
    // toastr.error(err.message)
  })
// })
</script>
<template>
  <section class="page__start start">
    <div class="container">
      <div class="start__row">
        <div class="start__body">
          <h2 class="start__subheading subheading">
            найди свой
          </h2>
          <h1 class="start__heading">
            One Day Offer
          </h1>
          <p class="start__text">
            Все вакансии быстрого найма от лучших компаний страны
          </p>
          <div class="start__wrap-subscribe">
            <a class="start__subscribe subscribe" href="#">
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
  <div class="page__tickets tickets">
    <div class="container">
      <div class="tickets__row">
        <div v-for="c in cards" class="tickets__column">
          <div class="tickets__item">
            <h3 class="tickets__title title">
              {{c.name}}
            </h3>
            <ul class="tickets__stack">
              <li v-for="s in c.stack" class="tickets__point">
                {{s}}
              </li>
            </ul>
            <ul class="tickets__data-list">
              <li class="tickets__data-point">
                {{c.start}}
              </li>
              <li class="tickets__data-point">
                {{c.finish}}
              </li>
              <li class="tickets__data-point">
                {{c.finish2}}
              </li>
            </ul>
            <ul class="tickets__company-info">
              <li class="tickets__wrap-logo">
                <img class="tickets__logo" :src="c.company.logo" :alt="c.company.logoAlt">
              </li>
              <li class="tickets__about-company">
                {{c.company.name}} <br>
                <span class="tickets__span-company">
                  {{c.company.sub}}
                </span>
              </li>
              <li class="tickets__wrap-button">
                <a class="tickets__button" :href="c.link" target="_blank">
                  Участвовать
                </a>
              </li>
            </ul>
          </div>
        </div>
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
  <section class="page__statistics statistics">
    <div class="container">
      <h2 class="statistics__subheading">
        Статистика августа
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
                <img class="statistics__company" :src="c.logo" :alt="c.logoAlt"><span class="statistics__span">{{c.name}}</span>
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
  <section class="page__completed completed">
    <div class="container">
      <div class="completed__row-data">
        <h2 class="completed__subheading">
          Уже завершены
        </h2>
        <ul class="completed__list-data">
          <li class="completed__left-button">
            <a class="completed__left _icon-data-left" @click="prevCompletedMonths"></a>
          </li>
          <li v-for="m in stats.completedMonths" class="completed__wrap-month">
            <a class="completed__month" :href="m.link">
              {{m.name}}
            </a>
          </li>
          <li class="completed__rigth-button" @click="nextCompletedMonths">
            <a class="completed__rigth _icon-data-right"></a>
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
                {{c.start}}
              </li>
              <li class="completed__data-point">
                {{c.finish}}
              </li>
              <li class="completed__data-point">
                {{c.finish2}}
              </li>
            </ul>
            <ul class="completed__company-info">
              <li class="completed__wrap-logo">
                <img class="completed__logo" :src="c.company.logo" :alt="c.company.logoAlt">
              </li>
              <li class="completed__about-company">
                {{c.company.name}} <br>
                <span class="completed__span-company">
                  {{c.company.sub}}
                </span>
              </li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>
