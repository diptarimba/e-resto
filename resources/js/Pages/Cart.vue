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
                                    <span class="text-left">Pilih Meja</span>
                                    <select
                                        v-model="orderCart.table_id"
                                        class="select"
                                    >
                                        <option
                                            v-for="(
                                                table, index
                                            ) in props.table"
                                            :key="table.id"
                                            :value="table.id"
                                            :selected="index === 0"
                                        >
                                            {{ table.name }}
                                        </option>
                                    </select>
                                </li>
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
                <div v-else class="cart-items-wrapper empty_product">
                    <p class="text-center text-secondary">
                        Anda belum menambahkan produk ke dalam cart.
                    </p>
                    <a href="/" class="btn_order">Order Sekarang </a>
                </div>
                <!-- <div v-if="$page.props.flash.message" class="alert">
                {{ $page . props . flash . message }}
            </div> -->
            </div>
        </div>
        <!-- ...:::End Cart Section:::... -->
    </div>
</template>

<style scoped>
select {
    border: 1px solid #ced4da !important;
    padding: 0.375rem 1rem 0.375rem 0.5rem;
    border-radius: 0.375rem;
    line-height: 1.5;
    cursor: pointer;
    background-position: right 0.75rem center;
    background-size: 16px 12px;
}
</style>

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
import { useToast } from "vue-toastification";

onMounted(() => {
    getCartLocal();
});

// Table Id & Table Name untuk menentukan lokasi meja pelanggan
let props = defineProps({
    table: Object,
});

const currenTotal = ref(0);
const toast = useToast();

let currentCart = ref([]); // Deklarasikan variable penampungan cart
const orderCart = useForm({
    total: 0,
    token: "",
    total_items: 0,
    items: [],
    table_id: props.table.length > 0 ? props.table[0].id : 0,
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
            toast.success("Produk berhasil dicheckout!", {
                position: "top-center",
                timeout: 2000,
                closeOnClick: true,
                pauseOnFocusLoss: true,
                pauseOnHover: true,
                draggable: true,
                draggablePercent: 0.6,
                showCloseButtonOnHover: false,
                hideProgressBar: true,
                closeButton: false,
                icon: true,
                rtl: false,
            });

            getCartLocal();
        },
    });
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
    font-size: 0.875rem;
    margin-top: 0.5rem;
}
</style>
