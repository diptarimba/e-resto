@extends('layouts.admin.master')

@section('title', 'Product Size')

@section('header')

@endsection

@section('body')
    <x-layoutContent Heading="Product Size" mainTitle="Product Size" subTitle="Home">
        <x-card.card>
            <x-slot name="header">
                <x-card.card-title-create url="{{ route('admin.product.size.create', ['product' => $product->id]) }}"
                    text="List" />
            </x-slot>
            <x-slot name="body">
                <div class="table-responsive">
                    <table class="table table-striped datatables-target-exec" style="width: 100%">
                        <thead>
                            <th>No</th>
                            <th>Name</th>
                            <th>Action</th>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
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
                ajax: "{{ route('admin.product.size.index', ['product' => $product->id]) }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        sortable: false,
                        searchable: false
                    },
                    {
                        data: 'name',
                        name: 'name'
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
