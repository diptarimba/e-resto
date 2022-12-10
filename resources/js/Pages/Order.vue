<template>
<div>
<!-- ...:::Start Cart Section:::... -->
<Head title="Wishlist" />
<div class="cart-section section-gap-top-30">
    <div class="container">
        <!-- <div v-if="currentWishlist.length > 0" class="cart-items-wrapper">
            <ul class="cart-item-list">
                <single-product v-for="(value, key) in currentWishlist" :key="key" :product="value" :current-cart="currentCart"/>
            </ul>
        </div>
        <div v-else class="cart-items-wrapper">
            <div class="card-empty">Anda belum menambahkan produk kedalam wishlist</div>
        </div> -->
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
