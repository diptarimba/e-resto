<template>
<!-- Start Single Cart Item -->
<li class="single-cart-item">
    <div class="image">
        <img width="90" height="90" :src="product.picture" alt="image">
    </div>
    <div class="content">
        <button class="delete-item">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                <path d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8zm0 464c-118.7 0-216-96.1-216-216 0-118.7 96.1-216 216-216 118.7 0 216 96.1 216 216 0 118.7-96.1 216-216 216zm94.8-285.3L281.5 256l69.3 69.3c4.7 4.7 4.7 12.3 0 17l-8.5 8.5c-4.7 4.7-12.3 4.7-17 0L256 281.5l-69.3 69.3c-4.7 4.7-12.3 4.7-17 0l-8.5-8.5c-4.7-4.7-4.7-12.3 0-17l69.3-69.3-69.3-69.3c-4.7-4.7-4.7-12.3 0-17l8.5-8.5c4.7-4.7 12.3-4.7 17 0l69.3 69.3 69.3-69.3c4.7-4.7 12.3-4.7 17 0l8.5 8.5c4.6 4.7 4.6 12.3 0 17z" />
            </svg>
        </button>
        <a href="single-product.html" class="title">{{product.name}}</a>
        <div class="details">
            <div class="left">
                <span class="brand">Rebook</span>
                <span class="price">{{ $filters.toIDR(product.price) }}</span>
            </div>
            <div class="right">
                <div class="product-quantity">
                    <div class="num-block skin-2">
                        <div class="num-in">
                            <span class="minus dis"></span>
                            <label for="quan-1" class="visually-hidden"></label>
                            <input id="quan-1" type="text" class="in-num" value="1" readonly="">
                            <span class="plus"></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</li>
<!-- End Single Cart Item -->
</template>

<script setup>
defineProps({
    product: Object
})
</script>
