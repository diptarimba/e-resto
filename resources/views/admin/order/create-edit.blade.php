@extends('layouts.admin.master')

@section('title', 'Order')

@section('header')

@endsection

@section('body')
    <x-layoutContent Heading="Order" mainTitle="Order" subTitle="Index" half="1">
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
                    <x-forms.input required="" label="Customer" name="order_number" :value="@$order->customer->name" />
                    <x-forms.input required="" label="Table" name="table" :value="@$order->table->name" />
                    <x-forms.input required="" label="Quantity" name="quantity" :value="@$order->quantity" />
                    <x-forms.input required="" label="Order Number" name="order_number" :value="@$order->order_number" />
                    <x-forms.select label="Payment Method" name="payment_id" :items="$payment" :value="@$order->payment_id" />
                    <x-forms.input required="" label="Total Payment" name="total_payment" :value="@$order->pay_amount" />
                </form>
                <x-action.cancel />
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
    </x-layoutContent>
@endsection

@section('footer')
    <script>
        $('select').on('change', function() {
            var dataToSend = {
                payment_id: $(this).val()
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

@endsection
