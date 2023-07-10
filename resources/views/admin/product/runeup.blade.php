@extends('layouts.admin.master')

@section('title', 'Runner Up Product')

@section('header')

@endsection

@section('body')
    <x-layoutContent Heading="Runner Up Product" mainTitle="Runner Up Product" subTitle="Home">
        <x-card.card>
            <x-slot name="header">
                <x-card.card-title text="Period" />
            </x-slot>
            <x-slot name="body">
                <div class="d-flex flex-wrap justify-content-center">
                    <button id="ALL" class="btn m-1 btn-period btn-success">ALL</button>
                    <button id="TODAY" class="btn m-1 btn-period btn-outline-primary mx-1">Today</button>
                    <button id="1WEEK" class="btn m-1 btn-period btn-outline-secondary mx-1">1 Week</button>
                    <button id="1MONTH" class="btn m-1 btn-period btn-outline-info mx-1">1 Month</button>
                    <input type="button" class="btn m-1 btn-period btn-outline-danger mx-1" name="daterange" value="" />
                </div>
            </x-slot>
        </x-card.card>
        <div class="mb-1"></div>
        <x-card.card>
            <x-slot name="header">
                <x-card.card-title text="List" />
            </x-slot>
            <x-slot name="body">
                <table class="table table-striped datatables-target-exec" style="width: 100%">
                    <thead>
                        <th>No</th>
                        <th>Name</th>
                        <th>Total Order</th>
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
        var period = 'ALL';
        var start_period = null;
        var end_period = null;
        // mengambil URL saat ini
        let currentUrl = window.location.search;
        // membuat objek URLSearchParams dari URL saat ini
        var searchParams = new URLSearchParams(currentUrl);

        var table;
        $(document).ready(() => {
            table = $('.datatables-target-exec').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: "{{ route('admin.product.runeup') }}",
                    data: function(d) {
                        d.status = searchParams.get('status') ?? null,
                        d.start_period = start_period
                        d.end_period = end_period
                        d.period = period
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
                        data: 'product_name',
                        name: 'product_name'
                    },
                    {
                        data: 'quantity',
                        name: 'quantity'
                    },
                    {
                        data: 'action',
                        name: 'action',
                        orderable: true,
                        searchable: true
                    },
                ],
                columnDefs: [{
                    targets: 2,
                    render: $.fn.dataTable.render.number(',', '.', 0, '')
                }],
            });
        })
    </script>
    <script>
        $('.btn-period').on('click', function() {
            var Coloring = {
                'btn-primary': 'btn-outline-primary',
                'btn-success': 'btn-outline-success',
                'btn-secondary': 'btn-outline-secondary',
                'btn-info': 'btn-outline-info',
                'btn-danger': 'btn-outline-danger',
            }

            $('.btn-period').each(function() {
                for (eachColor in Coloring) {
                    if ($(this).hasClass(eachColor)) {
                        $(this).removeClass(eachColor).addClass(Coloring[eachColor])
                    }
                }
            })

            for (eachColor in Coloring) {
                if ($(this).hasClass(Coloring[eachColor])) {
                    $(this).removeClass(Coloring[eachColor]).addClass(eachColor)
                }
            }

            if ($(this).attr('id') !== undefined) {
                period = $(this).attr('id')
                start_period = null;
                end_period = null;
                table.draw();
            }

        })
        $(function() {
            $('input[name="daterange"]').daterangepicker({
                opens: 'left'
            }, function(start, end, label) {
                period = null
                start_period = start.format('YYYY-MM-DD');
                end_period = end.format('YYYY-MM-DD')
                table.draw();
                console.log('hadehh')
            });
        });
    </script>
@endsection
