<template>
<div>
<!-- ...:::Start Cart Section:::... -->
<Head title="Wishlist" />
<div class="cart-section section-gap-top-30">
    <div class="container">
        <div class="cart-items-wrapper">
            <ul class="cart-item-list">
                <single-product v-for="(value, key) in currentWishlist" :key="key" :product="value"/>
            </ul>
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
import { onMounted, ref } from '@vue/runtime-core';


// Memanggil fungsi saat mount
onMounted(() => {
    getWishlistLocal()
})
// Deklarasikan variable penampungan
let currentWishlist = ref([]);

const getWishlistLocal = () => {
    // mengambil data wishlist dari localstorage
    let wishlistLocal = localStorage.getItem('wishlist');
    currentWishlist.value = wishlistLocal != 'undefined' && wishlistLocal != null ? JSON.parse(wishlistLocal) : []
}

let products = [
    {name: 'Halo 1', price: 20000, picture: 'https://via.placeholder.com/150/FF0000/FFFFFF?Text=Down.com'},
    {name: 'Halo 2', price: 18000, picture: 'https://via.placeholder.com/150/FF0000/FFFFFF?Text=Down.com'},
    {name: 'Halo 3', price: 20000, picture: 'https://via.placeholder.com/150/FF0000/FFFFFF?Text=Down.com'},
];
</script>
