@extends('layouts.admin.master')

@section('title', 'Order')

@section('header')

@endsection

@section('body')
    <x-layoutContent Heading="Order" mainTitle="Order" subTitle="Home">
        <x-card.card>
            <x-slot name="header">
                <x-card.card-title text="List" />
            </x-slot>
            <x-slot name="body">
                <table class="table table-striped datatables-target-exec" style="width: 100%">
                    <thead>
                        <th>No</th>
                        <th>Order Number</th>
                        <th>Table</th>
                        <th>Status</th>
                        <th>Total Payment</th>
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
        // mengambil URL saat ini
        let currentUrl = window.location.search;
        // membuat objek URLSearchParams dari URL saat ini
        var searchParams = new URLSearchParams(currentUrl);

        $(document).ready(() => {
            var table = $('.datatables-target-exec').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('admin.order.index') }}",
                    data: function(d){
                        d.status = searchParams.get('status') ?? null
                    }
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        sortable: false,
                        searchable: false
                    },
                    {
                        data: 'order_number',
                        name: 'order_number'
                    },
                    {
                        data: 'table',
                        name: 'table'
                    },
                    {
                        data: 'status',
                        name: 'status'
                    },
                    {
                        data: 'pay_amount',
                        name: 'pay_amount'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                ],
                columnDefs: [{
                    targets: 4,
                    render: $.fn.dataTable.render.number(',', '.', 0, '')
                }],
            });
        })
    </script>
@endsection
