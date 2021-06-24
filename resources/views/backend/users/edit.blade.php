@extends('backend.layout.layout')

@section('title', 'Usuarios')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Editar usuario</h1>
                </div>
            </div>
            <div class="row">
                @if (session()->has('status'))
                    <div class="alert alert-success col-12">
                        {{session()->get('status')}}
                    </div>
                @endif
                
                @empty(!$errors->all())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{$error}}</li>
                            @endforeach
                        </ul>
                    </div>
                @endempty
                
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">Datos del usuario actual</h3>
                </div>
                <!-- /.card-header -->
                <form action="{{route('users.update',[$user->id])}}" method="POST">
                    @csrf
                    @method("PUT")
                    <div class="card-body">
                        <input type="hidden" name="id" value="{{$user->id}}">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nombre</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$user->name}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Correo</label>
                            <input type="email" class="form-control" id="email" name="email" value="{{$user->email}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Address</label>
                            <input type="text" class="form-control" id="address" name="address" value="{{$user->address}}">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputPassword1">Contraseña</label>
                            <input type="password" class="form-control" id="password" name="password">
                        </div>
                        <div class="form-group">
                            <label>Usuario administrador</label>
                            <select class="form-control" id="admin" name="admin">
                              <option></option>
                              <option value="1" {{ $user->admin == '1' ? 'selected' : ''}}>Si</option>
                              <option value="0" {{ $user->admin == '0' ? 'selected' : ''}}>No</option>
                            </select>
                          </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Actualizar</button>
                      </div>
                    </form>
                </form>
              </div>
              <!-- /.card -->
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>

@endsection