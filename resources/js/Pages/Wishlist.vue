<template>
<div>
<!-- ...:::Start Cart Section:::... -->
<Head title="Wishlist" />
<div class="cart-section section-gap-top-30">
    <div class="container">
        <div class="cart-items-wrapper">
            <ul class="cart-item-list">
                <single-product v-for="(value, key) in products" :key="key" :product="value"/>
            </ul>
            <button class="load-more-btn">load more</button>
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
import SingleProduct from "../Shared/Components/Wishlist/Product.vue"
let products = [
    {name: 'Halo 1', price: 20000, picture: 'https://via.placeholder.com/150/FF0000/FFFFFF?Text=Down.com'},
    {name: 'Halo 2', price: 18000, picture: 'https://via.placeholder.com/150/FF0000/FFFFFF?Text=Down.com'},
    {name: 'Halo 3', price: 20000, picture: 'https://via.placeholder.com/150/FF0000/FFFFFF?Text=Down.com'},
];
</script>
