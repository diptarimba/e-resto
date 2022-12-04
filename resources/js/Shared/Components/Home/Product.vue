<template>
<div class="single-product-item product-item--style-1" :class="'product-item--bg-' + bgColour">
    <Link :href="route('product.detail', product.id, false)" class="image">
    <img width="127" height="98" class="img-fluid" :src="product.image" alt="image">
    </Link>
    <div class="content">
        <div class="content--left">
            <ul class="review-star">
                <li class="items fill"><i class="icon icon-carce-star-full"></i></li>
                <li class="items fill"><i class="icon icon-carce-star-full"></i></li>
                <li class="items fill"><i class="icon icon-carce-star-full"></i></li>
                <li class="items fill"><i class="icon icon-carce-star-full"></i></li>
                <li class="items fill"><i class="icon icon-carce-star-full"></i></li>
            </ul>
            <Link :href="route('product.detail', product.id, false)" class="title">{{product.name}}</Link>
            <span class="price">{{ $filters.toIDR(product.price) }}</span>
        </div>
        <div class="content--right">
            <button @click="modifyWishlist" aria-label="Wishlist" class="btn btn--size-33-33 btn--center btn--round btn--bg-white btn--box-shadow" :class="{ 'btn--color-pink-swan' : !inWishlist, ' btn--color-radical-red' : inWishlist }"><i class="icon icon-carce-heart"></i></button>
        </div>
    </div>
</div>
</template>

<script setup>
import {
    computed,
    defineProps,
    inject,
    onMounted,
    onUpdated,
    reactive,
    ref,
    watch
} from '@vue/runtime-core'
const emit = defineEmits([
    'updateWishlistClick'
])
const props = defineProps({
    product: Object,
    wishlistLocal: Array
})

// Menghapus fitur proxy dari ES6 javascript
const unProxy = (value) => {
    return JSON.parse(JSON.stringify(value))
}

// Menggunakan sweetalert dari fungsi global
const swal = inject("$swal")

const inWishlist = ref(false)

onUpdated(() => {
    inWishlist.value = props.wishlistLocal.findIndex(({id}) => id === props.product.id) != -1
})

const modifyWishlist = () => {

    // deklarasikan product yang akan ditambahkan ke wishlist
    let productAdd = unProxy(props.product)

    // deklarasikan wishlist ke variable baru yang terdapat pada localstorage
    let currentWishlist = props.wishlistLocal;

    // check apakah product yang akan di masukan terdapat pada wishlist di localstorage atau tidak
    let checkLocal = currentWishlist.findIndex(({id}) => id === productAdd.id)

    // membatasi penambahan product ke dalam wishlist apabila sudah terdapat 10 product
    if(currentWishlist.length >= 10 && checkLocal === -1 ) {
        swal({
            title: 'Perhatian',
            icon: 'warning',
            text: 'Anda sudah melebihi batas wishlist maksimal, silahkan kurangi wishlist yang sudah ada terlebih dahulu.',
            confirmButtonColor: '#007AFF'
        });
        return
    }

    // -1 bertanda product belum terdapat pada array of object wishlist di localstorage
    // apabila belum ada, maka akan dilakukan push, yakni menambah
    // apabila sudah ada, berarti menghapus dari wishlist
    checkLocal == -1 ? currentWishlist.push(productAdd) : currentWishlist.splice(checkLocal, 1);

    // menyimpan data wishlist ke dalam local storage
    localStorage.setItem('wishlist', JSON.stringify(currentWishlist))

    // melakukan update data dari localstorage dari parent
    emit('updateWishlistClick')

    // mengecek data pada wishlist local apakah sudah tersedia apa belum, untuk menginterpretasikan logo love merah dan hitam
    checkLocal = currentWishlist.findIndex(({id}) => id === productAdd.id)
    inWishlist.value =  checkLocal != -1
}

const bgColourSource = ['lime-green', 'red-orange', 'gold', 'maya-blue']

const bgColour = computed(() => {
    let picked = Math.floor(Math.random() * bgColourSource.length)
    return bgColourSource[picked]
})

</script>
