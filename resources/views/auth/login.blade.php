@extends('layouts.master')

@section('header')
<style>
    .melayang {
        z-index: 10;
        position: absolute;
    }


    .containercuy:hover .event-image,
    .containercuy:active .event-image {
        -webkit-filter: brightness(50%);
        filter: brightness(50%)
    }

    .containercuy:hover .text-detail-event,
    .containercuy:active .text-detail-event {
        color: white;
    }

    .event-image {
        -webkit-transition: all 300ms ease;
        transition: all 300ms ease;
    }

    .event-image:active {
        -webkit-filter: brightness(50%);
        filter: brightness(50%)
    }

</style>
@endsection

@section('body')
<div class="container vh-100">
    <p class="h3 pt-5 text-center">Login Page</p>
    <div class="col-12">
        <x-flash />
    </div>
    <form class="" action="{{route('login.post')}}" method="post">
        @csrf
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
            <input name="username" type="email" class="form-control" id="exampleInputEmail1"
                aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input name="password" type="password" class="form-control" id="exampleInputPassword1">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
