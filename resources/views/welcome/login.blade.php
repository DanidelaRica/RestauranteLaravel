@extends('template')

@section('title', "Restaurante | Login")

@section('content')
    <div class="container-xxl py-5">
        <div class="container">
            <div class="row g-5 align-items-center text-center">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <h6>Por favor corrige los siguiente errores:</h6>
                        <ul>
                            @foreach($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="col-6 offset-3">
                    <form
                    class="w-100 rounded-1 p-4 border bg-white"
                    id="loginform"
                    method="post"
                    action="{{ route('user.dologin') }}"
                >
                    {{ csrf_field() }}
                    <input
                    type="email"
                    class="form-control mb-2"
                    name="email"
                    placeholder="Email"
                    aria-label="Email"
                    aria-describedby="basic-addon1"
                    required autofocus
                />
                <input
                                    type="password"
                                    name="password"
                                    class="form-control mb-2"
                                    placeholder="Contraseña"
                                    aria-label="Contraseña"
                                    aria-describedby="basic-addon1"
                                    required
                                />
                                <button
                                        class="btn btn-success"
                                        type="submit"
                                    >
                                        Login
                                    </button>
                </form>
                </div>
            </div>
        </div>
    </div>
@endsection
