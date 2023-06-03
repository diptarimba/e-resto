<template>
    <!-- Start Single Cart Item -->
    <li class="single-cart-item">
        <Link :href="route('product.detail', product.id, false)" class="image"><img class="img-wishlist"
            :src="product.image[0]" alt="" /></Link>

        <div class="content">
            <Link :href="route('product.detail', product.id, false)" class="title">{{ product . name }}</Link>
            <div class="details">
                <Link :href="route('product.detail', product.id, false)">
                <div class="left">
                    <span class="brand">{{ product . category_name }}</span>
                    <span class="price">{{ $filters . toIDR(product . price) }}</span>
                </div>
                </Link>
                <div class="right">
                    <button v-if="inCart" @click="redirectCart"
                        class="btn btn--default btn--radius btn--color-white btn--bg-pink-swan">
                        Check Cart
                    </button>
                    <button v-else @click="redirectProduct"
                        class="btn btn--default btn--radius btn--color-white btn--radical-red">
                        Check to Product
                    </button>
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

    .img-wishlist {
        height: auto !important;
        width: 100% !important;
        position: absolute !important;
    }

    .title {
        text-transform: capitalize;
    }

    .left {
        width: 100% !important;
    }
</style>

<script setup>
    import {
        Inertia
    } from "@inertiajs/inertia";
    import {
        useToast
    } from "vue-toastification";
    import "swiper/css/pagination";
    import "swiper/css";
    import {
        ref
    } from "@vue/reactivity";
    import {
        computed,
        inject,
        onMounted
    } from "@vue/runtime-core";

    const toast = useToast();
    const inWishlist = ref(false);

    const inCart = ref(false);
    const props = defineProps({
        product: Object,
        currentCart: Array,
    });

    const redirectCart = () => {
        Inertia.get("/cart", {});
    };

    const redirectProduct = () => {
        Inertia.get('/product/' + props.product.id, {})
    }

    onMounted(() => {
        inCart.value =
            props.currentCart.findIndex(({
                id
            }) => id === props.product.id) != -1;
    });
</script>
