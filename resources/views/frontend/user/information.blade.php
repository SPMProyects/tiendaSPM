@extends('frontend.layout.layout')

@section('content')

<div class="row justify-content-center">

    <div class="container margin_60">
        <div class="main_title">
            <h2>Tus datos</h2>
            <p>Es importante que los mantengas actualizados para realizar compras con normalidad</p>
        </div>
        <div class="row justify-content-center">

            <div class="col-md-8">

                @if (session()->has('status'))
                <div class="row mb-3 mt-3">
                    <div class="alert alert-success col-md-12 text-center">
                        {{session()->get('status')}}
                    </div>
                </div>
                @endif

                <div class="card">
        
                    <div class="card-body">
                        <form method="POST" action="{{ route('user.information.edit') }}">
                            @csrf
        
                            <div class="form-group row">
                                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Nombre') }}</label>
        
                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ Auth::user()->name }}" required autocomplete="name" autofocus>
                                </div>
                            </div>
        
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Correo electronico') }}</label>
        
                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ Auth::user()->email }}" required autocomplete="email">
                                </div>
                            </div>
        
                            <div class="form-group row">
                                <label for="address" class="col-md-4 col-form-label text-md-right">{{ __('Direccion') }}</label>
        
                                <div class="col-md-6">
                                    <input id="address" type="string" class="form-control @error('address') is-invalid @enderror" name="address" value="{{ Auth::user()->address }}" autocomplete="address">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Contraseña') }}</label>
        
                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" autocomplete="new-password">
                                </div>
                            </div>
        
                            <div class="form-group row">
                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Repetir contraseña') }}</label>
        
                                <div class="col-md-6">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" autocomplete="new-password">
                                </div>
                            </div>
        
                            <div class="form-group row mb-0">
                                <div class="col-md-6 offset-md-4">
                                    <button type="submit" class="btn_1 full-width">Actualizar</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    
    </div>
    
@endsection
