<template>
    <!-- Start Product Single Item -->
        <div class="single-product-item product-item--style-1" :class="'product-item--bg-' + bgColour">
            <a href="single-product.html" class="image">
                <img width="127" height="98" class="img-fluid" :src="product.image" alt="image">
            </a>
            <div class="content">
                <div class="content--left">
                    <ul class="review-star">
                        <li class="items fill"><i class="icon icon-carce-star-full"></i></li>
                        <li class="items fill"><i class="icon icon-carce-star-full"></i></li>
                        <li class="items fill"><i class="icon icon-carce-star-full"></i></li>
                        <li class="items fill"><i class="icon icon-carce-star-full"></i></li>
                        <li class="items fill"><i class="icon icon-carce-star-full"></i></li>
                    </ul>
                    <a href="single-product.html" class="title">{{product.name}}</a>
                    <span class="price">{{ $filters.toIDR(product.price) }}</span>
                </div>
                <div class="content--right">
                    <a href="wishlist.html" aria-label="Wishlist" class="btn btn--size-33-33 btn--center btn--round btn--color-pink-swan btn--bg-white btn--box-shadow"><i class="icon icon-carce-heart"></i></a>
                </div>
            </div>
        </div>
        <!-- ENd Product Single Item -->
</template>
<script>
export default {
    props: {
        product: Object
    },
    data(){
        return {
            bgColourSource: ['lime-green', 'red-orange', 'gold', 'maya-blue']
        }
    },
    computed: {
        bgColour(){
            let picked = Math.floor(Math.random() * this.bgColourSource.length)
            return this.bgColourSource[picked]
        }
    }
}

</script>
