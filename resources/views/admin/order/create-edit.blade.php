@extends('layouts.admin.master')

@section('title', 'Order')

@section('header')

@endsection

@section('body')
    <x-layoutContent Heading="Order" mainTitle="Order" subTitle="Index">
        <x-card.card>
            <x-slot name="header">
                <h4>{{ request()->routeIs('admin.order.create') ? 'Add Order' : 'View Order' }}</h4>
            </x-slot>
            <x-slot name="body">
                <form id="form"
                    action="{{ request()->routeIs('admin.order.create') ? route('admin.order.store') : route('admin.order.update', @$order->id) }}"
                    method="post" enctype="multipart/form-data">
                    @csrf
                    <x-forms.put-method />
                    <x-forms.input required="" label="Customer" name="customer_name" :value="@$order->customer->name ?? 'Pelanggan Belum Memasukan Nama'" />
                    <x-forms.select label="Table" name="table" :items="$table" :value="@$order->table_id" />
                    <div class="mb-2" id="edit-table">
                        <button type="button" class="btn btn-outline-success btn-sm edit-table">Edit Table</button>
                    </div>
                    <x-forms.input required="" label="Quantity" name="quantity" :value="@$order->quantity" />
                    <x-forms.input required="" label="Order Number" name="order_number" :value="@$order->order_number" />
                    {{-- <x-forms.select label="Payment Method" name="payment_id" :items="$payment" :value="@$order->payment_id" />
                    <div class="mb-2" id="edit-payment">
                        <button type="button" class="btn btn-outline-success btn-sm edit-payment">Edit Payment</button>
                    </div> --}}
                    <x-forms.input required="" label="Total Payment" name="total_payment" :value="@$order->pay_amount" />
                </form>
                <x-action.cancel href="{{ route('admin.order.index') }}" />

                {{-- Menampilkan button pay apabila orderan belum dibayar --}}
                <x-action.button-pay modal="#payformodal" :paid="@$order->cash_flow_id" />

                {{-- Menampilkan button change status --}}
                @foreach ($button as $each)
                    <x-action.btn-change-status status="{{ $each['key'] }}" colour="{{ $each['val'] }}" />
                @endforeach
                {{-- Menampilkan form change status dalam mode hidden --}}
                @foreach ($button as $each)
                    <x-action.form-change-status order="{{ $order->id }}" status="{{ $each['key'] }}" />
                @endforeach
            </x-slot>
        </x-card.card>
        <!-- Vertically centered modal -->
        <div id="payformodal" class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Pay the Bill</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="payform">
                            {{-- <x-forms.input required="" label="" name="quantity" :value="@$order->quantity" /> --}}

                            <x-forms.input required="" label="Customer Pay" name="customer_pay" value="0" />
                            <x-forms.input required="" label="Billed" name="customer_billed" :value="@$order->pay_amount" />
                            <x-forms.input required="" label="Change" name="customer_change" :value="@$order->pay_amount * -1" />
                            <x-forms.select label="Payment Method" name="payment_id" :items="$payment" :value="@$order->payment_id" />
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary btn-pay-confirm" disabled>Bayar</button>
                    </div>
                </div>
            </div>
        </div>
        <x-card.card>
            <x-slot name="header">
                <h4>Order Detail</h4>
            </x-slot>
            <x-slot name="body">
                <table class="table table-striped datatables-target-exec" style="width: 100%">
                    <thead>
                        <th>No</th>
                        <th>Product</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Sub Total</th>
                        <th>Note</th>
                        @if (!in_array($order->status, ['CANCEL', 'COMPLETE']))
                            <th>Action</th>
                        @endif
                    </thead>
                    <tbody>

                    </tbody>
                </table>
            </x-slot>
        </x-card.card>
    </x-layoutContent>
    <!-- Button trigger for Success theme modal -->
    <button type="button" class="btn btn-outline-success" data-bs-toggle="modal" data-bs-target="#modal_edit">
        Success
    </button>

    <!--Success theme Modal -->
    <div class="modal fade text-left" id="modal_edit" tabindex="-1" role="dialog" aria-labelledby="myModalLabel110"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header bg-success">
                    <h5 class="modal-title white" id="myModalLabel110">
                        Success Modal
                    </h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="update_product">
                        <div class="form-group mb-2">
                            <label class="col-form-label" class="form-label" for="product_name">Product Name</label>
                            <input class="form-control" id="product_name" disabled type="text" value="">
                        </div>
                        <x-forms.input type="number" required="" label="Product Qty" name="product_quantity"
                            value="" />
                        <div class="form-group mb-2">
                            <label class="col-form-label" class="form-label" for="product_price">Product Price</label>
                            <input class="form-control" id="product_price" disabled type="number" value="">
                        </div>
                        <div class="form-group mb-2">
                            <label class="col-form-label" class="form-label" for="product_subtotal">Sub Total</label>
                            <input class="form-control" id="product_subtotal" disabled type="number" value="">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>

                    <button type="button" class="btn btn-success ml-1" onclick="updateModal()" data-bs-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Update</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('footer')

    <script>
        $('input[name="customer_pay"], #payment_id').on('change keyup', function() {
            var customerPay = parseFloat($('input[name="customer_pay"]').val().replace(/\D/g, ''))
            var amountBilled = parseFloat($('input[name="customer_billed"]').val().replace(/\D/g, ''))
            var valueChange = customerPay - amountBilled
            $('input[name="customer_change"]').val(valueChange)

            var paymentChoosen = $('#payment_id')[0]
            var payConfirm = (valueChange > 0) && paymentChoosen.selectedIndex !== 0 ? false : true;
            $('.btn-pay-confirm').prop('disabled', payConfirm)
        })
        $('input[name="customer_pay"], input[name="customer_billed"], input[name="customer_change"], #payment_id').on(
            'input change keyup',
            function() {
                $('input[name="customer_pay"], input[name="customer_billed"], input[name="customer_change"]').each(
                    function() {
                        var value = $(this).val().replace(/[^0-9.-]/g, ''); // Menghapus karakter non-digit
                        value = parseFloat(value) || 0; // Mengubah nilai menjadi angka atau 0 jika tidak valid
                        $(this).val(value.toLocaleString()); // Mengubah nilai input menjadi format ribuan
                    })
            });


        $('.btn-pay-confirm').on('click', function() {
            var customerPay = parseFloat($('input[name="customer_billed"]').val().replace(/\D/g, ''))
            var paymentId = $('#payment_id').val()
            var dataToSend = {
                payment_id: paymentId,
                customer_pay: customerPay
            }

            $.ajax({
                type: 'POST',
                url: '{{ route('admin.order.payment', $order->id) }}',
                data: dataToSend,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                        'content'
                    ) // Menambahkan token CSRF untuk melindungi form Anda dari serangan CSRF
                },
                success: function(response) {
                    $('#payformodal').modal('hide');
                    $('.btn-pay').fadeOut();
                    // Menangani respons dari server
                    Swal.fire(
                        'Congratulation!',
                        'Payment Successfully received!',
                        'success'
                    )
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    // Menangani kesalahan saat melakukan request
                    console.error(error);
                }
            })
        })
    </script>
    <script>
        $('#table').on('change', function() {
            var dataToSend = {
                table_id: $(this).val()
            }

            $.ajax({
                type: 'POST',
                url: '{{ route('admin.order.table', $order->id) }}',
                data: dataToSend,
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr(
                        'content'
                    ) // Menambahkan token CSRF untuk melindungi form Anda dari serangan CSRF
                },
                success: function(response) {
                    $('#table').prop('disabled', true)
                    $('#edit-table').fadeIn();
                    // Menangani respons dari server
                    console.log(response);
                },
                error: function(xhr, status, error) {
                    // Menangani kesalahan saat melakukan request
                    console.error(error);
                }
            })
        })
    </script>
    <script>
        /* Set Disabled Beberapa Form */
        $('#order_number, #customer_name, #total_payment, input[name="amount_billed"], #quantity').prop('disabled', true)

        if (!$('#table option:selected').val().includes('Choose')) {
            $('#table').prop('disabled', true)
        }

        $('.edit-table').on('click', function() {
            $('#table').prop('disabled', false)
            $('#edit-table').fadeOut();
        })
        $('.edit-payment').on('click', function() {
            $('#payment_id').prop('disabled', false)
            $('#edit-payment').fadeOut();
        })

        /* Agar variable table bisa diakses dari luar */
        var table;

        /* Berkaitan Modal Update Order Detail*/
        $("#product_quantity").attr('min', 0);
        $('#product_quantity').on('change keyup', function() {
            changeSubTotal()
        })

        var OrderId;
        var DetailId;

        var changeSubTotal = () => {
            var price = $('#product_price').val();
            var quantity = $('#product_quantity').val();
            $('#product_subtotal').val(price * quantity)
        }

        var editModal = (orderId, detailId) => {
            OrderId = orderId;
            DetailId = detailId;

            var editPath =
                '{{ route('admin.order.detail.edit', ['detail' => ':detail', 'order' => ':order']) }}'
            editPath = editPath.replace(':order', orderId).replace(':detail', detailId)

            $.ajax({
                url: editPath,
                method: 'GET',
                success: function(data) {
                    $('#product_name').val(data.data.product.name)
                    $('#product_quantity').val(data.data.quantity)
                    $('#product_price').val(data.data.product.price)
                    $('#product_subtotal').val(data.data.quantity * data.data.product.price)
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown)
                }
            })
            $('#modal_edit').modal('toggle');
        }

        var updateModal = () => {
            detailId = DetailId;
            orderId = OrderId;

            var updatePath =
                '{{ route('admin.order.detail.update', ['detail' => ':detail', 'order' => ':order']) }}'
            updatePath = updatePath.replace(':order', orderId).replace(':detail', detailId)

            var updateQuantity = $('#product_quantity').val();

            if (updateQuantity > 0) {
                $.ajax({
                    url: updatePath,
                    method: 'PUT',
                    data: {
                        quantity: updateQuantity
                    },
                    success: function(data) {
                        $('#total_payment').val(data.data.order.pay_amount.toLocaleString())
                        $('#quantity').val(data.data.order.quantity.toLocaleString())
                        table.draw();
                    },
                    error: function(jqXHR, textStatus, errorThrown) {
                        console.log(textStatus, errorThrown)
                    }
                })
            } else {
                deleteDetail(orderId, detailId)
            }
        }

        /* Berkaitan Modal Update Order Detail*/

        /* Berkaitan Modal Delete Order Detail*/
        var deleteDetail = (orderId, detailId) => {
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#198754',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    var value = deleteAction(orderId, detailId, function(error) {
                        if (error) {
                            Swal.fire(
                                'Error!',
                                'Your order detail can\'t be deleted.',
                                'error'
                            )
                        } else {
                            Swal.fire(
                                'Deleted!',
                                'Your order detail has been deleted.',
                                'success'
                            )
                        }
                    })

                }
            })
        }
        var deleteAction = (orderId, detailId, errorHandler) => {
            var deletePath = '{{ route('admin.order.detail.destroy', ['detail' => ':detail', 'order' => ':order']) }}'
            deletePath = deletePath.replace(':order', orderId).replace(':detail', detailId)

            $.ajax({
                url: deletePath,
                method: 'DELETE',
                success: function(data) {
                    $('#total_payment').val(data.data.order.pay_amount.toLocaleString())
                    $('#quantity').val(data.data.order.quantity.toLocaleString())
                    table.draw();
                    errorHandler(null)
                },
                error: function(jqXHR, textStatus, errorThrown) {
                    errorHandler(errorThrown)
                }
            })
        }
        /* Berkaitan Modal Delete Order Detail*/

        $(document).ready(() => {

            table = $('.datatables-target-exec').DataTable({
                processing: true,
                serverSide: true,
                ajax: "{{ route('admin.order.detail.index', ['order' => $order->id]) }}",
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                        orderable: false,
                        sortable: false,
                        searchable: false
                    },
                    {
                        data: 'product.name',
                        name: 'product.name'
                    },
                    {
                        data: 'product.price',
                        name: 'product.price'
                    },
                    {
                        data: 'quantity',
                        name: 'quantity'
                    },
                    {
                        data: 'sub_total',
                        name: 'sub_total',
                        render: function(data, type, row, meta) {
                            var price = parseFloat(row.product.price);
                            var quantity = parseFloat(row.quantity);
                            var subtotal = price * quantity;
                            return subtotal.toLocaleString();
                        }
                    },
                    {
                        data: 'note',
                        name: 'note'
                    },
                    @if (!in_array($order->status, ['CANCEL', 'COMPLETE']))
                        {
                            data: 'action',
                            name: 'action',
                            orderable: true,
                            searchable: true
                        }
                    @endif
                ],
                columnDefs: [{
                    targets: 2,
                    render: $.fn.dataTable.render.number(',', '.', 0, '')
                }],
            });
        })
    </script>

@endsection
