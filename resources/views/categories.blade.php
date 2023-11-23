@extends('layout/header')
@section('content-style')
    <link rel="stylesheet" href="{{ asset('css/categories.css') }}">
@endsection
@section('sidebar')
    @include('layout/sidebar')
@endsection
@section('content')
    <div class="content">
        <h1 class="text-uppercase titulo my-4">Categorias</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nome</th>
                    <th scope="col">Descrição</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $category)
                    <tr>
                        <td>{{ $category['id'] }}</td>
                        <td>{{ $category['name'] }}</td>
                        <td>{{ $category['description'] }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection

@section('footer')
    @include('layout/footer')
@endsection