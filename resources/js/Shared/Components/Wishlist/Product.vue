<template>
    <!-- Start Single Cart Item -->
    <li class="single-cart-item">
        <Link :href="route('product.detail', product.id, false)" class="image"
            ><img class="img-wishlist" :src="product.image[0]" alt=""
        /></Link>

        <div class="content">
            <Link
                :href="route('product.detail', product.id, false)"
                class="title"
                >{{ product.name }}</Link
            >
            <div class="details">
                <Link :href="route('product.detail', product.id, false)">
                    <div class="left">
                        <span class="brand">{{ product.category_name }}</span>
                        <span class="price">{{
                            $filters.toIDR(product.price)
                        }}</span>
                    </div>
                </Link>
                <div class="right">
                    <button
                        v-if="inCart"
                        @click="redirectCart"
                        class="btn btn--default btn--radius btn--color-white btn--bg-pink-swan"
                    >
                        Check Cart
                    </button>
                    <button
                        v-else
                        @click="addToCart"
                        class="btn btn--default btn--radius btn--color-white btn--radical-red"
                    >
                        Add to cart
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
import { Inertia } from "@inertiajs/inertia";
import { useToast } from "vue-toastification";
import "swiper/css/pagination";
import "swiper/css";
import { ref } from "@vue/reactivity";
import { computed, inject, onMounted } from "@vue/runtime-core";

const toast = useToast();
let countQuantity = ref(1);
let option = [];
const inWishlist = ref(false);

// Menggunakan sweetalert dari fungsi global
const swal = inject("$swal");

// funcsi untuk memilih option dari product
const chooseOption = (size, options) => {
    let objectAdd = {
        key: size.id,
        keyName: size.name,
        value: options.id,
        valueName: options.name,
    };

    let index = option.findIndex(({ key }) => key == objectAdd.key);

    index == -1 ? option.push(objectAdd) : (option[index] = objectAdd);
};
// deklarasikan variable baru untuk penampungan cart dari localstorage
let currentCart = [];
let currentWishlist = [];

onMounted(() => {
    // mengambil data cart dari localstorage
    let cartLocal = localStorage.getItem("cart");
    currentCart =
        cartLocal != "undefined" && cartLocal != null
            ? JSON.parse(cartLocal)
            : [];
    inWishlist.value =
        currentWishlist.findIndex(({ id }) => id === props.product.id) != -1;
});

// Menghapus fitur proxy dari ES6 javascript
const unProxy = (value) => {
    return JSON.parse(JSON.stringify(value));
};

const addToCart = () => {
    let productAdd = unProxy(props.product);
    productAdd.option = unProxy(option);
    productAdd.choosenQuantity = unProxy(countQuantity.value);

    // Filter cart berdasarkan product yang akan ditambahkan, dengan
    let indexProductInCart = currentCart.filter(
        ({ id }) => id === productAdd.id
    );
    // Mengantisipasi jumlah order berlebihan dari stok yang tersedia
    let sumQtyInCart = 0;
    indexProductInCart.forEach((each) => {
        sumQtyInCart += each.choosenQuantity;
    });
    if (countQuantity.value > props.product.quantity - sumQtyInCart) {
        toast.warning(
            "Stok tidak tersedia, silakan kurangi kuantitas order produk ini di cart.",
            {
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
            }
        );
        return;
    }
    // Mendeklarasikan variable penampungan
    let dataFind = [];

    /*
        Pencarian product yang didalam cart dari localstorage dengan aturan
        - Tidak boleh ada barang yang sama dan memiliki option yang sama
    */

    // Melakukan perulangan setiap product yang sama dengan yang akan ditambahkan
    // dan menampung kedalam variable
    dataFind = indexProductInCart.map((eachCart, keyCart) => {
        // Melakukan perulangan setiap option pada setiap product didalam cart dari localstorage,
        // apakah memiliki kesamaan option dengan yang ditambahkkan atau tidak
        let eachProductOption = productAdd.option.map((eachProduct) => {
            // Melakukan perulangan setiap option dari product yang akan ditambahkan
            // dengan option product dari cart localstorage
            let optionCheck = eachCart.option.findIndex(({ key, value }) => {
                // perbandingan 1 per 1 key & value
                let coreCheck =
                    key == eachProduct.key && value == eachProduct.value;
                return coreCheck;
            });

            // Mengembalikan hasil perulangan pengecekan option
            return optionCheck;
        });

        // Membuat object untuk dikirim ke variable penampungan dengan ditambahkan keyCart agar mudah untuk mengidentifikasi
        let eachProductOptionCheck = {
            key: keyCart,
            data: eachProductOption,
        };
        return eachProductOptionCheck;
    });

    // mendefinisikan key untuk penambahan ke cart localstorage
    let key = undefined;

    console.log(dataFind);

    // melakukan perulangan dari hasil pengecekan
    for (var x = 0; x < dataFind.length; x++) {
        // apabila ada yang sama maka akan didefinisikan keynya
        var checkIndex = dataFind[x].data.filter((cow) => cow == -1).length;
        if (checkIndex === 0) {
            key = dataFind[0].key;
        }
    }

    // Memasukan data ke cart dengan 2 kondisi
    // 1 apabila key undefined alias tidak terdapat kesamaan opsi, maka akan ditambahkan sebagai element baru
    // 2 apabila ada kesamaan opsi maka akan direplace dengan yang baru
    key === undefined
        ? currentCart.push(unProxy(productAdd))
        : (currentCart[key] = productAdd);

    // Melakukan save ke local storage
    localStorage.setItem("cart", JSON.stringify(currentCart));

    toast.success("Produk berhasil ditambahkan ke keranjang!", {
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

    Inertia.get("/cart", {});
};

const optionChoosen = computed(() => {
    return props.product.size.length > option.length;
});

const props = defineProps({
    product: Object,
    currentCart: Array,
});

const inCart = ref(false);

const redirectCart = () => {
    Inertia.get("/cart", {});
};

onMounted(() => {
    inCart.value =
        props.currentCart.findIndex(({ id }) => id === props.product.id) != -1;
});
</script>
