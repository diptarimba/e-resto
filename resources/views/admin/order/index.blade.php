@extends('layouts.admin.master')

@section('title', 'Order')

@section('header')

@endsection

@section('body')
    <x-layoutContent Heading="Order" mainTitle="Order" subTitle="Home">
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
                    <input type="button" class="btn m-1 btn-period btn-outline-danger mx-1" name="daterange"
                        value="" />
                </div>
            </x-slot>
        </x-card.card>
        <div class="mb-1"></div>
        <x-card.card>
            <x-slot name="header">
                <div class="d-flex flex-wrap justify-content-between">
                    <x-card.card-title text="List" />
                    <select id="payment_select">
                        <option value="0">Payment</option>
                        @foreach ($payment as $id => $name)
                            <option value="{{ $id }}">{{ $name }}</option>
                        @endforeach
                    </select>
                </div>
            </x-slot>
            <x-slot name="body">
                <div class="table-responsive">
                    <table class="table table-striped datatables-target-exec" style="width: 100%">
                        <thead>
                            <th>No</th>
                            <th>Order Number</th>
                            <th>Table</th>
                            <th>Status</th>
                            <th>Payment</th>
                            <th>Total Payment</th>
                            <th>Action</th>
                        </thead>
                        <tbody>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="5" style="text-align:right">Total:</th>
                                <th></th>
                            </tr>
                        </tfoot>

                    </table>
                </div>
            </x-slot>
        </x-card.card>
    </x-layoutContent>
@endsection

@section('footer')
    <script>
        var period = 'ALL';
        var payment_id = null;
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
                    url: "{{ route('admin.order.index') }}",
                    data: function(d) {
                        d.status = searchParams.get('status') ?? null,
                            d.period = period
                        d.payment_id = payment_id
                        d.start_period = start_period
                        d.end_period = end_period
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
                        data: 'cash_flow',
                        name: 'cash_flow',
                        render: function(data, type, row) {
                            return data?.payment_method?.name === undefined ? 'Unpaid' :
                                `Paid (${data?.payment_method?.name})`
                        },
                        sortable: true,
                    },
                    {
                        data: 'pay_amount',
                        name: 'pay_amount',
                        render: function(data, type, row) {
                            return data.toLocaleString('de-DE');
                        }
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
                    render: $.fn.dataTable.render.number('.', ',', 0, '')
                }],
                footerCallback: function(row, data, start, end, display) {
                    var api = this.api();

                    // Remove the formatting to get integer data for summation
                    var intVal = function(i) {
                        return typeof i === 'string' ? i.replace(/[\$,]/g, '') * 1 : typeof i ===
                            'number' ? i : 0;
                    };

                    // Total over this page
                    pageTotal = api
                        .column(5, {
                            page: 'current'
                        })
                        .data()
                        .reduce(function(a, b) {
                            return intVal(a) + intVal(b);
                        }, 0);

                    // Update footer
                    $.ajax({
                        url: "{{ route('admin.order.index') }}",
                        data: {
                            sum_of_all: true,
                            status: searchParams.get('status') ?? null,
                            period: period,
                            payment_id: payment_id,
                            start_period: start_period,
                            end_period: end_period
                        },
                        success: function(response) {
                            var totalSum = parseFloat(response.total)
                            $(api.column(4).footer()).html('Rp. ' + pageTotal
                                .toLocaleString('de-DE') + ' ( Rp. ' +
                                totalSum.toLocaleString('de-DE') + ' Total Semua)');
                        },
                        error: function() {
                            console.error("Failed to retrieve total sum from the server")
                        }
                    }, )


                },
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

        $(document).ready(function() {
            $('#payment_select').on('change', function() {
                var currentValue = $(this).val();
                if(currentValue !== 0) {
                    payment_id = currentValue;
                    table.draw()
                } else {
                    payment_id = null;
                    table.draw()
                }
            });
        });


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
