@extends('layouts.admin.master')

@section('title', 'Product')

@section('header')

@endsection

@section('body')
<x-layoutContent
    Heading="Product"
    mainTitle="Product"
    subTitle="Home"
>
    <x-card.card>
        <x-slot name="header">
            <x-card.card-title-create url="{{route('admin.product.create')}}" text="List"/>
        </x-slot>
        <x-slot name="body">
            <table class="table table-striped datatables-target-exec" style="width: 100%">
                <thead>
                    <th>No</th>
                    <th>Name</th>
                    <th>Kuantitas</th>
                    <th>Note</th>
                    <th>Status</th>
                    <th>Category</th>
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
        ajax: "{{ route('admin.product.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, sortable: false, searchable: false},
            {data: 'name', name: 'name'},
            {data: 'quantity', name: 'quantity'},
            {data: 'note', name: 'note'},
            {data: 'status', name: 'status'},
            {data: 'category.name', name: 'category.name'},
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
