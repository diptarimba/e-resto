<template>
    <div>
        <!-- ...:::Start Cart Section:::... -->

        <Head title="Cart" />
        <div class="cart-section section-gap-top-30">
            <div class="container">
                <div v-if="currentCart.length > 0" class="cart-items-wrapper">
                    <ul class="cart-item-list">
                        <single-product
                            v-for="(each, key) in currentCart"
                            :key="key"
                            :product="each"
                            :current-cart="currentCart"
                            @update-cart="getCartLocal"
                        />
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
                                <li class="item">
                                    <span class="text-left">Total</span>
                                    <span class="total-price">{{
                                        $filters.toIDR(currenTotal)
                                    }}</span>
                                    <button
                                        @click="actionOrder"
                                        :disabled="orderCart.items.length <= 0"
                                        class="btn"
                                    >
                                        <span class="icon"
                                            ><i
                                                class="icon icon-carce-check-circle"
                                            ></i></span
                                        >Check out
                                    </button>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
                <div v-else class="cart-items-wrapper">
                    <p class="text-center text-secondary">
                        Anda belum menambahkan produk ke dalam cart.
                    </p>
                    <a href="/" class="btn_order mt-2"
                        ><i class="icon icon-carce-cart"></i>
                        <span class="ms-2">Order Sekarang</span>
                    </a>
                </div>
                <!-- <div v-if="$page.props.flash.message" class="alert">
                {{ $page.props.flash.message }}
            </div> -->
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
import SingleProduct from "../Shared/Components/Cart/Product.vue";
import { reactive, ref } from "@vue/reactivity";
import { onMounted } from "@vue/runtime-core";
import { Inertia } from "@inertiajs/inertia";
import { useForm } from "@inertiajs/inertia-vue3";

onMounted(() => {
    getCartLocal();
});

const currenTotal = ref(0);

let currentCart = ref([]); // Deklarasikan variable penampungan cart
const orderCart = useForm({
    total: 0,
    token: "",
    total_items: 0,
    items: [],
});

const getCartLocal = () => {
    // mengambil data token masing masing user
    let tokenLocal = localStorage.getItem("token");
    // mengambil data cart dari localstorage
    let cartLocal = localStorage.getItem("cart");
    currentCart.value =
        cartLocal != "undefined" && cartLocal != null
            ? JSON.parse(cartLocal)
            : [];

    currenTotal.value = 0;
    orderCart.total_items = 0;
    orderCart.items = [];
    currentCart.value.forEach((each) => {
        currenTotal.value += each.choosenQuantity * each.price;
        orderCart.total_items += each.choosenQuantity;
        orderCart.items.push({
            product_id: each.id,
            quantity: each.choosenQuantity,
            option: each.option.map((x) => x.value),
            note: "",
        });
    });
    orderCart.token = tokenLocal;
    orderCart.total = currenTotal.value;
};

const actionOrder = () => {
    orderCart.post("/order", {
        preserveScroll: true,
        onSuccess: () => {
            orderCart.reset();
            localStorage.setItem("cart", JSON.stringify([]));
            getCartLocal();
        },
    });
};
</script>

<style scoped>
.cart-items-wrapper {
    height: 80vh !important;
    display: flex;
    align-items: center;
    flex-direction: column;
    justify-content: center;
}
.btn_order {
    background-color: #ff375f;
    padding: 0.5rem 2rem;
    color: white;
    border: none;
    border-radius: 8px;
    font-weight: 500;
    font-size: 0.875rem;
}
</style>
