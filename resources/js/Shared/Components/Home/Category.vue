<template>
<div class="title-content">
    <h2 class="title">{{category.name}}</h2>
    <Link :href="route('category.expand', category.id, false)" class="view-all">View All</Link>
</div>
<div class="catagories-wrapper">
    <div class="catagories-wrapper-content">
        <product v-for="product in category.product" :key="product.id" :product="product"/>
    </div>
</div>
</template>
<script setup>
import Product from "../Home/Product.vue"
defineProps({
    category: Object
})
</script>
