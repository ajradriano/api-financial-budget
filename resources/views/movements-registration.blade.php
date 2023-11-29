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

        <form id="form-movement">
            <div class="row">
                <div class="col-lg-4 mb-3">
                    <label for="input-description" class="form-label">Descrição</label>
                    <input type="text" class="form-control" id="input-description" placeholder="Digite a descrição" required>
                </div>
                <div class="col-lg-2 mb-3">
                    <label for="input-value" class="form-label">Valor</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">R$</span>
                        <input type="decimal" class="form-control" id="input-value" aria-label="Valor" placeholder="Digite o valor" required>
                    </div>
                </div>
                <div class="col-lg-2 mb-3">
                    <label for="input-due-date" class="form-label">Vencimento</label>
                    <div class="input-group flex-nowrap mb-3">
                        <span class="input-group-text" id="addon-wrapping">
                            <i class="fa-solid fa-calendar-day"></i>
                        </span>
                        <input type="text" class="form-control datepicker" id="input-due-date" placeholder="Selecione a Data" aria-label="Vencimento" aria-describedby="addon-wrapping" required>
                    </div>
                </div>
                <div class="col-lg-2 mb-3">
                    <label for="input-payment-date" class="form-label">Pagamento</label>
                    <div class="input-group flex-nowrap mb-3">
                        <span class="input-group-text" id="addon-wrapping">
                            <i class="fa-solid fa-calendar-check"></i>
                        </span>
                        <input type="text" class="form-control datepicker" id="input-payment-date" placeholder="Selecione a Data" aria-label="Pagamento" aria-describedby="addon-wrapping">
                    </div>
                </div>
            </div>
            
            <div class="row">
                <div class="col-lg-2">
                    <label for="input-type" class="form-label">Tipo</label>
                    <select class="form-select mb-3" id="input-type" aria-label="Default select example" required>
                        <option value="" selected>Selecione</option>
                        @foreach ($types as $type)
                            <option value="{{ $type->id }}">{{ $type->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-2">
                    <label for="input-category" class="form-label">Categoria</label>
                    <select class="form-select mb-3" id="input-category" aria-label="Default select example" required>
                        <option value="" selected>Selecione</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="col-lg-2">
                    <label for="input-payment-method" class="form-label">Método de Pagamento</label>
                    <select class="form-select mb-3" id="input-payment-method" aria-label="Default select example" required>
                        <option value="" selected>Selecione</option>
                        @foreach ($paymentMethods as $paymentMethod)
                            <option value="{{ $paymentMethod->id }}">{{ $paymentMethod->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-check d-flex align-items-center mt-4 mb-3">
                <input class="form-check-input me-3" type="checkbox" value="" id="check-installments">
                <label class="form-check-label" for="check-installments">
                    Pagamento Parcelado
                    <i class="fa-solid fa-circle-question"
                        data-bs-toggle="tooltip" 
                        data-bs-placement="top"
                        title="Indicar que esta movimentação vai acontecer duas ou mais vezes.">
                    </i>
                </label>
            </div>

            <div class="row" id="block-installments" style="display: none">
                <div class="col-lg-2 mb-3">
                    <label for="input-installments" class="form-label">
                        Parcelamento
                    </label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-xmark"></i>
                        </span>
                        <input type="number" class="form-control" id="input-installments" aria-label="Parcelas" min="2">
                    </div>
                </div>

                <div class="col-lg-2 mb-3">
                    <label for="input-installments-interval" class="form-label">
                        Intervalo
                        <i class="fa-solid fa-circle-question" 
                            data-bs-toggle="tooltip" 
                            data-bs-placement="top"
                            title="O intervalo entre as parcelas, em dias.">
                        </i>
                    </label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">
                            <i class="fa-solid fa-calendar-days"></i>
                        </span>
                        <input type="number" class="form-control" id="input-installments-interval" aria-label="Intervalo" placeholder="em dias">
                    </div>
                </div>
            </div>

        </form>

        <div class="row">
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
                        type="submit" 
                        class="btn btn-outline-success" 
                        data-bs-toggle="tooltip" 
                        data-bs-placement="top" 
                        title="Salvar">
                        <i class="fa-solid fa-floppy-disk"></i> Salvar
                    </button>
                </div>
                
            </div>
        </div>

    </div>
    <script>

        function redirectToList() {
            Swal.fire({
                title: 'Você tem certeza?',
                text: 'As alterações não salvas serão perdidas!',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sim, sair!',
                cancelButtonText: 'Cancelar',
            }).then((result) => {
                if (result.isConfirmed) {
                    // Lógica para excluir
                let url = "{{ url('movimentacoes') }}"
                    window.location.href = url; 
                }
            });            
        }

        $('.datepicker').datepicker({
            format: 'dd/mm/yyyy',
            clearBtn: true,
            language: "pt-BR",
            daysOfWeekHighlighted: "0,6",
            calendarWeeks: true,
            autoclose: true,
            todayHighlight: true
        });

        $(document).ready( function () {

            $("#btnSave").click(function () {
                let formData = {
                    user_id: '',
                    category_id: $('#input-category').val(),
                    type_id: $('#input-type').val(),
                    payment_method_id: $('#input-payment-method').val(),
                    description:$('#input-description').val() ,
                    value: $('#input-value').val(),
                    due_date: $('#input-due-date').val(),
                    payment_date: $('#input-payment-date').val(),
                }
                
                localStorage.setItem('formData', JSON.stringify(formData))
                console.log(formData)
                
                $.ajax({
                    url: '/api/movements',
                    type: 'POST',
                    contentType: 'application/json',
                    headers: {
                        'Authorization' : 'Bearer ' + sessionStorage.getItem('token')
                    },
                    data: JSON.stringify(formData),
                    success: function (data) {
                        console.log('Saved successfully')
                        // redirectToList();
                    },
                    error: function (error) {
                        console.error(error)
                        swalError(error.responseText)
                        var dataStorage = localStorage.getItem('formData');
                        if (dataStorage) {
                            dataStorage = JSON.parse(dataStorage);
                            $.each(dataStorage, function (field, value) {
                                $('[name="' + field + '"]').val(value);
                            });
                            localStorage.removeItem('formData');
                        }
                    }
                })
            })

            $("#check-installments").change(function () {
                if ($(this).is(":checked")) {
                    $("#block-installments").show();
                    $("#input-installments")
                        .prop('required', true)
                        .val('');
                    $("#input-installments-interval")
                        .prop('required', true)
                        .val('');
                } else {

                    $("#block-installments").hide();
                    $("#input-installments")
                        .prop('required', false)
                        .val('');
                    $("#input-installments-interval")
                        .prop('required', false)
                        .val('');
                }
            })
        })
    </script>
@endsection
@section('footer')
    @include('layout/footer')
@endsection