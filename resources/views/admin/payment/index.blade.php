@extends('layouts.admin.master')

@section('title', 'Home')

@section('header')

@endsection

@section('body')
<x-layoutContent
    Heading="Payment"
    mainTitle="Payment"
    subTitle="Home"
>
    <x-card.card>
        <x-slot name="header">
            <x-card.card-title-create url="{{route('admin.payment.create')}}" text="List"/>
        </x-slot>
        <x-slot name="body">
            <table class="table table-striped datatables-target-exec">
                <thead>
                    <th>No</th>
                    <th>Name</th>
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
        ajax: "{{ route('admin.payment.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex', orderable: false, sortable: false, searchable: false},
            {data: 'name', name: 'name'},
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