<template>
<div class="title-content">
    <h2 class="title">{{category.name}}</h2>
    <a href="shop.html" class="view-all">View All</a>
</div>
<div class="catagories-wrapper">
    <div class="catagories-wrapper-content">
        <product v-for="product in category.product" :key="product.id" :product="product"/>
    </div>
</div>
</template>
<script>
import Product from "./Product.vue"
export default {
    components: {
        Product
    },
    props: {
        category: Object
    }
}
</script>
