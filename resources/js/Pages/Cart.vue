<template>
<div>
<!-- ...:::Start Cart Section:::... -->
<Head title="Cart" />
<div class="cart-section section-gap-top-30">
    <div class="container">
        <div class="cart-items-wrapper">
            <ul class="cart-item-list">
                <single-product v-for="(each, key) in products" :key="key" :product="each"/>
            </ul>

            <ul class="cart-info-list">
                <li class="cart-info-single-list">
                    <ul class="cart-info-child">
                        <li class="item"><span class="text-left">Subtotal</span> <span class="text-right">$4000.00</span></li>
                    </ul>
                </li>
                <li class="cart-info-single-list">
                    <ul class="cart-info-child">
                        <li class="item"><span class="text-left">Shipping</span> <span class="text-right">$100.00</span></li>
                        <li class="item"><span class="text-left">Tax</span> <span class="text-right">$40.00</span></li>
                    </ul>
                </li>
                <li class="cart-info-single-list">
                    <ul class="cart-info-child">
                        <li class="item"><span class="text-left">Grand Total</span> <span class="total-price">$4140.00</span>
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
let products = [
    {name: 'Halo 1', price: 20000, picture: 'https://via.placeholder.com/150/FF0000/FFFFFF?Text=Down.com'},
    {name: 'Halo 2', price: 18000, picture: 'https://via.placeholder.com/150/FF0000/FFFFFF?Text=Down.com'},
    {name: 'Halo 3', price: 20000, picture: 'https://via.placeholder.com/150/FF0000/FFFFFF?Text=Down.com'},
];
</script>
