@extends('layouts.admin.master')

@section('title', 'Slider')

@section('header')

@endsection

@section('body')
    <x-layoutContent Heading="Slider" mainTitle="Slider" subTitle="Index" half="1">
        <x-card.card>
            <x-slot name="header">
                <h4>{{ request()->routeIs('admin.slider.create') ? 'Add Slider' : 'Modify Slider' }}</h4>
            </x-slot>
            <x-slot name="body">
                <form id="form"
                    action="{{ request()->routeIs('admin.slider.create') ? route('admin.slider.store') : route('admin.slider.update', @$slider->id) }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    <x-forms.put-method />
                    @isset($slider->image)
                    <div class="row row-cols-lg-2 row-cols-sm-2 row-cols-md-3 justify-content-center">
                        <div class="col card previewPictDB">
                            <div class="my-auto">
                                <img class="img-thumbnail imagePreview" src="{{ asset($slider->image) }}" alt="">
                            </div>
                        </div>
                    </div>
                    @endisset
                    <x-forms.file label="Pilih Foto Slider" name="image" id="gallery-photo-add" />
                    <div class="gallery row row-cols-2 justify-content-center" id="isi-gallery"></div>
                </form>
                <button form="form" class="btn btn-outline-primary btn-pill">Submit</button>
                <x-action.cancel />
            </x-slot>
        </x-card.card>
    </x-layoutContent>
@endsection

@section('footer')

@endsection
