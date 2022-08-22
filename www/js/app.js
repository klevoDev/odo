var App = {
  data () {
    return {
      cards: [
        {
          name: 'Frontend Mobile 1',
          company: 'Яндекс',
          companySub: 'Маркет, B2B',
          companyLogo: './img/yandex.png',
          companyLogoAlt: 'Company logo providing one day offer.',
          stack: ['HTML', 'CSS', 'JS', 'React'],
          start: '25 августа с 10:00',
          finish: '27 августа до 23:00',
          finish2: 'Заявки принимаются до 18.08',
          link: 'https://yandex.ru/jobs/hiring-events?ysclid=l5i3xud1wf755747148'
        },
        {
          name: 'Frontend Mobile 2',
          company: 'Яндекс',
          companySub: 'Маркет, B2B',
          companyLogo: './img/yandex.png',
          companyLogoAlt: 'Company logo providing one day offer.',
          stack: ['HTML', 'CSS', 'JS', 'React'],
          start: '25 августа с 10:00',
          finish: '27 августа до 23:00',
          finish2: 'Заявки принимаются до 18.08',
          link: 'https://yandex.ru/jobs/hiring-events?ysclid=l5i3xud1wf755747148'
        },
        {
          name: 'Frontend Mobile 3',
          company: 'Яндекс',
          companySub: 'Маркет, B2B',
          companyLogo: './img/yandex.png',
          companyLogoAlt: 'Company logo providing one day offer.',
          stack: ['HTML', 'CSS', 'JS', 'React'],
          start: '25 августа с 10:00',
          finish: '27 августа до 23:00',
          finish2: 'Заявки принимаются до 18.08',
          link: 'https://yandex.ru/jobs/hiring-events?ysclid=l5i3xud1wf755747148'
        },
      ]
    }
  }
}
Vue.createApp(App).mount('#app')
