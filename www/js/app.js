let initData = {}

const App = {
  data () {
    return initData
  },
  methods: {
    getData: url => axios.get(url),
    prevCompletedMonths: () => {
      alert('Листаем влево')
    },
    nextCompletedMonths: () => {
      alert('Листаем вправо')
    }
  }
}

App.methods.getData('https://odo.local/server/cards.php')
  .then(resp => {
    // toastr.success('Карточки успешно получены')
    const cardsAll = resp.data.data

    const cards = cardsAll.filter(c => c.status === 'active')
    const completed = cardsAll.filter(c => c.status === 'completed')

    // const yandex1 = companies.find(c => c.id === 'Yandex1')
    const oftenHiredCompanies = [] // (new Array(3)).fill(yandex1)

    const completedMonths = [
      { name: 'Август', link: '#' },
      { name: 'Сентябрь', link: '#' },
      { name: 'Октябрь', link: '#' }
    ]

    const completedYears = [
      { name: '2022', link: '#' }
    ]

    initData = {
      cards,
      completed,
      stats: {
        completed: completed.length,
        fastHireCompanies: 4,
        oftenHiredCompanies,
        completedMonths,
        completedYears
      }
    }

    Vue.createApp(App).mount('#app')
  })
  .catch(err => {
    console.log(err)
    // toastr.error(err.message)
  })


