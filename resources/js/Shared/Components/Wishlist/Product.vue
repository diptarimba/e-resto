<template>
<!-- Start Single Cart Item -->
<li class="single-cart-item">
    <div class="image">
        <img class="img-wishlist" :src="product.image" alt="">
    </div>
    <div class="content">
        <Link :href="route('product.detail', product.id, false)" class="title">{{product.name}}</Link>
        <div class="details">
            <div class="left">
                <span class="brand">{{product.category_name}}</span>
                <span class="price">{{ $filters.toIDR(product.price) }}</span>
            </div>
            <div class="right">
                <button v-if="inCart" @click="redirectCart" class="btn btn--default btn--radius btn--color-white btn--bg-pink-swan">Check Cart</button>
                <button v-else @click="redirectProduct" class="btn btn--default btn--radius btn--color-white btn--radical-red">Add to cart</button>
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
import { Inertia } from "@inertiajs/inertia"
import { ref } from "@vue/reactivity"
import { onMounted, onUpdated } from "@vue/runtime-core"

const props = defineProps({
    product: Object,
    currentCart: Array
})

const inCart = ref(false)

const redirectProduct = () => {
    Inertia.get('/product/' + props.product.id, {})
}

const redirectCart = () => {
    Inertia.get('/cart', {})
}

onMounted(() => {
    inCart.value = props.currentCart.findIndex(({id}) => id === props.product.id) != -1
})

</script>
