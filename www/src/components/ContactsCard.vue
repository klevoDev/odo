<script setup>
const close = () => {
  window.location.href = '/' // fast trick
}
</script>

<template>
  <section class="page__contact-pop contact-pop">
    <div class="container">
      <div class="contact-pop__column">
        <div class="contact-pop__item">
          <div class="contact-pop__wrap-pop-img">
            <img class="contact-pop__pop-img" src="./../img/contact-background.jpg" alt="A person writes a message.">
          </div>
          <div class="contact-pop__body">
            <h3 class="contact-pop__title">
              Контакты
            </h3>
            <p class="contact-pop__text">
              Пишите с идеями и предложениями :)
            </p>
            <p class="contact-pop__topic">
              E-mail
            </p>
            <p class="contact-pop__email">
              info@onedayoffer.ru
            </p>
            <div class="contact-pop__wrap-buttons">
              <div class="contact-pop__write-telegram">
                <a class="contact-pop__link" href="https://tlgg.ru/@klevooooo" target="_blank">
                  Написать в телеграм
                </a>
              </div>
              <div class="contact-pop__close-button">
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
  .contact-pop__item {
  background-color: #fff;
  border-radius: 28px;
}
.contact-pop__pop-img {
  border-radius: 28px 28px 0 0;
  width: 100%;
  height: 100%;
  -o-object-fit: cover;
     object-fit: cover;
}
.contact-pop__body {
  padding: 24px 24px 40px 24px;
}
.contact-pop__title {
  font-weight: 700;
  font-size: 32px;
  line-height: 125%;
  color: #151f2d;
  margin-bottom: 8px;
}
.contact-pop__text {
  font-weight: 700;
  font-size: 16px;
  line-height: 150%;
  color: #6e85ab;
  margin-bottom: 32px;
}
.contact-pop__topic {
  font-weight: 700;
  font-size: 16px;
  line-height: 150%;
  color: #6e85ab;
  margin-bottom: 8px;
}
.contact-pop__email {
  font-size: 18px;
  line-height: 156%;
  color: #151f2d;
  margin-bottom: 32px;
}
.contact-pop__wrap-buttons {
  display: flex;
}
.contact-pop__link {
  padding: 12px 20px;
  border: 1px solid #151f2d;
  border-radius: 16px;
  font-weight: 700;
  font-size: 14px;
  line-height: 143%;
  color: #151f2d;
}
.contact-pop__close-button {
  font-weight: 700;
  font-size: 14px;
  line-height: 143%;
  margin-left: 20px;
  color: #6e85ab;
}

@media (max-width: 424px) {
  .contact-pop__body {
    text-align: center;
    padding: 10px;
  }
  .contact-pop__text {
    font-size: 12px;
  }
  .contact-pop__wrap-buttons {
    display: flex;
    flex-direction: column;
  }
  .contact-pop__write-telegram {
    margin-bottom: 40px;
  }
  .contact-pop__close-button {
    margin-left: 0;
    margin-bottom: 30px;
  }
}
</style>