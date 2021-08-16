@extends('backend.layout.layout')

@section('title', 'Cupon')

@section('styles')
  <link rel="stylesheet" href="{{asset('back/plugins/daterangepicker/daterangepicker.css')}}">
@endsection

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Editar cupon</h1>
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
                  <h3 class="card-title">Datos del cupon actual</h3>
                </div>
                <!-- /.card-header -->
                <form action="{{route('cupons.update',[$cupon->id])}}" method="POST">
                    @csrf
                    @method("PUT")
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nombre</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$cupon->name}}">
                        </div>

                        <label for="inputState">Condiciones</label>
                        @foreach (json_decode($cupon->conditions) as $condition)
                        
                        <div class="form-row conditions-row">
                            <div class="form-group col-md-4">
                              <select class="form-control zone" name="zone[]">
                                <option>Zona a aplicar...</option>
                                <option value="products" id="products" {{ $condition->zone == 'products' ? 'selected' : ''}}>Productos</option>
                                <option value="categories" id="categories" {{ $condition->zone == 'categories' ? 'selected' : ''}}>Categorias</option>
                                <option value="users" id="users" {{ $condition->zone == 'users' ? 'selected' : ''}}>Usuarios</option>
                                <option value="cart" id="cart" {{ $condition->zone == 'cart' ? 'selected' : ''}}>Total Carrito</option>
                              </select>
                            </div>
                            <div class="form-group col-md-4" id ="criterion_row">
                              <select id="criterion" class="form-control" name="criterion[]">
                                <option value="" id="baseCriterio">Criterio...</option>
                                <option value="higher" id="higher" {{ $condition->criterion == 'higher' ? 'selected' : ''}}>Mayor</option>
                                <option value="lower" id="lower" {{ $condition->criterion == 'lower' ? 'selected' : ''}}>Menor</option>
                                <option value="equal" id="equal" {{ $condition->criterion == 'equal' ? 'selected' : ''}}>Igual</option>
                                <option value="different" id="different" {{ $condition->criterion == 'different' ? 'selected' : ''}}>Distinto</option>
                              </select>
                            </div>
                            <div class="form-group col-md-4 {{ $condition->zone != 'cart' ? '' : 'd-none' }}" id="elements_row">
                              <select id="elements" class="form-control" name="elements[]">
                                <option value="" id="baseElements">Elementos...</option>
                                
                                @if ($condition->zone == 'products')
                                    @foreach ($products as $product)
                                        <option value="{{$product->id}}" {{$product->id == $condition->elements ? 'selected' : ''}} >{{$product->name}}</option>
                                    @endforeach
                                @elseif($condition->zone == 'categories')
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}" {{$category->id == $condition->elements ? 'selected' : ''}} >{{$category->name}}</option>
                                    @endforeach
                                @elseif($condition->zone == 'users')
                                    @foreach ($users as $user)
                                        <option value="{{$user->id}}" {{$user->id == $condition->elements ? 'selected' : ''}} >{{$user->name}}</option>
                                    @endforeach
                                @endif

                              </select>
                            </div>
                            <div class="form-group col-md-4 {{ $condition->zone == 'cart' ? '' : 'd-none' }}" id="value_row">
                              <input type="number" class="form-control" id="value" name="elements[]" placeholder="Valor" value= {{ $condition->zone == 'cart' ? $condition->elements : '' }}>
                            </div>
                          </div>

                        @endforeach
                          
                          <div class="row">
                            <div class="form-group col-12" id="value_row">
                              <button class="btn btn-primary" id="addCondition">Agregar</button>
                              <button class="btn btn-danger disabled" id="removeCondition">Eliminar</button>
                            </div>
                          </div>

                        <div class="form-group">
                          <label for="exampleInputEmail1">Maximos usos</label>
                          <input type="number" class="form-control" id="max_uses" name="maximum_uses" step=1 value="{{$cupon->maximum_uses}}">
                        </div>

                        <div class="form-group">
                          <label>Tiempo de vigencia</label>
                          <div class="input-group">
                            <div class="input-group-prepend">
                              <span class="input-group-text"><i class="far fa-clock"></i></span>
                            </div>
                            <input type="text" class="form-control float-right" id="reservationtime" name="time_alive" value="{{$cupon->time_alive}}">
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="inputState">Tipo</label>
                          <select id="type" class="form-control" name="type">
                            <option>Tipo...</option>
                            <option {{ $cupon->type == 'percent' ? 'selected' : ''}}>Porcentual</option>
                            <option {{ $cupon->type == 'absolute' ? 'selected' : ''}}>Absoluto</option>
                          </select>
                        </div>

                        <div class="form-group">
                            <label for="value">Valor</label>
                            <input type="number" class="form-control" id="value" name="value" step=0.001 value="{{$cupon->value}}">
                        </div>

                        <div class="form-check">
                          <input class="form-check-input" type="checkbox" value="1" id="active" name="active" {{ $cupon->active == 1 ? 'checked' : ''}}>
                          <label class="form-check-label" for="active">Activo</label>
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

@section('scripts')
  <script src="{{asset('back/plugins/daterangepicker/daterangepicker.js')}}"></script>
  <script src="{{asset('back/plugins/moment/moment.min.js')}}"></script>

  <script src="{{asset('js/cupons.js')}}"></script>
@endsection