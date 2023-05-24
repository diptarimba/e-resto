@extends('layouts.admin.master')

@section('title', 'Home')

@section('header')

@endsection

@section('body')
    <x-layoutDashboard>
        <div class="col-12">
            <div class="card">
                <div class="card-body text-center">
                    <span class="h4">Financial Statistic</span>
                </div>
            </div>
        </div>
        <x-card.card-statistic text="Sales All Time" value="{{ number_format($salesAllTime, 0, ',', '.') }}" unit="Rupiah" />
        <x-card.card-statistic text="Sales Today" value="{{ number_format($salesToday, 0, ',', '.') }}" unit="Rupiah" />
        <x-card.card-statistic text="Revenue All Time" value="{{ number_format($revenueAllTime, 0, ',', '.') }}"
            unit="Rupiah" />
        <x-card.card-statistic text="Revenue Today" value="{{ number_format($revenueToday, 0, ',', '.') }}"
            unit="Rupiah" />
        <x-card.card-statistic text="Transaction" value="{{ number_format($sales, 0, ',', '.') }}" unit="Trx" />
        <div class="col-12">
            <div class="card">
                <div class="card-body text-center">
                    <span class="h4">Master Data Statistic</span>
                </div>
            </div>
        </div>
        <x-card.card-statistic text="Customer" value="{{ $customer }}" unit="Orang" />
        <x-card.card-statistic text="Product" value="{{ $product }}" unit="Unit" />
        <x-card.card-statistic text="Table" value="{{ $table }}" unit="Unit" />
    </x-layoutDashboard>
@endsection

@section('footer')
@endsection
