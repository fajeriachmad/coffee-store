@extends('layouts.guest.main')

@section('section')
    @include('partials.guest.home')
    @include('partials.guest.about')
    @include('partials.guest.products')
    {{-- @include('partials.guest.gallery') --}}
    @include('partials.guest.review')
    @include('partials.guest.blog')
    @include('partials.guest.footer')
@endsection
