<template>
    <div>
        <!-- ...:::Start Cart Section:::... -->
        <Head title="Wishlist" />
        <div class="cart-section section-gap-top-30">
            <div class="container">
                <div v-if="order.length > 0" class="cart-items-wrapper">
                    <ul class="cart-item-list">
                        <single-product
                            v-for="(value, key) in order"
                            :key="key"
                            :order="value"
                        />
                    </ul>
                </div>
                <div v-else class="cart-items-wrapper">
                    <p class="text-center text-secondary">
                        Anda belum memiliki daftar riwayat pesanan.
                    </p>
                    <a href="/" class="btn_order">Order Sekarang </a>
                </div>
            </div>
        </div>
        <!-- ...:::End Cart Section:::... -->
    </div>
</template>

<script>
import Homes from "../Shared/Layout/Homes.vue";
export default {
    layout: Homes,
};
</script>
<script setup>
import SingleProduct from "../Shared/Components/Order/Product.vue";
const props = defineProps({
    order: Object,
});
</script>

<style scoped>
.cart-items-wrapper {
    height: 80vh !important;
    display: flex;
    align-items: center;
    flex-direction: column;
    justify-content: center;
    color: gray;
}
.btn_order {
    background-color: #ff375f;
    padding: 0.5rem 2rem;
    color: white;
    border: none;
    border-radius: 8px;
    font-weight: 500;
    margin-top: 0.5rem;
    font-size: 0.875rem;
}
</style>
