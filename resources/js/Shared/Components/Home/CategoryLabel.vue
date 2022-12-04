<template>
<swiper slides-per-view="auto" :space-between="12">
    <swiper-slide v-for="eachCateory in categories" :key="eachCateory.id">
        <Link :href="route('category.expand', eachCateory.id, false)" class="btn"><span class="icon"><img width="33" height="33" src="/assets/images/catagories/sneakers.png" alt="image"></span> {{eachCateory.name}}</Link>
    </swiper-slide>
</swiper>
</template>
<script setup>
import 'swiper/css';
defineProps({
    categories: Object
})
</script>
