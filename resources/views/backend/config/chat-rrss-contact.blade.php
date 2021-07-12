@extends('backend.layout.layout')

@section('title', 'Chat, RRSS y contacto')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-12">
                    <h1>Chat, Redes Sociales, Información de contacto</h1>
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
            <form action="{{route('config.updatechat-rsss-contact')}}" method="POST">
            @csrf
            @method("POST")
                <div class="row">
                    <div class="col-6">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Chat</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="form-group clearfix">
                                    <div class="icheck-success">
                                        <input type="checkbox" id="chat_1" name="chats[]" value="1" {{ $configuration::verifyChat('1') }}>
                                        <label for="chat_1">Whatsapp</label>
                                    </div>
                                    <div class="icheck-success">
                                        <input type="checkbox" id="chat_2" name="chats[]" value="2" {{ $configuration::verifyChat('2') }}>
                                        <label for="chat_2">Facebook</label>
                                    </div>
                                    <div class="icheck-success">
                                        <input type="checkbox" id="chat_3" name="chats[]" value="3" {{ $configuration::verifyChat('3') }}>
                                        <label for="chat_3">Tawk.To</label>
                                    </div>
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
                                <h3 class="card-title">Redes sociales</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="facebook">Facebook</label>
                                    <input type="text" class="form-control" id="facebook" name="facebook" value ="{{ $chat_contact_social->facebook ?? ''}}">
                                </div>
                                <div class="form-group">
                                    <label for="instagram">Instagram</label>
                                    <input type="text" class="form-control" id="instagram" name="instagram" value ="{{ $chat_contact_social->instagram ?? ''}}">
                                </div>
                                <div class="form-group">
                                    <label for="youtube">Youtube</label>
                                    <input type="text" class="form-control" id="youtube" name="youtube" value ="{{ $chat_contact_social->youtube ?? ''}}">
                                </div>
                                <div class="form-group">
                                    <label for="twitter">Twitter</label>
                                    <input type="text" class="form-control" id="twitter" name="twitter" value ="{{ $chat_contact_social->twitter ?? ''}}">
                                </div>
                                <div class="form-group">
                                    <label for="linkedin">Linkedin</label>
                                    <input type="text" class="form-control" id="linkedin" name="linkedin" value ="{{ $chat_contact_social->linkedin ?? ''}}">
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
                                <h3 class="card-title">Información de contacto</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="dir">Dirección</label>
                                    <input type="text" class="form-control" id="dir" name="dir" value ="{{ $chat_contact_social->dir ?? ''}}">
                                </div>
                                <div class="form-group">
                                    <label for="email">Correo electrónico</label>
                                    <input type="text" class="form-control" id="email" name="email" value ="{{ $chat_contact_social->email ?? ''}}">
                                </div>
                                <div class="form-group">
                                    <label for="phone">Numero fijo</label>
                                    <input type="text" class="form-control" id="phone" name="phone" value ="{{ $chat_contact_social->phone ?? ''}}">
                                </div>
                                <div class="form-group">
                                    <label for="celphone">Numero celular</label>
                                    <input type="text" class="form-control" id="celphone" name="celphone" value ="{{ $chat_contact_social->celphone ?? ''}}">
                                </div>
                                <div class="form-group">
                                    <label for="schedule">Horario</label>
                                    <input type="text" class="form-control" id="schedule" name="schedule" value ="{{ $chat_contact_social->schedule ?? ''}}">
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