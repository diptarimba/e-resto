<template>
<div>
    <!-- ...:::Start Search & Filter Section:::... -->
    <Search v-model:search-text="searchText" v-model:slider-default="defaultValue" v-model:slider-max="maxValueSlider"/>
    <!-- ...:::End Search & Filter Section:::... -->

    <!-- ...:::Start Catagories - 1 Section:::... -->
    <div class="catagories-section section-gap-top-50">
        <div class="container">
            <div class="catagories-area">
                <div class="catagories-nav-1">
                    <CategoryLabel :categories="categories"/>
                </div>
            </div>

            <div class="catagories-wrapper catagories-shop-wrapper">

                <div class="catagories-wrapper-content">
                    <product @update-wishlist-click="getWishlistLocal" v-for="product in product.data" :key="product.id" :product="product" :wishlistLocal="currentWishlist" />
                </div>

                <button class="load-more-btn">load more</button>
            </div>
        </div>
    </div>
    <!-- ...:::Start Catagories - 1 Section:::... -->
</div>
</template>

<script>
import Homes from "../Shared/Layout/Homes.vue"
export default {
    layout: Homes
}
</script>
<script setup>
import { onMounted, ref, watch } from '@vue/runtime-core'
import CategoryLabel from "../Shared/Components/Home/CategoryLabel.vue"
import Product from "../Shared/Components/Home/Product.vue"
import Search from "../Shared/Components/Category/Search.vue"
import debounce from 'lodash/debounce'
import { Inertia } from '@inertiajs/inertia'
const props = defineProps({
    product: Object,
    categories: Object,
    filters: Object,
    maxPrice: Number,
    categoryId: String
})

// Memanggil fungsi saat mount
onMounted(() => {
    getWishlistLocal()
})

let maxValueSlider = props.maxPrice

// Mendefinisikan nilai default filter price slider ketika baru di reload dengan data yang dikirim dari controller
let defaultValue = ref([props.filters.min, props.filters.max])

// Mendefinisikan nilai default search box ketika baru di reload dengan data yang dikirim dari controller
let searchText = ref(props.filters.search)

// Deklarasikan variable penampungan wishlist
let currentWishlist = ref([]);

const getWishlistLocal = () => {
    // mengambil data wishlist dari localstorage
    let wishlistLocal = localStorage.getItem('wishlist');
    currentWishlist.value = wishlistLocal != 'undefined' && wishlistLocal != null ? JSON.parse(wishlistLocal) : []
}

// Melakukan query baru pencarian product ketika user menuliskan nama barang / memilih filter harga
watch([searchText, defaultValue], debounce(function ([newSearch, newDefaultValue],[oldSearch, oldDefaultValue]) {
    Inertia.get('/category/' + props.categoryId, {
        search: newSearch,
        min: newDefaultValue[0],
        max: newDefaultValue[1]
    }, {
        preserveState: true,
        replace: true
    })
}, 300));
</script>
