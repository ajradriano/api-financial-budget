@section('sidebar-style')
    <link rel="stylesheet" href="{{ asset('css/sidebar.css') }}">
@endsection
<div class="sidebar">
    <nav id="sidebar" class="col-md-3 col-lg-2 d-md-block sidebar">
        <div class="position-sticky">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('dashboard') }}">Início</a>
                </li>
                <li class="nav-item">
                    <span class="legend">Controle</span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('movimentacoes') }}">Movimentações</a>
                </li>
                <li class="nav-item">
                    <span class="legend">Referências</span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('categorias') }}">Categorias</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('metodos-pagamento') }}">Métodos de Pagamento</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('tipos-movimentacao') }}">Tipos de Movimentação</a>
                </li>
                <li class="nav-item">
                    <span class="legend">Configuração</span>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('usuarios') }}">Usuários</a>
                </li>
            </ul>
        </div>
    </nav>
</div>
