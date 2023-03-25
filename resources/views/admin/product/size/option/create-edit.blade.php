@extends('layouts.admin.master')

@section('title', 'Product Option')

@section('header')

@endsection

@section('body')
    <x-layoutContent Heading="Product Option" mainTitle="Product Option"
        subTitle="Index" half="1">
        <x-card.card>
            <x-slot name="header">
                <h4>{{ request()->routeIs('admin.product.size.option.create') ? 'Add Product Option' : 'Modify Product Option' }}</h4>
            </x-slot>
            <x-slot name="body">
                <form id="form"
                    action="{{ request()->routeIs('admin.product.size.option.create') ? route('admin.product.size.option.store', ['product' => $product->id, 'size' => $size->id]) : route('admin.product.size.option.update', ['product' => $product->id, 'size' => $size->id, 'option' => $option->id]) }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    <x-forms.put-method />
                    <x-forms.input required="" label="Name" name="name" :value="@$option->name" />
                </form>
                <button form="form" class="btn btn-outline-primary btn-pill">Submit</button>
                <x-action.cancel />
            </x-slot>
        </x-card.card>
    </x-layoutContent>
@endsection

@section('footer')

@endsection
