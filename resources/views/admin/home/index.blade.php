@extends('layouts.admin.master')

@section('title', 'Home')

@section('header')

@endsection

@section('body')
<x-layoutDashboard>
    <div class="col-12">
        <div class="card">
            <div class="card-body text-center">
                <span class="h4">Statistik Penjualan</span>
            </div>
        </div>
    </div>
    <x-card.card-statistic text="Total Penjualan" value="{{$sales}}"/>
</x-layoutDashboard>
@endsection

@section('footer')
<script>

</script>
@endsection
