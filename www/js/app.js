var App = {
  data () {
    const companies = [
      {
        id: 'Yandex1',
        name: 'Яндекс',
        sub: 'Маркет, B2B',
        logo: './img/yandex.png',
        logoAlt: 'Company logo providing one day offer.'
      }
    ]

    const cardsAll = [
      {
        name: 'Frontend Mobile 1',
        company: companies.find(c => c.id === 'Yandex1'),
        stack: ['HTML', 'CSS', 'JS', 'React'],
        status: 'active',
        start: '25 августа с 10:00',
        finish: '27 августа до 23:00',
        finish2: 'Заявки принимаются до 18.08',
        link: 'https://yandex.ru/jobs/hiring-events?ysclid=l5i3xud1wf755747148'
      },
      {
        name: 'Frontend Mobile 2',
        company: companies.find(c => c.id === 'Yandex1'),
        stack: ['HTML', 'CSS', 'JS', 'React'],
        status: 'active',
        start: '25 августа с 10:00',
        finish: '27 августа до 23:00',
        finish2: 'Заявки принимаются до 18.08',
        link: 'https://yandex.ru/jobs/hiring-events?ysclid=l5i3xud1wf755747148'
      },
      {
        name: 'Frontend Mobile 3',
        company: companies.find(c => c.id === 'Yandex1'),
        stack: ['HTML', 'CSS', 'JS', 'React'],
        status: 'active',
        start: '25 августа с 10:00',
        finish: '27 августа до 23:00',
        finish2: 'Заявки принимаются до 18.08',
        link: 'https://yandex.ru/jobs/hiring-events?ysclid=l5i3xud1wf755747148'
      },
      {
        name: 'Frontend Mobile 01',
        company: companies.find(c => c.id === 'Yandex1'),
        companySub: 'Маркет, B2B',
        companyLogo: './img/yandex.png',
        companyLogoAlt: 'Company logo providing one day offer.',
        stack: ['HTML', 'CSS', 'JS', 'React'],
        status: 'completed',
        start: '25 августа с 10:00',
        finish: '27 августа до 23:00',
        finish2: 'Заявки принимаются до 18.08',
        link: 'https://yandex.ru/jobs/hiring-events?ysclid=l5i3xud1wf755747148'
      },
      {
        name: 'Frontend Mobile 02',
        company: companies.find(c => c.id === 'Yandex1'),
        companySub: 'Маркет, B2B',
        companyLogo: './img/yandex.png',
        companyLogoAlt: 'Company logo providing one day offer.',
        stack: ['HTML', 'CSS', 'JS', 'React'],
        status: 'dismissed',
        start: '25 августа с 10:00',
        finish: '27 августа до 23:00',
        finish2: 'Заявки принимаются до 18.08',
        link: 'https://yandex.ru/jobs/hiring-events?ysclid=l5i3xud1wf755747148'
      }
    ]
    const cards = cardsAll.filter(c => c.status === 'active')
    const completed = cardsAll.filter(c => c.status === 'completed')

    const yandex1 = companies.find(c => c.id === 'Yandex1')
    const oftenHiredCompanies = (new Array(3)).fill(yandex1)

    return {
      cards,
      completed,
      stats: {
        completed: completed.length,
        fastHireCompanies: 4,
        oftenHiredCompanies
      }
    }
  }
}
Vue.createApp(App).mount('#app')
