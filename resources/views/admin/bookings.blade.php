@extends('template')

@section('css')

@endsection

@section('title', 'Restaurante | Dashboard')

@section('content')

    <main role="main" id="contenido">
        <div class="row">
            <div class="col-lg-12 col-md-12">
                <div class="row pt-3">
                    <div class="col">
                        <h1 class="h2 mb-0">Bienvenid@ {{ Auth::user()->name }}</h1>
                        <hr class="hr-title" align="left">
                    </div>
                </div>
                @if (session()->has('result'))
                <div class="row">
                    <div class="col" id="result-div">
                        <p>{{ session()->get('result') }}</p>
                    </div>
                </div>
                @endif
                <div class="row">
                    <div class="col">
                        <h4>Reservas</h4>
                        @if (count($bookings) > 0)
                            <div class="table-responsive">
                                <table class="table table-striped table-sm" id="myTable">
                                    <thead>
                                        <tr class="tr-header">
                                            <th class="dt-head-center">Fecha</th>
                                            <th class="dt-head-center">Menú</th>
                                            <th class="dt-head-center">Precio</th>
                                            <th class="dt-head-center">Asientos mesa</th>
                                            <th class="dt-head-center">Tarjeta crédito</th>
                                            <th class="dt-head-center">Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($bookings as $booking)
                                            <tr class="tr-row">
                                                <td class="dt-body-left">
                                                    {{ \Carbon\Carbon::parse($booking->date)->format('d-m-Y') }}
                                                    <br />
                                                    {{ \Carbon\Carbon::parse($booking->time)->format('H:i') }}
                                                </td>
                                                <td class="dt-body-left">
                                                    {{ $booking->menu->name }}
                                                </td>
                                                <td class="dt-body-left">
                                                    {{ $booking->menu->prize }}
                                                </td>
                                                <td class="dt-body-left">
                                                    {{ $booking->table->seats }}
                                                </td>
                                                <td class="dt-body-left">
                                                    {{ $booking->creditCard->num_card }}
                                                </td>
                                                <td class="dt-body-left">
                                                    <form action="{{ route('booking.destroy', $booking) }}" method="post">
                                                        {{ csrf_field() }}
                                                        {{ method_field('delete') }}
                                                        <button type="submit" class="btn btn-danger">
                                                            Cancelar reserva
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
    </main>
@endsection
