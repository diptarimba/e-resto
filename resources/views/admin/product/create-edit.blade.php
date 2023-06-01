@extends('layouts.admin.master')

@section('title', 'Product')

@section('header')

@endsection

@section('body')
    <x-layoutContent Heading="Product" mainTitle="Product" subTitle="Index" half="1">
        <x-card.card>
            <x-slot name="header">
                <h4>{{ request()->routeIs('admin.product.create') ? 'Add Product' : 'Modify Product' }}</h4>
            </x-slot>
            <x-slot name="body">
                <form id="form"
                    action="{{ request()->routeIs('admin.product.create') ? route('admin.product.store') : route('admin.product.update', @$product->id) }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    <x-forms.put-method />
                    @isset($product->image)
                        <div class="row row-cols-lg-2 row-cols-sm-2 row-cols-md-3 justify-content-center">
                            @foreach ($product->image as $each)
                                <div class="col card previewPictDB">
                                    <div class="my-auto">
                                        <img class="img-thumbnail imagePreview" src="{{ asset($each) }}" alt="">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @endisset
                    <x-forms.file multiple="true" label="Pilih Foto Product" name="image[]" id="gallery-photo-add" />
                    <div class="gallery row row-cols-2 justify-content-center" id="isi-gallery"></div>
                    <x-forms.input required="" label="Nama Produk" name="name" :value="@$product->name" />
                    <x-forms.input required="" label="Kuantitas" name="quantity" :value="@$product->quantity" />
                    <x-forms.input required="" label="Harga" name="price" :value="@$product->price" />
                    <x-forms.select label="Kategori" name="category_id" :items="$category" :value="@$product->category_id" />
                    <x-forms.textarea label="Deskripsi" name="description" :value="@$product->description" rows="3" />
                </form>
                <button form="form" class="btn btn-outline-primary btn-pill">Submit</button>
                <x-action.cancel />
            </x-slot>
        </x-card.card>
    </x-layoutContent>
@endsection

@section('footer')

@endsection
