<template>
    <div>
        <!-- ...:::Start Cart Section:::... -->
        <Head title="Wishlist" />
        <div class="cart-section section-gap-top-30">
            <div class="container">
                <div
                    v-if="currentWishlist.length > 0"
                    class="cart-items-wrapper"
                >
                    <ul class="cart-item-list">
                        <single-product
                            v-for="(value, key) in currentWishlist"
                            :key="key"
                            :product="value"
                            :current-cart="currentCart"
                        />
                    </ul>
                </div>
                <div v-else class="cart-items-wrapper empty_product">
                    <p class="text-center text-secondary">
                        Anda belum menambahkan produk ke dalam wishlist.
                    </p>
                    <a href="/" class="btn_order">Tambahkan Produk</a>
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
import SingleProduct from "../Shared/Components/Wishlist/Product.vue";
import { onMounted, ref } from "@vue/runtime-core";

// Memanggil fungsi saat mount
onMounted(() => {
    getWishlistLocal();
    getCartLocal();
});

let currentWishlist = ref([]); // Deklarasikan variable penampungan wishlist
let currentCart = ref([]); // Deklarasikan variable penampungan cart

const getWishlistLocal = () => {
    // mengambil data wishlist dari localstorage
    let wishlistLocal = localStorage.getItem("wishlist");
    currentWishlist.value =
        wishlistLocal != "undefined" && wishlistLocal != null
            ? JSON.parse(wishlistLocal)
            : [];
};

const getCartLocal = () => {
    // mengambil data cart dari localstorage
    let cartLocal = localStorage.getItem("cart");
    currentCart.value =
        cartLocal != "undefined" && cartLocal != null
            ? JSON.parse(cartLocal)
            : [];
};
</script>

<style scoped>
.empty_product {
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
.cart-items-wrapper i {
    font-size: 0.75rem;
}
</style>
