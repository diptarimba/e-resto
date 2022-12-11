<template>
<div class="search-n-filter-section section-gap-top-25">
    <div class="container">
        <!-- Start Search & Filter Area -->
        <div class="search-n-filter-area home-one">
            <div class="search-box">

                <div class="searchable select">
                    <input type="text" :value="searchText" @input="$emit('update:searchText', $event.target.value)" placeholder="Search...">
                    <ul>
                        <li>mexico city</li>
                        <li>Bulgaria</li>
                        <li>san francisco</li>
                        <li>Egypt</li>
                        <li>texas</li>
                    </ul>
                    <button class="btn search__btn" aria-label="Search Icon" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12.003" viewBox="0 0 12 12.003">
                            <path id="Icon_ionic-ios-search" data-name="Icon ionic-ios-search" d="M13.859,13.131,10.522,9.762a4.756,4.756,0,1,0-.722.731l3.316,3.347a.514.514,0,0,0,.725.019A.517.517,0,0,0,13.859,13.131Zm-7.075-2.6a3.756,3.756,0,1,1,2.656-1.1A3.732,3.732,0,0,1,6.784,10.534Z" transform="translate(-2 -1.997)" fill="#171717" />
                        </svg>
                    </button>

                    <button class="btn submit__btn" aria-label="Search Icon" type="submit">
                        <svg xmlns="http://www.w3.org/2000/svg" width="18" height="12" viewBox="0 0 18 12">
                            <path id="Icon_ionic-ios-arrow-round-forward" data-name="Icon ionic-ios-arrow-round-forward" d="M19.354,11.481a.816.816,0,0,0-.006,1.15l3.8,3.806H8.682a.812.812,0,0,0,0,1.625H23.143l-3.8,3.806a.822.822,0,0,0,.006,1.15.81.81,0,0,0,1.144-.006l5.152-5.187h0a.912.912,0,0,0,.169-.256.775.775,0,0,0,.063-.312.814.814,0,0,0-.231-.569L20.492,11.5A.8.8,0,0,0,19.354,11.481Z" transform="translate(-7.875 -11.252)" fill="#aaa" />
                        </svg>
                    </button>

                    <button class="btn close__btn">
                        <svg xmlns="http://www.w3.org/2000/svg" width="12" height="12" viewBox="0 0 12 12">
                            <path id="Icon_metro-cancel" data-name="Icon metro-cancel" d="M6.857.643a6,6,0,1,0,6,6,6,6,0,0,0-6-6Zm0,10.875a4.875,4.875,0,1,1,4.875-4.875A4.875,4.875,0,0,1,6.857,11.518ZM8.732,3.643,6.857,5.518,4.982,3.643,3.857,4.768,5.732,6.643,3.857,8.518,4.982,9.643,6.857,7.768,8.732,9.643,9.857,8.518,7.982,6.643,9.857,4.768Z" transform="translate(-0.857 -0.643)" fill="#aaa" />
                        </svg>
                    </button>

                </div>

                <button @click="clickSlide" id="filter-trigger" aria-label="Filter Icon" class="filter_btn btn--radius btn--radical-red btn--color-white btn--box-shadow btn--size-40-40 btn--center btn--font-size-22"><i class="icon icon-carce-filter"></i></button>
            </div>
        </div>
        <!-- End Search & Filter Area -->
        <transition name="bounce"
            enter-active-class="animate__animated animate__fadeInDown"
            leave-active-class="animate__animated animate__fadeOutUp"
            >
            <div v-if="isSlide" id="shop-filter-menu">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <div class="shop-filter-block mt-0">
                                <h4 class="shop-filter-block__title" style="margin-bottom: 3rem;">Price</h4>
                                <div class="shop-filter-block__content">
                                    <div class="widget-price-range">
                                        <Slider :format="{ prefix: 'Rp ', thousand: ',', decimals: 0 }" :max="sliderMax" :default="sliderDefault" class="slider-red" />
                                    </div>
                                </div>
                            </div>
                            <div class="shop-filter-block">
                                <button class="apply-btn" @click="submitValue(sliderDefault)">APPLY</button>
                                <button class="cancel-btn" @click="clickSlide">CANCEL</button>
                                <button class="red-btn" @click="resetValue">RESET</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </transition>
    </div>
</div>
</template>

<style>
@import "https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css";
.slider-red {
    --slider-connect-bg: #EF4444;
    --slider-tooltip-bg: #EF4444;
    --slider-handle-ring-color: #EF444430;
}

.shop-filter {
    display: block !important;
}

.red-btn {
    margin-left: 10px;
    text-transform: capitalize;
    line-height: 1;
    font-size: 14px;
    cursor: pointer;
    color: #fff;
    background: #EF4444;
    border-radius: 4px;
    padding: 10px 15px;
    border: 1px solid #EF4444;
}


</style>

<script setup>
import {
    ref
} from '@vue/reactivity';
import Slider from '@vueform/slider'
import debounce from 'lodash/debounce'
import '@vueform/slider/themes/default.css';
const props = defineProps(['searchText', 'sliderMax', 'sliderDefault'])
const emit = defineEmits(['update:sliderDefault', 'update:searchText', 'update:sliderMax'])
const isSlide = ref(false);
const clickSlide = () => {
    isSlide.value = !isSlide.value
}
function submitValue(value){
    emit('update:sliderDefault', value)
    clickSlide()
}
function resetValue(){
    emit('update:sliderDefault', [0,props.sliderMax])
    clickSlide()
}
</script>
