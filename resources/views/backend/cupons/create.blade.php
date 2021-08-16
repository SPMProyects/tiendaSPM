@extends('backend.layout.layout')

@section('title', 'Cupones')

@section('styles')
  <link rel="stylesheet" href="{{asset('back/plugins/daterangepicker/daterangepicker.css')}}">
@endsection

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Crear cupon</h1>
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
          <div class="row">
            <div class="col-12">
              <div class="card card-success">
                <div class="card-header">
                  <h3 class="card-title">Ingresar datos del nuevo cupon</h3>
                </div>
                <!-- /.card-header -->
                <form action="{{route('cupons.store')}}" method="POST">
                    @csrf
                    @method("POST")
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nombre</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>

                        <label for="inputState">Condiciones</label>
       
                          <div class="form-row conditions-row">
                            <div class="form-group col-md-4">
                              <select class="form-control zone" name="zone[]">
                                <option selected>Zona a aplicar...</option>
                                <option value="products" id="products">Productos</option>
                                <option value="categories" id="categories">Categorias</option>
                                <option value="users" id="users">Usuarios</option>
                                <option value="cart" id="cart">Total Carrito</option>
                              </select>
                            </div>
                            <div class="form-group col-md-4 d-none" id ="criterion_row">
                              <select id="criterion" class="form-control" name="criterion[]">
                                <option value="" id="baseCriterio">Criterio...</option>
                                <option value="higher" id="higher">Mayor</option>
                                <option value="lower" id="lower">Menor</option>
                                <option value="equal" id="equal">Igual</option>
                                <option value="different" id="different">Distinto</option>
                              </select>
                            </div>
                            <div class="form-group col-md-4 d-none" id="elements_row">
                              <select id="elements" class="form-control" name="elements[]">
                                <option value="" id="baseElements">Elementos...</option>
                              </select>
                            </div>
                            <div class="form-group col-md-4 d-none" id="value_row">
                              <input type="number" class="form-control" id="value" name="elements[]" placeholder="Valor">
                            </div>
                          </div>

                          <div class="row">
                            <div class="form-group col-12" id="value_row">
                              <button class="btn btn-primary" id="addCondition">Agregar</button>
                              <button class="btn btn-danger disabled" id="removeCondition">Eliminar</button>
                            </div>
                          </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Maximos usos</label>
                          <input type="number" class="form-control" id="max_uses" name="maximum_uses" step=1>
                        </div>

                        <div class="form-group">
                          <label>Tiempo de vigencia</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="far fa-clock"></i></span>
                            </div>
                            <input type="text" class="form-control float-right" id="reservationtime" name="time_alive">
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="inputState">Tipo</label>
                          <select id="type" class="form-control" name="type">
                            <option selected>Tipo...</option>
                            <option value="percent">Porcentual</option>
                            <option value="absolute">Absoluto</option>
                          </select>
                        </div>

                        <div class="form-group">
                            <label for="value">Valor</label>
                            <input type="number" class="form-control" id="value" name="value" step=0.001>
                        </div>

                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="1" id="active" name= "active" checked>
                          <label class="form-check-label" for="active">Activo</label>
                        </div>

                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Crear</button>
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

@section('scripts')
  <script src="{{asset('back/plugins/daterangepicker/daterangepicker.js')}}"></script>
  <script src="{{asset('back/plugins/moment/moment.min.js')}}"></script>

  <script src="{{asset('js/cupons.js')}}"></script>
@endsection