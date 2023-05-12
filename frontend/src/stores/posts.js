import {ref, computed} from 'vue'
import {defineStore} from 'pinia'

export const usePostsStore = defineStore('postsStore', () => {
  const posts = ref([])
  
  const getPosts = computed(() => posts.value)
  
  return {posts, getPosts}
})