<template>
<!-- Start Single Cart Item -->
<li class="single-cart-item">
    <div class="image">
        <img class="img-wishlist" :src="product.image" alt="">
    </div>
    <div class="content">
        <a href="single-product.html" class="title">{{product.name}}</a>
        <div class="details">
            <div class="left">
                <span class="brand">{{product.category_name}}</span>
                <span class="price">{{ $filters.toIDR(product.price) }}</span>
            </div>
            <div class="right">
                <button v-if="inCart" class="btn btn--default btn--radius btn--color-white btn--bg-pink-swan">Check Cart</button>
                <button v-else class="btn btn--default btn--radius btn--color-white btn--radical-red">Add to cart</button>
            </div>
        </div>
    </div>
</li>
<!-- End Single Cart Item -->
</template>

<style>
.image {
    display: flex !important;
    align-items: center !important;
}

.img-wishlist {
    height: auto !important;
    width: 100% !important;
    position: absolute !important;
}
</style>

<script setup>
import { ref } from "@vue/reactivity"
import { onMounted, onUpdated } from "@vue/runtime-core"

const props = defineProps({
    product: Object,
    currentCart: Array
})

const inCart = ref(false)

onMounted(() => {
    inCart.value = props.currentCart.findIndex(({id}) => id === props.product.id) != -1
})
</script>
