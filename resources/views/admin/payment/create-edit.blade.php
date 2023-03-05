@extends('layouts.admin.master')

@section('title', 'Payment Method')

@section('header')

@endsection

@section('body')
    <x-layoutContent Heading="Payment Method" mainTitle="Payment Method"
        subTitle="Index" half="1">
        <x-card.card>
            <x-slot name="header">
                <h4>{{ request()->routeIs('admin.payment.create') ? 'Add Payment Method' : 'Modify Payment Method' }}</h4>
            </x-slot>
            <x-slot name="body">
                <form id="form"
                    action="{{ request()->routeIs('admin.payment.create') ? route('admin.payment.store') : route('admin.payment.update', @$payment->id) }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    <x-forms.put-method />
                    <x-forms.input required="" label="Name" name="name" :value="@$payment->name" />
                </form>
                <button form="form" class="btn btn-outline-primary btn-pill">Submit</button>
                <x-action.cancel />
            </x-slot>
        </x-card.card>
    </x-layoutContent>
@endsection

@section('footer')

@endsection
