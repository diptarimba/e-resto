<template>
<div>
    <!-- ...:::Start Cart Section:::... -->

    <Head title="Wishlist" />
    <div class="cart-section section-gap-top-30">
        <div class="container">
            <div class="single-cart-item">
                <div class="content">
                    <span class="title">{{order.order_number}}</span>
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
            </div>
            <br>
            <div class="cart-items-wrapper">
                <ul class="cart-item-list">
                    <!-- Start Single Cart Item -->
                    <li class="single-cart-item" v-for="(each, key) in order.order_detail" :key="key">
                        <div class="image">
                            <img class="img-cart" :src="each.product.image[0]" alt="image">
                        </div>
                        <div class="content">
                            <Link :href="route('product.detail', each.product.id, false)" class="title">{{each.product.name}}</Link>
                            <div class="details">
                                <div class="left">
                                    <span class="brand">{{ each.product.category_name}}</span>
                                    <span class="price">{{ $filters.toIDR(each.product.price) }}</span>
                                    <br>
                                    <span>Opsi : </span>
                                    <ul>
                                        <li v-for="(eachOption, keyOption) in each.product_option" :key="keyOption"><span>- {{eachOption.name}}</span></li>
                                    </ul>
                                </div>
                                <div class="right">
                                    <div class="product-quantity">
                                        {{ each.quantity }}x
                                    </div>
                                </div>
                            </div>
                        </div>
                    </li>
                    <!-- End Single Cart Item -->
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
const props = defineProps({
    order: Object
})
</script>
