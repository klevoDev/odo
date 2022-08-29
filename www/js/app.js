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

const apiBase = 'https://xn--80aaadulecob1bpnyg.xn--p1ai/odo/api/'
Promise.all([
  App.methods.getData(`${apiBase}cards.php`),
  App.methods.getData(`${apiBase}stats.php`)
])
  .then(resp => {
    // toastr.success('Карточки успешно получены')
    const cardsAll = resp[0].data.data
    const stats = resp[1].data.data

    const cards = cardsAll.filter(c => c.status === 'active')
    const completed = cardsAll.filter(c => c.status === 'completed')

    initData = {
      cards,
      completed,
      stats: stats
    }

    Vue.createApp(App).mount('#app')
  })
  .catch(err => {
    console.log(err)
    // toastr.error(err.message)
  })
