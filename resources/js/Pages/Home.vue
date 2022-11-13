<template>
<Head title="Home"/>
<layout-home>
    <template #search>
        <search v-model="searchText"/>
    </template>
    <template #product v-if="Object.keys(categoryWithProduct).length !== 0">
        <category v-for="category in categoryWithProduct" :key="category.id" :category="category"/>
    </template>
    <template #product v-else>
        <div class="catagories-wrapper">
            <div class="catagories-wrapper-content">
                <p class="mx-auto">Produk tidak tersedia</p>
            </div>
        </div>
    </template>
</layout-home>
</template>
<script setup>
import category from "../Shared/Components/Category.vue"
import LayoutHome from "../Shared/LayoutHome.vue"
import search from "../Shared/Components/Search.vue"
import { ref } from '@vue/reactivity'
import { watch } from '@vue/runtime-core'
import { Inertia } from '@inertiajs/inertia'
import debounce from 'lodash/debounce'

let props = defineProps({
    categoryWithProduct: Object,
    filters: Object
})

let searchText = ref(props.filters.search)

watch(searchText, debounce( function (value) {
    Inertia.get('/', {search: value}, {
        preserveState: true,
        replace: true
    })
}, 300));

</script>
