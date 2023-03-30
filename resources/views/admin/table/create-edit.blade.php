@extends('layouts.admin.master')

@section('title', 'Table')

@section('header')

@endsection

@section('body')
    <x-layoutContent Heading="Table" mainTitle="Table"
        subTitle="Index" half="1">
        <x-card.card>
            <x-slot name="header">
                <h4>{{ request()->routeIs('admin.table.create') ? 'Add Table' : 'Modify Table' }}</h4>
            </x-slot>
            <x-slot name="body">
                <form id="form"
                    action="{{ request()->routeIs('admin.table.create') ? route('admin.table.store') : route('admin.table.update', @$table->id) }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    <x-forms.put-method />
                    <x-forms.input required="" label="Name" name="name" :value="@$table->name" />
                </form>
                <button form="form" class="btn btn-outline-primary btn-pill">Submit</button>
                <x-action.cancel />
            </x-slot>
        </x-card.card>
    </x-layoutContent>
@endsection

@section('footer')

@endsection
