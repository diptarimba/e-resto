@extends('layouts.admin.master')

@section('title', 'Home')

@section('header')

@endsection

@section('body')
<x-layoutContent
    Heading="Customer"
    mainTitle="Customer"
    subTitle="Home"
>
    <x-card.card>
        <x-slot name="header">
            <x-card.card-title-create url="{{route('admin.customer.create')}}" text="List"/>
        </x-slot>
        <x-slot name="body">
            <table class="table table-striped datatables-target-exec" style="width: 100%">
                <thead>
                    <th>No</th>
                    <th>Token</th>
                    <th>Nama</th>
                    <th>Phone</th>
                    <th>Jumlah Order</th>
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
<script src="{{asset('dashboard-assets/plugins/datatable/js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('dashboard-assets/plugins/datatable/js/dataTables.bootstrap5.min.js')}}"></script>
{{-- <script src="{{asset('dashboard-assets/js/bootstrap.bundle.min.js')}}"></script> --}}
<script>
    $(document).ready(() => {
        var table = $('.datatables-target-exec').DataTable({
        processing: true,
        serverSide: true,
        ajax: "{{ route('admin.customer.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, sortable: false, searchable: false},
            {data: 'token', name: 'token'},
            {data: 'name', name: 'name'},
            {data: 'phone', name: 'phone'},
            {data: 'order_count', name: 'order_count'},
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
