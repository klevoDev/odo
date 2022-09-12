<script>
import { inject } from 'vue'
import axios from 'axios'
import toastr from 'toastr'

const isValidEmail = (email) => {
  return email.match(
    /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/
  )
}

let apiBase
export default {
  setup () {
    apiBase = inject('apiBase')
  },
  data () {
    return {
      topics: [
        'Frontend-разработчик',
        'Python-разработчик',
        'Java-разработчик',
        'Тестировщик ПО',
        'Android-разработчик',
        'iOS-разработчик',
        'Frontend',
        'Backend',
        'Android',
        'iOS',
        'ML',
        'QA'
      ],
      topicsSelected: {},
      email: ''
    }
  },
  methods: {
    toggleTopic: function (topic) {
      if (!this.topicsSelected[topic]) {
        this.topicsSelected[topic] = true
      } else {
        delete this.topicsSelected[topic]
      }
    },
    subscribe: function () {
      if (!Object.keys(this.topicsSelected).length) {
        toastr.warning('Выберите хотя бы одно направление!')
        return
      }
      const email = this.email
      if (!email) {
        toastr.warning('Введите email!')
        return
      }
      if (!isValidEmail(email)) {
        toastr.warning('Введите корректный email!')
        return
      }
      const formData = new FormData()
      formData.append('email', this.email)
      formData.append('position', this.$parent.positionLast)
      Object.keys(this.topicsSelected).forEach(t => {
        formData.append('topic[]', t)
      })
      axios({
        method: 'post',
        url: `${apiBase}subscribe.php`,
        data: formData,
        headers: { 'Content-Type': 'multipart/form-data' }
      })
        .then(resp => {
          toastr.success('Вы успешно подписаны!')
          this.close()
        })
    },
    close: function (event) {
      // if (!['INPUT', 'BUTTON'].includes(event.target.tagName)) {
      this.$parent.openSubscription('unknown', false)
      // }
    }
  }
}
</script>

<template>
  <section class="page__subscribe-pop subscribe-pop" @click.self="close">
    <div class="container">
      <div class="subscribe-pop__column">
        <div class="subscribe-pop__item">
          <div class="subscribe-pop__wrap-pop-img">
            <img class="subscribe-pop__pop-img" src="./../img/subscribe-pop.png" alt="A person writes a message.">
          </div>
          <div class="subscribe-pop__body">
            <h3 class="subscribe-pop__title">
              Подписка
            </h3>
            <p class="subscribe-pop__text">
              Пришлем уведомление на почту о новом оффере :)
            </p>
            <p class="subscribe-pop__topic">
              Какие события интересуют?
            </p>
            <ul class="subscribe-pop__list">
              <li class="subscribe-pop__point" v-for="t in topics" :class="{ selected: topicsSelected[t] }">
                <span @click.self="toggleTopic(t)">{{t}}</span>
              </li>
            </ul>
            <p class="subscribe-pop__topic">
              E-mail
            </p>
            <form class="subscribe-pop__form" action="#">
              <div class="subscribe-pop__wrap-input">
                <input class="subscribe-pop__input" type="text" placeholder="E-mail" name="email" v-model="email">
              </div>
            </form>
            <div class="subscribe-pop__wrap-buttons">
              <div class="subscribe-pop__write-telegram">
                <a class="subscribe-pop__link" href="#" @click="subscribe">
                  Подписаться
                </a>
              </div>
              <div class="subscribe-pop__close-button">
                <a href="#" @click="close">Закрыть</a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<style>
.subscribe-pop {
  position: fixed;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.7);
  z-index: 1;
}

.subscribe-pop__column {
  position: absolute;
  left: 50%;
  top: 50%;
  height: 500px;
  margin-top: -400px;
  width: 500px;
  margin-left: -250px;
}

.subscribe-pop__item {
  background-color: #fff;
  border-radius: 28px;
  max-width: 500px;
}

.subscribe-pop__pop-img {
  border-radius: 28px 28px 0 0;
  width: 100%;
  height: 100%;
  max-width: 500px;
  -o-object-fit: cover;
  object-fit: cover;
}

.subscribe-pop__body {
  padding: 24px 24px 40px 24px;
}

.subscribe-pop__title {
  font-weight: 700;
  font-size: 32px;
  line-height: 125%;
  color: #151f2d;
  margin-bottom: 8px;
}

.subscribe-pop__text {
  font-weight: 700;
  font-size: 16px;
  line-height: 150%;
  color: #6e85ab;
  margin-bottom: 32px;
}

.subscribe-pop__topic {
  font-weight: 400;
  font-size: 14px;
  line-height: 143%;
  color: #151f2d;
  margin-bottom: 8px;
}

.subscribe-pop__list {
  display: flex;
  flex-wrap: wrap;
  margin: 0 -4px;
  font-weight: 700;
  font-size: 16px;
  line-height: 150%;
  color: #38b5cf;
  margin-bottom: 24px;
}

.subscribe-pop__point {
  padding: 5px 13.5px;
  border: 1px solid #38b5cf;
  border-radius: 87.7854px;
  margin-left: 4px;
  margin-bottom: 4px;
  transition: all 0.3s ease 0s;
  cursor: pointer;
}

.subscribe-pop__point:hover, .subscribe-pop__point.selected {
  background-color: #c2edf7;
}

.subscribe-pop__wrap-input {
  max-width: 400px;
  height: 48px;
  margin-bottom: 32px;
}

.subscribe-pop__input {
  width: 100%;
  height: 100%;
  border: 1px solid rgba(26, 38, 55, 0.15);
  border-radius: 16px;
  padding: 0 20px;
  font-size: 14px;
  line-height: 143%;
  color: #151f2d;
  outline: none;
}

.subscribe-pop__wrap-buttons {
  display: flex;
}

.subscribe-pop__link {
  padding: 12px 20px;
  border: 1px solid #151f2d;
  border-radius: 16px;
  font-weight: 700;
  font-size: 14px;
  line-height: 143%;
  color: #151f2d;
}

.subscribe-pop__close-button {
  font-weight: 700;
  font-size: 14px;
  line-height: 143%;
  margin-left: 20px;
  color: #6e85ab;
}

@media (max-width: 424px) {
  .subscribe-pop__body {
    text-align: center;
    padding: 10px;
  }

  .subscribe-pop__text {
    font-size: 12px;
  }

  .subscribe-pop__wrap-buttons {
    display: flex;
    flex-direction: column;
  }

  .subscribe-pop__write-telegram {
    margin-bottom: 40px;
  }

  .subscribe-pop__close-button {
    margin-left: 0;
    margin-bottom: 30px;
  }
}

</style>
