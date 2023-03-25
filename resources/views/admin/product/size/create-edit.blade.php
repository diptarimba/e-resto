@extends('layouts.admin.master')

@section('title', 'Product Size')

@section('header')

@endsection

@section('body')
    <x-layoutContent Heading="Product Size" mainTitle="Product Size"
        subTitle="Index" half="1">
        <x-card.card>
            <x-slot name="header">
                <h4>{{ request()->routeIs('admin.product.size.create') ? 'Add Product Size' : 'Modify Product Size' }}</h4>
            </x-slot>
            <x-slot name="body">
                <form id="form"
                    action="{{ request()->routeIs('admin.product.size.create') ? route('admin.product.size.store', ['product' => $product->id]) : route('admin.product.size.update', ['product' => $product->id, 'size' => $size->id]) }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    <x-forms.put-method />
                    <x-forms.input required="" label="Name" name="name" :value="@$size->name" />
                </form>
                <button form="form" class="btn btn-outline-primary btn-pill">Submit</button>
                <x-action.cancel />
            </x-slot>
        </x-card.card>
    </x-layoutContent>
@endsection

@section('footer')

@endsection
