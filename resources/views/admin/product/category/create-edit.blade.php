@extends('layouts.admin.master')

@section('title', 'Category')

@section('header')

@endsection

@section('body')
    <x-layoutContent Heading="Category" mainTitle="Category"
        subTitle="Index" half="1">
        <x-card.card>
            <x-slot name="header">
                <h4>{{ request()->routeIs('admin.category.create') ? 'Add Category' : 'Modify Category' }}</h4>
            </x-slot>
            <x-slot name="body">
                <form id="form"
                    action="{{ request()->routeIs('admin.category.create') ? route('admin.category.store') : route('admin.category.update', @$category->id) }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    <x-forms.put-method />
                    <x-forms.input required="" label="Name" name="name" :value="@$category->name" />
                </form>
                <button form="form" class="btn btn-outline-primary btn-pill">Submit</button>
                <x-action.cancel />
            </x-slot>
        </x-card.card>
    </x-layoutContent>
@endsection

@section('footer')

@endsection
