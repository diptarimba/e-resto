<template>
    <div>
        <Head :title="product.name ?? 'Product'" />
        <!-- ...:::Start Product Single Section:::... -->
        <div class="product-single-section section-gap-top-30">
            <div class="container">
                <div class="product-gallery-image">
                    <!-- Slider main container -->
                    <div class="swiper">
                        <!-- Additional required wrapper -->
                        <swiper
                            :modules="[Pagination]"
                            :pagination="{ clickable: true, hide: false }"
                            :speed="1500"
                            :slides-per-view="1"
                            :observer="true"
                            :observe-parents="true"
                            :space-between="5"
                            watch-slides-progress
                            :loop="true"
                        >
                            <swiper-slide>
                                <div class="product-gallery-single-item">
                                    <div class="image">
                                        <img
                                            class="img-fluid"
                                            width="276"
                                            height="172"
                                            src="/assets/images/product/single/product-gallery-single-1.png"
                                            alt=""
                                        />

                                        <div
                                            class="image-shape image-shape-1"
                                        ></div>
                                        <div
                                            class="image-shape image-shape-2"
                                        ></div>
                                    </div>
                                </div>
                            </swiper-slide>
                            <swiper-slide>
                                <div class="product-gallery-single-item">
                                    <div class="image">
                                        <img
                                            class="img-fluid"
                                            width="276"
                                            height="172"
                                            src="/assets/images/product/single/product-gallery-single-1.png"
                                            alt=""
                                        />

                                        <div
                                            class="image-shape image-shape-1"
                                        ></div>
                                        <div
                                            class="image-shape image-shape-2"
                                        ></div>
                                    </div>
                                </div>
                            </swiper-slide>
                            <swiper-slide>
                                <div class="product-gallery-single-item">
                                    <div class="image">
                                        <img
                                            class="img-fluid"
                                            width="276"
                                            height="172"
                                            src="/assets/images/product/single/product-gallery-single-1.png"
                                            alt=""
                                        />

                                        <div
                                            class="image-shape image-shape-1"
                                        ></div>
                                        <div
                                            class="image-shape image-shape-2"
                                        ></div>
                                    </div>
                                </div>
                            </swiper-slide>
                        </swiper>
                    </div>
                    <div class="product-tag">
                        <span class="tag-discountQuantity">Available</span>
                        <button
                            @click="modifyWishlist"
                            aria-label="Wishlist"
                            class="btn btn--size-33-33 btn--center btn--round btn--bg-white btn--box-shadow"
                            :class="{
                                'btn--color-pink-swan': !inWishlist,
                                ' btn--color-radical-red': inWishlist,
                            }"
                        >
                            <i class="icon icon-carce-heart"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="container px-0">
                <div class="product-gallery-details">
                    <span class="rating">Rating 4.0 of 5</span>
                    <h1 class="title">{{ product.name }}</h1>
                    <p class="text">{{ product.description }}</p>

                    <ul class="product-variable-lists">
                        <li
                            class="list-item"
                            v-for="(sizeValue, sizeKey) in product.size"
                            :key="sizeKey"
                        >
                            <div class="left">{{ sizeValue.name }}</div>
                            <div class="right">
                                <ul class="size-chart inner-child-item">
                                    <li
                                        v-for="(
                                            optionValue, optionKey
                                        ) in sizeValue.size_option"
                                        :key="optionKey"
                                    >
                                        <label :for="optionValue.id">
                                            <input
                                                type="radio"
                                                @click="
                                                    chooseOption(
                                                        sizeValue,
                                                        optionValue
                                                    )
                                                "
                                                :name="`size[${sizeValue.id}]`"
                                                :id="optionValue.id"
                                            />
                                            <span class="size-text">{{
                                                optionValue.name
                                            }}</span>
                                        </label>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <li class="list-item">
                            <div class="left">QTY</div>
                            <div class="right">
                                <div class="product-quantity">
                                    <div class="num-block skin-2">
                                        <div class="num-in">
                                            <span
                                                class="minus dis"
                                                @click="countQuantity--"
                                                :class="{
                                                    'disable-click':
                                                        countQuantity <= 1,
                                                }"
                                            ></span>
                                            <label
                                                for="quan-1"
                                                class="visually-hidden"
                                            ></label>
                                            <input
                                                id="quan-1"
                                                type="text"
                                                class="in-num"
                                                v-model="countQuantity"
                                                readonly=""
                                            />
                                            <span
                                                class="plus"
                                                @click="countQuantity++"
                                                :class="{
                                                    'disable-click':
                                                        countQuantity ==
                                                        product.quantity,
                                                }"
                                            ></span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>

                    <div class="price-n-cart">
                        <span class="price">{{
                            $filters.toIDR(product.price)
                        }}</span>
                        <button
                            class="btn cart"
                            :disabled="optionChoosen.value"
                            @click="addToCart"
                        >
                            <span class="icon"
                                ><i class="icon icon-carce-cart"></i></span
                            >Add to Cart
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <!-- ...:::End Product Single Section:::... -->
    </div>
</template>

<style>
.swiper-pagination {
    position: sticky !important;
}

.disable-click {
    pointer-events: none;
}
</style>

<script>
import _ from "lodash";
import Homes from "../Shared/Layout/Homes.vue";
export default {
    layout: Homes,
};
</script>
<script setup>
import { Pagination } from "swiper";
import { useToast } from "vue-toastification";
import "swiper/css/pagination";
import "swiper/css";
import { reactive, ref, toRaw } from "@vue/reactivity";
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
    getWishlistLocal();
    inWishlist.value =
        currentWishlist.findIndex(({ id }) => id === props.product.id) != -1;
});

const getWishlistLocal = () => {
    let localWishlist = localStorage.getItem("wishlist");
    currentWishlist =
        localWishlist != "undefined" && localWishlist != null
            ? JSON.parse(localWishlist)
            : [];
};

// Menghapus fitur proxy dari ES6 javascript
const unProxy = (value) => {
    return JSON.parse(JSON.stringify(value));
};

const modifyWishlist = () => {
    // deklarasikan product yang akan ditambahkan ke wishlist
    let productAdd = unProxy(props.product);

    // check apakah product yang akan di masukan terdapat pada wishlist di localstorage atau tidak
    let checkLocal = currentWishlist.findIndex(
        ({ id }) => id === productAdd.id
    );

    // membatasi penambahan product ke dalam wishlist apabila sudah terdapat 10 product
    if (currentWishlist.length >= 10 && checkLocal === -1) {
        swal({
            title: "Perhatian",
            icon: "warning",
            text: "Anda sudah melebihi batas wishlist maksimal, silahkan kurangi wishlist yang sudah ada terlebih dahulu.",
            confirmButtonColor: "#007AFF",
        });
        return;
    }

    // -1 bertanda product belum terdapat pada array of object wishlist di localstorage
    // apabila belum ada, maka akan dilakukan push, yakni menambah
    // apabila sudah ada, berarti menghapus dari wishlist
    checkLocal == -1
        ? currentWishlist.push(productAdd)
        : currentWishlist.splice(checkLocal, 1);

    // menyimpan data wishlist ke dalam local storage
    localStorage.setItem("wishlist", JSON.stringify(currentWishlist));

    // mengecek data pada wishlist local apakah sudah tersedia apa belum, untuk menginterpretasikan logo love merah dan hitam
    checkLocal = currentWishlist.findIndex(({ id }) => id === productAdd.id);
    inWishlist.value = checkLocal != -1;
    if (checkLocal != -1) {
        toast.success("Produk berhasil ditambahkan ke wishlist!", {
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
    } else if (checkLocal == -1) {
        toast.success("Produk berhasil dihapus dari wishlist.", {
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
    }
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
};

// Menerima data dari controller
let props = defineProps({
    product: Object,
});

const optionChoosen = computed(() => {
    return props.product.size.length > option.length;
});
</script>
