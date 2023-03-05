@extends('layouts.admin.master')

@section('title', 'Customer')

@section('header')

@endsection

@section('body')
    <x-layoutContent Heading="Customer" mainTitle="Customer"
        subTitle="Index" half="1">
        <x-card.card>
            <x-slot name="header">
                <h4>{{ request()->routeIs('admin.customer.create') ? 'Add Customer' : 'Modify Customer' }}</h4>
            </x-slot>
            <x-slot name="body">
                <form id="form"
                    action="{{ request()->routeIs('admin.customer.create') ? route('admin.customer.store') : route('admin.customer.update', @$customer->id) }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    <x-forms.put-method />
                    <x-forms.input required="" label="Nama" name="name" :value="@$customer->name" />
                    <x-forms.input required="" label="Token" name="token" :value="@$customer->token" />
                    <x-forms.input required="" label="Phone" name="phone" :value="@$customer->phone" />
                </form>
                <x-action.cancel />
            </x-slot>
        </x-card.card>
    </x-layoutContent>
@endsection

@section('footer')
<script>
    $('.form-control').prop('disabled', true);
</script>

@endsection
