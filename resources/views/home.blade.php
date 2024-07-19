@extends('layouts/app')
{{-- <!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])

    <style>
        .bg01 {background: url(/public/img/30109534_m.jpg) no-repeat bottom left / contain;}
    </style>

</head> --}}

{{-- @section('content') --}}
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <h1>todoリスト</h1>


                <p class="fs-1">@foreach ($memos as $me)
                    <a href = "/edit/{{ $me["id"] }}">{{ $me->content }}<br/></a>
                    @endforeach</p>



                      <a class="btn btn-outline-info fs-3 w-25" href = "{{ route("create") }}">新規作成</a>


            </div>
        </div>
    </div>
</div> --}}

@section('content')
<div class="card text-bg-dark">
    <img src="{{ asset('/storage/30109534_m.jpg')}}" class="card-img opacity-25 .img-fluid" alt="画像">
    <div class="card-img-overlay">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card bg-transparent">
                    <h1 class="card-header text-white">todoリスト</h1>
                    <div class="card-body">
                      <h1 class="card-text text-dark">
                        @foreach ($memos as $me)
                        <a href = "/edit/{{ $me["id"] }}">{{ $me->content }}<br/></a>
                        @endforeach</h1>
                      <a href="{{ route("create") }}" class="btn btn-outline-info fs-3 w-25">新規作成</a>
                    </div>
                  </div>


                </div>
            </div>
        </div>
    </div>
</div>
@endsection
