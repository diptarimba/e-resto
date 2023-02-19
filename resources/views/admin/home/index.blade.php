@extends('layouts.admin.master')

@section('title', 'Home')

@section('header')

@endsection

@section('body')
<x-layoutDashboard>
    <div class="col-12">
        <div class="card">
            <div class="card-body text-center">
                <span class="h4">Statistik (Total)</span>
            </div>
        </div>
    </div>
    <x-card.card-statistic text="Penjualan" value="{{$sales}}" unit="Transaksi"/>
    <x-card.card-statistic text="Customer" value="{{$customer}}" unit="Orang"/>
    <x-card.card-statistic text="Produk" value="{{$product}}" unit="Unit"/>
    <x-card.card-statistic text="Meja" value="{{$table}}" unit="Unit"/>
    <x-card.card-statistic text="Metode Pembayaran" value="{{$payment}}" unit="Metode"/>
</x-layoutDashboard>
@endsection

@section('footer')
@endsection
