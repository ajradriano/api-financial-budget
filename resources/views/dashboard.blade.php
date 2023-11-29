@extends('layout/header')
@section('content-style')
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
@endsection
@section('sidebar')
    @include('layout/sidebar')
@endsection

@section('content')
    <div class="content">
        Dashboard Works!
    </div>
@endsection
<script>
</script>
@section('footer')
    @include('layout/footer')
@endsection