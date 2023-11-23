@extends('layout/header')
@section('content-style')
    <link rel="stylesheet" href="{{ asset('css/movement-registration.css') }}">
@endsection
@section('sidebar')
    @include('layout/sidebar')
@endsection

@section('content')
    <div class="content">
        <h1 class="text-uppercase titulo my-4">Movimentação</h1>

        <form>
            <div class="row">
                <div class="col-lg-4">
                    <label for="input-type" class="form-label">Tipo</label>
                    <select class="form-select mb-3" id="input-type" aria-label="Default select example">
                        <option selected>Selecione</option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-4">
                    <label for="input-category" class="form-label">Categoria</label>
                    <select class="form-select mb-3" id="input-category" aria-label="Default select example">
                        <option selected>Selecione</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-4">
                    <label for="input-payment-method" class="form-label">Método de Pagamento</label>
                    <select class="form-select mb-3" id="input-payment-method" aria-label="Default select example">
                        <option selected>Selecione</option>
                        @foreach ($paymentMethods as $paymentMethod)
                            <option value="{{ $paymentMethod->id }}">{{ $paymentMethod->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 mb-3">
                    <label for="input-description" class="form-label">Descrição</label>
                    <input type="text" class="form-control" id="input-description" placeholder="Digite uma descrição">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4 mb-3">
                    <label for="input-value" class="form-label">Valor</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">R$</span>
                        <input type="text" class="form-control" id="input-value" aria-label="Valor" placeholder="123,45">
                    </div>
                </div>
                <div class="col-lg-4 mb-3">
                    <label for="input-due-date" class="form-label">Vencimento</label>
                    <div class="input-group flex-nowrap mb-3">
                        <span class="input-group-text" id="addon-wrapping">
                            <i class="fa-solid fa-calendar-day"></i>
                        </span>
                        <input type="text" class="form-control datepicker" id="input-due-date" placeholder="Selecione a Data" aria-label="Vencimento" aria-describedby="addon-wrapping">
                    </div>
                </div>
                <div class="col-lg-4 mb-3">
                    <label for="input-payment-date" class="form-label">Pagamento</label>
                    <div class="input-group flex-nowrap mb-3">
                        <span class="input-group-text" id="addon-wrapping">
                            <i class="fa-solid fa-calendar-check"></i>
                        </span>
                        <input type="text" class="form-control datepicker" id="input-payment-date" placeholder="Selecione a Data" aria-label="Pagamento" aria-describedby="addon-wrapping">
                    </div>
                </div>
            </div>

            <div class="form-check d-flex align-items-center mb-3">
                <input class="form-check-input me-3" type="checkbox" value="" id="check-installments">
                <label class="form-check-label" for="check-installments">
                    Pagamento Parcelado
                </label>
            </div>
            <div class="mb-3">
                <label for="input-installments" class="form-label">
                    Parcelamento
                    <i class="fa-solid fa-circle-question" data-bs-toggle="tooltip" data-bs-placement="top"  title="A quantidade de parcelas para este registro fará com que sejam gerados registro iguais a este"></i>
                </label>
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class="fa-solid fa-xmark"></i>
                    </span>
                    <input type="number" class="form-control" id="input-installments" aria-label="Parcelas" placeholder="10">
                </div>
            </div>
            <div class="mb-3">
                <label for="input-installments-interval" class="form-label">
                    Intervalo
                    <i class="fa-solid fa-circle-question" data-bs-toggle="tooltip" data-bs-placement="top"  title="O intervalo entre 2 parcelas, em dias. Ex: 30 dias indica que a data de vencimento será a cada 30 dias."></i>
                </label>
                <div class="input-group mb-3">
                    <span class="input-group-text">
                        <i class="fa-solid fa-calendar-days"></i>
                    </span>
                    <input type="number" class="form-control" id="input-installments-interval" aria-label="Intervalo" placeholder="dias">
                </div>
            </div>
        </form>
        
        <div class="div-btn d-flex align-items-center justify-content-end">
            <div class="header mx-2 mb-2">
                <button id="btnCancel" 
                    type="button" 
                    class="btn btn-outline-danger" 
                    data-bs-toggle="tooltip" 
                    data-bs-placement="top" 
                    title="Cancelar"
                    onclick="redirectToList()">
                    <i class="fa-solid fa-xmark"></i> Cancelar
                </button>
            </div>
            
            <div class="header mb-2">
                <button id="btnSave" 
                    type="button" 
                    class="btn btn-outline-success" 
                    data-bs-toggle="tooltip" 
                    data-bs-placement="top" 
                    title="Salvar"
                    onclick="save()">
                    <i class="fa-solid fa-xmark"></i> Salvar
                </button>
            </div>
        </div>
        
    </div>
    <script>
        function redirectToList() {
            let url = "{{ url('movimentacoes') }}"
            window.location.href = url;
        }
        function save() {
            let url = "{{ url('movimentacoes') }}"
            window.location.href = url;
        }
        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
            // startDate: '-3d'
        });
    </script>
@endsection
@section('footer')
    @include('layout/footer')
@endsection