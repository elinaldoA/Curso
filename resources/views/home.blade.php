@extends('layouts.admin')

@section('main-content')
    <!-- Page Heading -->
    <h1 class="h3 mb-4 text-gray-800">{{ __('Dashboard') }}</h1>

    @if (session('success'))
        <div class="alert alert-success border-left-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-success border-left-success" role="alert">
            {{ session('status') }}
        </div>
    @endif
    <!--Gastos-->
    <div class="row">
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">{{ __('Gastos Diário') }}
                                @php
                                    $total = 0;
                                    $hoje = date('d/m/Y');
                                @endphp
                                @foreach ($contas as $conta)
                                    @if (date('d/m/Y', strtotime($conta->created_at)) == $hoje)
                                        @if(Auth::user()->id == $conta->user_id)
                                            <?php $total += $conta->valor; ?>
                                        @endif
                                    @endif
                                @endforeach
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ 'R$ ' . number_format($total, 2, ',', '.') }}
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-coins fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">{{ __('Gastos Mensal') }}
                                @php
                                    $total = 0;
                                    $mes = date('m/Y');
                                @endphp
                                @foreach ($contas as $conta)
                                    @if (date('m/Y', strtotime($conta->created_at)) == $mes)
                                    @if(Auth::user()->id == $conta->user_id)
                                        <?php $total += $conta->valor; ?>
                                    @endif
                                    @endif
                                @endforeach
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ 'R$ ' . number_format($total, 2, ',', '.') }}
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-coins fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">{{ __('Gastos Anual') }}
                                @php
                                    $total = 0;
                                    $ano = date('Y');
                                @endphp
                                @foreach ($contas as $conta)
                                    @if (date('Y', strtotime($conta->created_at)) === $ano)
                                    @if(Auth::user()->id == $conta->user_id)
                                        <?php $total += $conta->valor; ?>
                                    @endif
                                    @endif
                                @endforeach
                                <div class="h5 mb-0 font-weight-bold text-gray-800">
                                    {{ 'R$ ' . number_format($total, 2, ',', '.') }}
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-coins fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <!-- Situação da conta -->
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">{{ __('Pagos') }}</div>
                            @php
                                $paga = 0;
                                $pendente = 0;
                                $cancelada = 0;
                            @endphp
                            @foreach ($contas as $conta)
                            @if(Auth::user()->id == $conta->user_id)
                                @if ($conta->situacao_conta_id == 1)
                                <?php $paga += 1; ?>
                                @endif
                                @if ($conta->situacao_conta_id == 2)
                                    <?php $pendente += 1; ?>
                                @endif
                                @if ($conta->situacao_conta_id == 3)
                                    <?php $cancelada += 1; ?>
                                @endif
                            @endif
                            @endforeach
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $paga }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-coins fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-danger shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">{{ __('Pendentes') }}
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $pendente }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-coins fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">{{ __('Cancelados') }}
                            </div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">
                                {{ $cancelada }}
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-coins fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @php
            $credito = 0;
            $emprestimo = 0;
            $condominio = 0;
            $financiamento = 0;
            $seguro = 0;
            $streaming = 0;
            $lazer = 0;
            $saude = 0;
        @endphp
        @foreach ($contas as $conta)
        
        @if(Auth::user()->id == $conta->user_id)
            @if ($conta->categoria_id == 1)
                <script>
                    function update() {
                        var element = document.getElementById("credito");
                        var width = 1;
                        var identity = setInterval(scene, 10);

                        function scene() {
                            if (width >= 100) {
                                clearInterval(identity);
                            } else {
                                width++;
                                element.style.width = width + '%';
                                element.innerHTML = width * <?php $credito += 5; ?> + '%';
                            }
                        }
                    }
                </script>
            @endif
            @if ($conta->categoria_id == 2)
                <script>
                    function update() {
                        var element = document.getElementById("emprestimo");
                        var width = 1;
                        var identity = setInterval(scene, 10);

                        function scene() {
                            if (width >= 100) {
                                clearInterval(identity);
                            } else {
                                width++;
                                element.style.width = width + '%';
                                element.innerHTML = width * <?php $emprestimo += 5; ?> + '%';
                            }
                        }
                    }
                </script>
            @endif
            @if ($conta->categoria_id == 3)
                <script>
                    function update() {
                        var element = document.getElementById("condominio");
                        var width = 1;
                        var identity = setInterval(scene, 10);

                        function scene() {
                            if (width >= 100) {
                                clearInterval(identity);
                            } else {
                                width++;
                                element.style.width = width + '%';
                                element.innerHTML = width * <?php $condominio += 5; ?> + '%';
                            }
                        }
                    }
                </script>
            @endif
            @if ($conta->categoria_id == 4)
                <script>
                    function update() {
                        var element = document.getElementById("financiamento");
                        var width = 1;
                        var identity = setInterval(scene, 10);

                        function scene() {
                            if (width >= 100) {
                                clearInterval(identity);
                            } else {
                                width++;
                                element.style.width = width + '%';
                                element.innerHTML = width * <?php $financiamento += 5; ?> + '%';
                            }
                        }
                    }
                </script>
            @endif
            @if ($conta->categoria_id == 5)
                <script>
                    function update() {
                        var element = document.getElementById("seguro");
                        var width = 1;
                        var identity = setInterval(scene, 10);

                        function scene() {
                            if (width >= 100) {
                                clearInterval(identity);
                            } else {
                                width++;
                                element.style.width = width + '%';
                                element.innerHTML = width * <?php $seguro += 5; ?> + '%';
                            }
                        }
                    }
                </script>
            @endif
            @if ($conta->categoria_id == 6)
                <script>
                    function update() {
                        var element = document.getElementById("streaming");
                        var width = 1;
                        var identity = setInterval(scene, 10);

                        function scene() {
                            if (width >= 100) {
                                clearInterval(identity);
                            } else {
                                width++;
                                element.style.width = width + '%';
                                element.innerHTML = width * <?php $streaming += 5; ?> + '%';
                            }
                        }
                    }
                </script>
            @endif
            @if ($conta->categoria_id == 7)
                <script>
                    function update() {
                        var element = document.getElementById("lazer");
                        var width = 1;
                        var identity = setInterval(scene, 10);

                        function scene() {
                            if (width >= 100) {
                                clearInterval(identity);
                            } else {
                                width++;
                                element.style.width = width + '%';
                                element.innerHTML = width * <?php $lazer += 5; ?> + '%';
                            }
                        }
                    }
                </script>
            @endif
            @if ($conta->categoria_id == 8)
                <script>
                    function update() {
                        var element = document.getElementById("saude");
                        var width = 1;
                        var identity = setInterval(scene, 10);

                        function scene() {
                            if (width >= 100) {
                                clearInterval(identity);
                            } else {
                                width++;
                                element.style.width = width + '%';
                                element.innerHTML = width * <?php $saude += 5; ?> + '%';
                            }
                        }
                    }
                </script>
                @endif
            @endif
        @endforeach
        <div class="col-lg-12 mb-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Categorias</h6>
                </div>
                <div class="card-body">
                    @foreach ($categorias as $categoria)
                        @if ($categoria->id == 1)
                            <p>{{ $categoria->descricao }}</p>
                        @endif
                    @endforeach
                    <h4 class="small font-weight-bold"> <span class="float-right">{{ $credito }}%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-info" id="credito" role="progressbar"
                            style="width: {{ $credito }}%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                        </div>
                    </div>
                    @foreach ($categorias as $categoria)
                        @if ($categoria->id == 2)
                            <p>{{ $categoria->descricao }}</p>
                        @endif
                    @endforeach
                    <h4 class="small font-weight-bold"> <span class="float-right">{{ $emprestimo }}%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-info" id="emprestimo" role="progressbar"
                            style="width: {{ $emprestimo }}%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                        </div>
                    </div>
                    @foreach ($categorias as $categoria)
                        @if ($categoria->id == 3)
                            <p>{{ $categoria->descricao }}</p>
                        @endif
                    @endforeach
                    <h4 class="small font-weight-bold"> <span class="float-right">{{ $condominio }}%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-info" id="emprestimo" role="progressbar"
                            style="width: {{ $condominio }}%" aria-valuenow="20" aria-valuemin="0" aria-valuemax="100">
                        </div>
                    </div>
                    @foreach ($categorias as $categoria)
                        @if ($categoria->id == 4)
                            <p>{{ $categoria->descricao }}</p>
                        @endif
                    @endforeach
                    <h4 class="small font-weight-bold"> <span class="float-right">{{ $financiamento }}%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-info" id="emprestimo" role="progressbar"
                            style="width: {{ $financiamento }}%" aria-valuenow="20" aria-valuemin="0"
                            aria-valuemax="100">
                        </div>
                    </div>
                    @foreach ($categorias as $categoria)
                        @if ($categoria->id == 5)
                            <p>{{ $categoria->descricao }}</p>
                        @endif
                    @endforeach
                    <h4 class="small font-weight-bold"> <span class="float-right">{{ $seguro }}%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-info" id="emprestimo" role="progressbar"
                            style="width: {{ $seguro }}%" aria-valuenow="20" aria-valuemin="0"
                            aria-valuemax="100">
                        </div>
                    </div>
                    @foreach ($categorias as $categoria)
                        @if ($categoria->id == 6)
                            <p>{{ $categoria->descricao }}</p>
                        @endif
                    @endforeach
                    <h4 class="small font-weight-bold"> <span class="float-right">{{ $streaming }}%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-info" id="emprestimo" role="progressbar"
                            style="width: {{ $streaming }}%" aria-valuenow="20" aria-valuemin="0"
                            aria-valuemax="100">
                        </div>
                    </div>
                    @foreach ($categorias as $categoria)
                        @if ($categoria->id == 7)
                            <p>{{ $categoria->descricao }}</p>
                        @endif
                    @endforeach
                    <h4 class="small font-weight-bold"> <span class="float-right">{{ $lazer }}%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-info" id="emprestimo" role="progressbar"
                            style="width: {{ $lazer }}%" aria-valuenow="20" aria-valuemin="0"
                            aria-valuemax="100">
                        </div>
                    </div>
                    @foreach ($categorias as $categoria)
                        @if ($categoria->id == 8)
                            <p>{{ $categoria->descricao }}</p>
                        @endif
                    @endforeach
                    <h4 class="small font-weight-bold"> <span class="float-right">{{ $saude }}%</span></h4>
                    <div class="progress mb-4">
                        <div class="progress-bar bg-info" id="emprestimo" role="progressbar"
                            style="width: {{ $saude }}%" aria-valuenow="20" aria-valuemin="0"
                            aria-valuemax="100">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
