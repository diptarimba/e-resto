<template>
<!-- Start Single Cart Item -->
<li class="single-cart-item">
    <div class="image">
        <img width="90" height="90" :src="product.picture" alt="">
    </div>
    <div class="content">
        <a href="single-product.html" class="title">{{product.name}}</a>
        <div class="details">
            <div class="left">
                <span class="brand">Rebook</span>
                <span class="price">{{ $filters.toIDR(product.price) }}</span>
            </div>
            <div class="right">
                <a href="cart.html" class="btn btn--default btn--radius btn--color-white btn--radical-red">Add to cart</a>
            </div>
        </div>
    </div>
</li>
<!-- End Single Cart Item -->
</template>
<script setup>
const props = defineProps({
    product: Object,
})
console.log(props.product)

</script>
