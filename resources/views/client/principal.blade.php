@extends('client.layouts/principal')

@section('title', 'Pagina Principal Samyss')

@section('content')
    @include('client.layouts.navbar')
    @include('client.layouts.slider')
    @include('client.layouts.product')
    @include('client.layouts.banner')
    @include('client.layouts.suscripcion')
@endsection
