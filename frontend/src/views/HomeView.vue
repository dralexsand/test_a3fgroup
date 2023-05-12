<script setup>
import {onMounted, ref} from "vue";
import uiHr from "../components/ui/uiHr.vue";
import uiPosts from "../components/ui/uiPosts.vue";
import formInput from "../components/forms/formInput.vue"
import {usePostsStore} from "../stores/posts";
import myfaker from "../utils/use/faker";
import router from "../router";

const titlePage = ref('Posts')

const href = ref('')

const stateStore = usePostsStore()

const onInput = (item) => {
  console.log(item);
  href.value = item.content
}

onMounted(() => {
  init()
})

const init = () => {
  beforeProcess(1000)
  afterProcess(1000)
}
const generateFakerPosts = () => {
  let randomLength = myfaker.randomIntFromInterval(500, 700);
  stateStore.posts = myfaker.generate(randomLength);
}

const delay = ms => new Promise(res => setTimeout(res, ms));

const beforeProcess = async (ms) => {
  console.log('process init')
  await delay(ms);
  generateFakerPosts()
};

const afterProcess = async (ms) => {
  await delay(ms);
  console.log('process is complete')
};

const goToHref = (link = null) => {

  if (link === null) {
    link = '#' + href.value;
  } else {
    link = '#' + link;
  }

  let el = document.querySelector('[href="' + link + '"]');
  let topEl = el.offsetTop;

  scrollTo({
    top: topEl,
    behavior: 'smooth'
  })
}

</script>
<template>
    <div class="title_page">
        <h4>{{ titlePage }}</h4>
    </div>

    <button
            @click.prevent="goToHref(0)"
            class="my_btn m-4 !text-white bg-[#3b71ca] p-2 rounded-[0.27rem]">
        Первая
    </button>

    <button
            @click.prevent="goToHref(stateStore.posts.length-1)"
            class="my_btn m-4 !text-white bg-[#3b71ca] p-2 rounded-[0.27rem]">
        Последняя
    </button>

    <form-input
            name="goto"
            label="Go to"
            @handleInput="onInput"
    />

    <button
            @click.prevent="goToHref()"
            class="my_btn m-4 !text-white bg-[#3b71ca] p-2 rounded-[0.27rem]">
        Перейти
    </button>

    <button
            @click.prevent="goToHref(0)"
            class="my_btn my_btn_fixed m-4 !text-white bg-[#3b71ca] p-2 rounded-[0.27rem]">
        Первая
    </button>

    <ui-hr/>

    <ui-posts
            :posts="stateStore.posts"
    />

</template>

<style scoped>
.my_btn {
    width: 120px;
}

.my_btn_fixed {
    position: fixed;
    bottom: 20px;
    right: 20px;
}

</style>
