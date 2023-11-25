@extends('layout/header')
@section('content-style')
    <link rel="stylesheet" href="{{ asset('css/movements.css') }}">
@endsection
@section('sidebar')
    @include('layout/sidebar')
@endsection
@section('content')
    <div class="content">
        <h1 class="text-uppercase titulo my-4">Movimentações</h1>
        
        <div class="header mb-2">
            <button id="menuBotao" 
                type="button" 
                class="btn btn-outline-primary" 
                data-bs-toggle="tooltip" 
                data-bs-placement="top" 
                title="Adicionar Novo Registro"
                onclick="redirecionarParaCadastro()">
                <i class="fa-solid fa-plus"></i>
            </button>
        </div>
        
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col" colspan="2"></th>
                    <th scope="col">Categoria</th>
                    <th scope="col">Tipo</th>
                    <th scope="col">Descrição</th>
                    <th scope="col">Valor</th>
                    <th scope="col">Método Pagamento</th>
                    <th scope="col">Data Vecimento</th>
                    <th scope="col">Data Pagamento</th>
                </tr>
            </thead>
            <tbody>
                @foreach($data as $paymentMethod)
                    <tr>
                        <td class="table-icons icon-add">
                            <i class="fa-solid fa-pencil" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar"></i>
                        </td>
                        <td class="table-icons icon-delete">
                            <i class="fa-solid fa-trash-can" data-bs-toggle="tooltip" data-bs-placement="top" title="Remover"></i>
                        </td>
                        <td>{{ $paymentMethod['category']['name'] }}</td>
                        <td>{{ $paymentMethod['type']['name'] }}</td>
                        <td>{{ $paymentMethod['description'] }}</td>
                        <td>{{ \App\Utils\Utils::formatCurrency($paymentMethod['value']) }}</td>
                        <td>{{ $paymentMethod['payment_method']['name'] }}</td>
                        <td>{{ \App\Utils\Utils::formatDate($paymentMethod['due_date']) }}</td>
                        <td>{{ $paymentMethod['payment_date'] ? \App\Utils\Utils::formatDate($paymentMethod['payment_date']) : ''}}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
<script>
        function redirecionarParaCadastro() {
        // Substitua 'URL_DA_TELA_DE_CADASTRO' pelo URL real da tela de cadastro
        let url = "{{ url('movimentacoes/cadastro') }}"
        window.location.href = url;
    }
</script>
@section('footer')
    @include('layout/footer')
@endsection