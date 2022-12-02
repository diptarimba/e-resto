<template>
<div>
    <div class="title-content">
        <h2 class="title">{{category.name}}</h2>
        <Link :href="route('category.expand', category.id, false)" class="view-all">View All</Link>
    </div>
    <div class="catagories-wrapper">
        <div class="catagories-wrapper-content">
            <product @update-wishlist-click="func.updateWishlist" v-for="product in category.product" :key="product.id" :product="product" :wishlistLocal="wishlist" />
        </div>
    </div>
</div>
</template>

<script setup>
import Product from "../Home/Product.vue"
const func = defineEmits([
    'updateWishlist'
])
defineProps({
    category: Object,
    wishlist: Array
})
</script>
