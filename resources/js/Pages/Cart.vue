<template>
<div>
    <!-- ...:::Start Cart Section:::... -->

    <Head title="Cart" />
    <div class="cart-section section-gap-top-30">
        <div class="container">
            <div class="cart-items-wrapper">
                <ul class="cart-item-list">
                    <single-product v-for="(each, key) in currentCart" :key="key" :product="each" :current-cart="currentCart" @update-cart="getCartLocal"/>
                </ul>

                <ul class="cart-info-list">
                    <!-- <li class="cart-info-single-list">
                    <ul class="cart-info-child">
                        <li class="item"><span class="text-left">Subtotal</span> <span class="text-right">$4000.00</span></li>
                    </ul>
                </li>
                <li class="cart-info-single-list">
                    <ul class="cart-info-child">
                        <li class="item"><span class="text-left">Shipping</span> <span class="text-right">$100.00</span></li>
                        <li class="item"><span class="text-left">Tax</span> <span class="text-right">$40.00</span></li>
                    </ul>
                </li> -->
                    <li class="cart-info-single-list">
                        <ul class="cart-info-child">
                            <li class="item"><span class="text-left">Total</span> <span class="total-price">{{ $filters.toIDR(currenTotal)}}</span>
                                <a href="checkout.html" class="btn"><span class="icon"><i class="icon icon-carce-check-circle"></i></span>Check out</a>

                            </li>
                        </ul>
                    </li>
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
import SingleProduct from '../Shared/Components/Cart/Product.vue'
import {
    ref
} from '@vue/reactivity';
import {
    onMounted
} from '@vue/runtime-core';

onMounted(() => {
    getCartLocal()
})

const currenTotal = ref(0)

let currentCart = ref([]); // Deklarasikan variable penampungan cart

const getCartLocal = () => {
    // mengambil data cart dari localstorage
    let cartLocal = localStorage.getItem('cart');
    currentCart.value = cartLocal != 'undefined' && cartLocal != null ? JSON.parse(cartLocal) : []

    currenTotal.value = 0
    currentCart.value.forEach(each => {
        currenTotal.value += each.choosenQuantity * each.price
    })
}
</script>
