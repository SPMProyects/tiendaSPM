@extends('backend.layout.layout')

@section('title', 'Email')

@section('content')

<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1>Emails</h1>
            </div>
        </div>
        
        @empty(!$errors->all())
        <div class="row">
            <div class="alert alert-danger col-12">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        @endempty

    </div>
</section>
<section class="content">
    <div class="container-fluid">
        <form action="{{route('config.updateemail')}}" method="POST">
        @csrf
        @method("POST")
            <div class="row">
                <div class="col-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Configuración correos</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="form-group">
                                <label for="name_manager1">Nombre responsable de tienda 1</label>
                                <input type="text" class="form-control" id="name_manager1" name="name_manager1" value ="{{ $email->name_manager1 ?? ''}}">
                            </div>
                            <div class="form-group">
                                <label for="email_manager1">Correo responsable de tienda 1</label>
                                <input type="text" class="form-control" id="email_manager1" name="email_manager1" value ="{{ $email->email_manager1 ?? ''}}">
                            </div>
                            <div class="form-group">
                                <label for="name_manager2">Nombre responsable de tienda 2</label>
                                <input type="text" class="form-control" id="name_manager2" name="name_manager2" value ="{{ $email->name_manager2 ?? ''}}">
                            </div>
                            <div class="form-group">
                                <label for="email_manager2">Correo responsable de tienda 2</label>
                                <input type="text" class="form-control" id="email_manager2" name="email_manager2" value ="{{ $email->email_manager2 ?? ''}}">
                            </div>
                            <div class="form-group">
                                <label for="name_sender">Nombre remitente</label>
                                <input type="text" class="form-control" id="name_sender" name="name_sender" value ="{{ $email->name_sender ?? ''}}">
                            </div>
                            <div class="form-group">
                                <label for="sender">Correo remitente envios</label>
                                <input type="text" class="form-control" id="sender" name="sender" value ="{{ $email->sender ?? ''}}">
                            </div>
                            <div class="form-group">
                                <label for="responser">Destinatario respuestas</label>
                                <input type="text" class="form-control" id="responser" name="responser" value ="{{ $email->responser ?? ''}}">
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <div class="col-6">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Configuración servidor de correo</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <div class="form-group">
                                <label for="serverSMTP">Servidor SMTP</label>
                                <input type="text" class="form-control" id="serverSMTP" name="serverSMTP" value ="{{ $email->serverSMTP ?? ''}}">
                            </div>
                            <div class="form-group">
                                <label for="userSMTP">Usuario SMTP</label>
                                <input type="text" class="form-control" id="userSMTP" name="userSMTP" value ="{{ $email->userSMTP ?? ''}}">
                            </div>
                            <div class="form-group">
                                <label for="passSMTP">Contraseña SMTP</label>
                                <input type="password" class="form-control" id="passSMTP" name="passSMTP">
                            </div>
                            <div class="form-group">
                                <label for="portSMTP">Puerto SMTP</label>
                                <input type="text" class="form-control" id="portSMTP" name="portSMTP" value ="{{ $email->portSMTP ?? ''}}">
                            </div>
                            <div class="form-group">
                                <label>Autenticación SMTP</label>
                                <div class="custom-control custom-radio">
                                <input type="radio" id="tls" name="auth" value="tls" class="custom-control-input" {{ isset($email->auth) && $email->auth == 'tls' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="tls">TLS</label>
                                </div>
                                <div class="custom-control custom-radio">
                                <input type="radio" id="ssl" name="auth" value="ssl" class="custom-control-input" {{ isset($email->auth) && $email->auth == 'ssl' ? 'checked' : '' }}>
                                <label class="custom-control-label" for="ssl">SSL</label>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Seguridad SMTP</label>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="true" name="security" value="true" class="custom-control-input" {{ isset($email->security) && $email->security == 'true' ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="true">Requerida</label>
                                </div>
                                <div class="custom-control custom-radio">
                                    <input type="radio" id="false" name="security" value="false" class="custom-control-input" {{ isset($email->security) && $email->security == 'false' ? 'checked' : '' }}>
                                    <label class="custom-control-label" for="false">No requerida</label>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
            <div class="form-group mt-4 mb-0 pb-5">
                <button type="submit" class="btn btn-primary">Actualizar</button>
            </div>
        </form>
    </div>
</section>
@endsection