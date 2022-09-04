<script>
import { RouterLink } from 'vue-router'
import { inject } from 'vue'
import axios from 'axios'

const getData = url => axios.get(url)

let apiBase
export default {
  setup () {
    apiBase = inject('apiBase')
  },
  data () {
    return {
      articles: []
    }
  },
  beforeMount () {
    this.loadData()
  },
  methods: {
    loadData: function () {
      const self = this
      getData(`${apiBase}articles.php`)
        .then(resp => {
          // toastr.success('Карточки успешно получены')
          self.articles = resp.data.data
        })
        .catch(err => {
          console.log(err)
          // toastr.error(err.message)
        })
    }
  }
}
</script>

<template>
  <div class="page__blog blog" v-for="a in articles">
    <div class="container">
      <div class="blog__wrap-blog">
        <div class="blog__row">
          <div class="blog__wrap-image">
            <img class="blog__image" :src="a.image" :alt="a.imageAlt">
          </div>
          <div class="blog__body">
            <h2 class="blog__subheading subheading">
              {{ a.name }}
            </h2>
            <p class="blog__text">
              {{ a.description }}
            </p>
            <div class="blog__tag">
              <span v-for="t in a.tags" style="margin-right: 10px;">
                {{ t }}
              </span>
            </div>
            <div class="blog__wrap-more">
              <RouterLink class="blog__more" to="/blog-article">
                Читать полностью
              </RouterLink>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
