@extends('layouts.admin.master')

@section('title', 'Table')

@section('header')

@endsection

@section('body')
<x-layoutContent
    Heading="Table"
    mainTitle="Table"
    subTitle="Home"
>
    <x-card.card>
        <x-slot name="header">
            <x-card.card-title-create url="{{route('admin.table.create')}}" text="List"/>
        </x-slot>
        <x-slot name="body">
            <table class="table table-striped datatables-target-exec" style="width: 100%">
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
        ajax: "{{ route('admin.table.index') }}",
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
