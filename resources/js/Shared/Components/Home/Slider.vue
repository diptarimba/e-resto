<template>
    <div class="hero-section section-gap-top-25">
        <div class="container">
            <!-- Start Hero Area -->
            <div class="hero-area hero-area--style-1 hero-slider-active">
                <swiper :modules="[Pagination]" :pagination="{ clickable: true, hide: false }" :speed="1500" :slides-per-view="1" :observer="true" :observe-parents="true" :space-between="5" watch-slides-progress :loop="true">
                    <swiper-slide v-for="slider in contentSlider" :key="slider.id" >
                        <div class="hero-singel-slide" v-if="slider.id">
                            <div class="hero-bg">
                                <img width="388" height="160" class="img-full" :src="slider.background" alt="image">
                            </div>
                            <div class="inner-wrapper">
                                <div class="content">
                                    <p class="title-tag">{{ slider.title_tag }}</p>
                                    <h1 class="title">{{ slider.title }}</h1>
                                    <h2 class="sub-title">{{ slider.sub_title_1 }}</h2>
                                    <h3 class="sub-title">UP to <span> {{slider.sub_title_2}}% </span> off</h3>
                                </div>
                                <div class="product-img">
                                    <img width="149" height="127" class="img-fluid" :src="slider.product_pict" alt="image">
                                    <div class="shape shape-1"><component :is="asset_shape_dotted" class="img-fluid" alt="image" width="83" height="83" /></div>
                                </div>
                            </div>
                        </div>
                    </swiper-slide>
                </swiper>
            </div>
            <!-- End Hero Area -->
        </div>
    </div>
</template>
<style>
.swiper-pagination {
    position: sticky !important;
}
</style>
<script setup>
import { Pagination } from 'swiper'
import 'swiper/css/pagination';
import 'swiper/css';
import { defineAsyncComponent } from 'vue';
defineProps({
    contentSlider: Object
})

const createAsyncComponent = (path) => defineAsyncComponent(() => import(`${import.meta.env.BASE_URL}${path}`));
const asset_shape_dotted = createAsyncComponent("assets/images/hero/shape/shape-dotted.png");
</script>
