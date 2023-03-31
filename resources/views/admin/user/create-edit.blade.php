@extends('layouts.admin.master')

@section('title', 'User')

@section('header')

@endsection

@section('body')
    <x-layoutContent Heading="User" mainTitle="User"
        subTitle="Index" half="1">
        <x-card.card>
            <x-slot name="header">
                <h4>{{ request()->routeIs('admin.user.create') ? 'Add User' : 'Modify User' }}</h4>
            </x-slot>
            <x-slot name="body">
                <form id="form"
                    action="{{ request()->routeIs('admin.user.create') ? route('admin.user.store') : route('admin.user.update', @$user->id) }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    <x-forms.put-method />
                    <x-forms.input required="" label="Name" name="name" :value="@$user->name" />
                    <x-forms.input required="" label="Username" name="username" :value="@$user->username" />
                    <x-forms.input required="" label="Email" name="email" :value="@$user->email" />
                    <x-forms.input type="password" label="Password" name="password" value="" />
                </form>
                <button form="form" class="btn btn-outline-primary btn-pill">Submit</button>
                <x-action.cancel />
            </x-slot>
        </x-card.card>
    </x-layoutContent>
@endsection

@section('footer')

@endsection
