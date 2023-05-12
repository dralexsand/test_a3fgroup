<script setup>

defineProps({
  posts: {}
})

</script>

<template>
  <!-- Container  -->
    <div class="container my-24 px-6 mx-auto">

        <!-- Section: Design Block -->
        <section class="mb-32 text-gray-800">

            <div v-if="posts.length !== 0">

                <div
                        v-for="(post, index) in posts"
                        class="flex flex-wrap mb-12 md:mb-0">

                    <div class="grow-0 shrink-0 basis-auto w-2/12">
                        <p class="font-semibold mb-3">
                            <a
                                    :href="'#' + index">
                                #{{ index }}
                            </a>
                        </p>
                    </div>

                    <div class="grow-0 shrink-0 basis-auto w-10/12 pl-4 md:pl-6">
                        <p>
                            <a
                                    :href="'#' + index">
                                {{ post }}
                            </a>
                        </p>
                    </div>

                </div>

            </div>

        </section>
        <!-- Section: Design Block -->

    </div>

</template>

<style scoped>

/*@media only screen and (max-width: 575px) {
    body {
        background-color: lightblue;
    }
}*/


</style>