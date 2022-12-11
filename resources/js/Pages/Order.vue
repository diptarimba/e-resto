<template>
<div>
<!-- ...:::Start Cart Section:::... -->
<Head title="Wishlist" />
<div class="cart-section section-gap-top-30">
    <div class="container">
        <div v-if="order.length > 0" class="cart-items-wrapper">
            <ul class="cart-item-list">
                <single-product v-for="(value, key) in order" :key="key" :order="value"/>
            </ul>
        </div>
        <div v-else class="cart-items-wrapper">
            <div class="card-empty">Anda belum memiliki daftar riwayat pesanan, silahkan lakukan pesanan terlebih dahulu</div>
        </div>
    </div>
</div>
<!-- ...:::End Cart Section:::... -->
</div>
</template>

<script>
import Homes from "../Shared/Layout/Homes.vue"
export default {
    layout: Homes
}
</script>
<script setup>
import SingleProduct from "../Shared/Components/Order/Product.vue"
const props = defineProps({
    order: Object
})
</script>
