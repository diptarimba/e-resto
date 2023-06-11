@extends('layouts.admin.master')

@section('title', 'Slider')

@section('header')

@endsection

@section('body')
<x-layoutContent
    Heading="Slider"
    mainTitle="Slider"
    subTitle="Home"
>
    <x-card.card>
        <x-slot name="header">
            <x-card.card-title-create url="{{route('admin.slider.create')}}" text="List"/>
        </x-slot>
        <x-slot name="body">
            <table class="table table-striped datatables-target-exec" style="width: 100%">
                <thead>
                    <th>No</th>
                    <th>Image</th>
                    <th>Action</th>
                </thead>
                <tbody>

                </tbody>
            </table>
        </x-slot>
    </x-card.card>
</x-layoutContent>
@endsection

@section('footer')
<script>
    $(document).ready(() => {
        var table = $('.datatables-target-exec').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.slider.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, sortable: false, searchable: false},
            {
                data: 'image',
                name: 'image',
                render: function(data, type, full, meta) {
                    if (type === 'display' && data) {
                        return '<img src="' + data + '" alt="Slider Image" width="100" height="100">';
                    }
                    return data;
                }
            },
            {
                data: 'action',
                name: 'action',
                orderable: true,
                searchable: true
            },
        ]
    });
    })
</script>
@endsection
