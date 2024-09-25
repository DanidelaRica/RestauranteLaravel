@extends('template')

@section('css')

@endsection

@section('title', "Restaurante | Perfil")

@section('content')

    <div class="row pt-3">
        <div class="col">
            <h1 class="h2 mb-0">Perfil</h1>
            <hr class="hr-title" align="left">
        </div>
    </div>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="card">
            <div class="card-body">
                <div class="row form-row">
                    <div class="form-group col-6">
                        <label for="exampleInputName">Nombre</label>
                        <input type="text" class="form-control" id="exampleInputName" name="name" placeholder="Nombre" value="{{ Auth::user()->name }}" disabled>
                    </div>
                    <div class="form-group col-6">
                        <label for="email">Dirección de correo</label>
                        <input type="email" class="form-control" id="email" name="email" placeholder="Email" value="{{ Auth::user()->email }}" disabled>
                    </div>
                </div>
                <form action="{{ route('profile.edit') }}" method="post">
                    {{ csrf_field() }}
                    <div class="row form-row">
                        <div class="form-group col">
                            <label for="passwordNew">Contraseña</label>
                            <input type="password" class="form-control" id="passwordNew" name="passwordNew" placeholder="Nueva Contraseña">
                        </div>
                        <div class="form-group col">
                            <label for="passwordNewConfirm">Contraseña</label>
                            <input type="password" class="form-control" id="passwordNewConfirm" name="passwordNewConfirm" placeholder="Confirmar Contraseña">
                        </div>
                    </div>
                    <div class="text-center mt-4 mb-1">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>

                <div class="row">
                    <div class="col">
                        <h4>Tus tarjetas</h4>
                        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#createModal">
                            Nueva tarjeta
                        </button>
                        @php $creditCards = Auth::user()->creditCards()->get(); @endphp
                        @if (count($creditCards) > 0)
                            <div class="table-responsive">
                                <table class="table table-striped table-sm" id="myTable">
                                    <thead>
                                        <tr class="tr-header">
                                            <th class="dt-head-center">Tarjeta</th>
                                            <th class="dt-head-center">Mes expiración</th>
                                            <th class="dt-head-center">Año expiración</th>
                                            <th class="dt-head-center">CVV</th>
                                            <th class="dt-head-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($creditCards as $card)
                                            <tr class="tr-row">
                                                <td class="dt-body-left">
                                                    {{ $card->num_card }}
                                                </td>
                                                <td class="dt-body-left">
                                                    {{ $card->expire_month }}
                                                </td>
                                                <td class="dt-body-left">
                                                    {{ $card->expire_year }}
                                                </td>
                                                <td class="dt-body-left">
                                                    {{ $card->cvv }}
                                                </td>
                                                <td class="dt-body-left">
                                                    <form action="{{ route('cards.destroy', $card->num_card) }}" method="post">
                                                        {{ csrf_field() }}
                                                        {{ method_field('delete') }}
                                                        <button type="submit" class="btn btn-danger">
                                                            Eliminar tarjeta
                                                        </button>
                                                    </form>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        @else
                            <div class="card">
                                <div class="card-body text-center">
                                    <p><b>No hay datos</b></p>
                                </div>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
<div class="modal fade modal-core" id="createModal" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title text" id="trainerModalLabel">Nueva reserva</h5>
            </div>
            <div class="modal-body">
                <div id="booking-response"></div>
                <form class="form-core" method="post" action="{{ route('cards.create') }}">
                    {{ csrf_field() }}
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="num_card">Tarjeta crédito</label>
                            <input type="text" pattern="\d{16}$" id="num_card" name="num_card" class="form-control" required="required" />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="expire_month">Mes expiración</label>
                            <input type="number" min="1" max="12" id="expire_month" name="expire_month" class="form-control" required="required" />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="expire_year">Año expiración</label>
                            <input type="number" min="23" max="99" id="expire_year" name="expire_year" class="form-control" required="required" />
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col">
                            <label for="cvv">CVV</label>
                            <input type="text" id="cvv" name="cvv" class="form-control" required="required" pattern="\d{3}$" title="Por favor ingrese un número de 3 cifras entre 000 y 999." />
                        </div>
                    </div>
                    <div class="text-center mt-4 mb-1">
                        <button type="submit" class="btn btn-action">Añadir</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection

