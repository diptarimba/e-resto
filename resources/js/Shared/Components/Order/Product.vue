<template>
<!-- Start Single Cart Item -->
<li class="single-cart-item">
    <div class="image">
        <img class="img-order" src="/assets/images/product/small/product-1-small-2.png" alt="">
    </div>
    <div class="content">
        <Link :href="route('order.detail', order.id, false)" class="title">{{order.order_number}}</Link>
        <div class="details">
            <div class="left">
                <span class="brand">{{order.name ?? 'Pelanggan'}}</span>
                <span class="price">{{ $filters.toIDR(order.pay_amount) }}</span>
            </div>
            <div class="right">
                <p><span class="icon"><i class="icon icon-carce-check-circle"></i></span> {{order.status}}</p>
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

.img-order {
    height: auto !important;
    width: 100% !important;
    position: absolute !important;
}
</style>

<script setup>
const props = defineProps({
    order: Object,
})
</script>
