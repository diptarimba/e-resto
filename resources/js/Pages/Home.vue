<template>
    <Head title="Home" />
    <!-- ...:::Start Search & Filter Section:::... -->
    <Search v-model:search-text="searchText" v-model:slider-default="defaultValue" v-model:slider-max="maxValueSlider"/>
    <!-- ...:::End Search & Filter Section:::... -->
    <!-- ...:::Start Hero Slider Section:::... -->
    <Slider :content-slider="contentSlider"/>
    <!-- ...:::End Hero Slider Section:::... -->
    <!-- ...:::Start Catagories - 1 Section:::... -->
    <div class="catagories-section section-gap-top-50">
        <div class="container">
            <div class="catagories-area">
                <div class="catagories-nav-1">
                    <CategoryLabel :categories="categories"/>
                </div>
            </div>

            <!-- ...:::Categpry & Product:::... -->
            <div v-if="Object.keys(categoryWithProduct).length > 0">
                <Category v-for="category in categoryWithProduct" :key="category.id" :category="category" />
            </div>
            <div class="container" v-else>
                <p class="text-center product-not-found"><strong> Produk Tidak Tersedia </strong></p>
            </div>
            <!-- ...:::Categpry & Product:::... -->

        </div>
    </div>
    <!-- ...:::END Catagories - 1 Section:::... -->

</template>
<style>
.product-not-found {
    font-family: "Roboto", sans-serif;
    margin-top: 2em;
    font-size: 18px !important;
    color: rgb(0, 0, 0);
}
</style>
<script>
import Homes from "../Shared/Layout/Homes.vue"
export default {
    layout: Homes
}
</script>

<script setup>
import Slider from "../Shared/Components/Home/Slider.vue"
import Category from "../Shared/Components/Home/Category.vue"
import Search from "../Shared/Components/Home/Search.vue"
import CategoryLabel from "../Shared/Components/Home/CategoryLabel.vue"
import {
    ref
} from '@vue/reactivity'
import {
    watch
} from '@vue/runtime-core'
import {
    Inertia
} from '@inertiajs/inertia'
import debounce from 'lodash/debounce'

let props = defineProps({
    categories: Object,
    categoryWithProduct: Object,
    contentSlider: Object,
    filters: Object,
    maxPrice: Number
})

let maxValueSlider = props.maxPrice

let defaultValue = ref([props.filters.min, props.filters.max])

let searchText = ref(props.filters.search)

watch([searchText, defaultValue], debounce(function ([newSearch, newDefaultValue],[oldSearch, oldDefaultValue]) {
    Inertia.get('/', {
        search: newSearch,
        min: newDefaultValue[0],
        max: newDefaultValue[1]
    }, {
        preserveState: true,
        replace: true
    })
}, 300));
</script>
