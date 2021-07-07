@extends('backend.layout.layout')

@section('title', 'Ordenes')

@section('styles')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('back/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('back/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('back/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('back/plugins/datatables-select/css/select.bootstrap4.min.css')}}">

  <link rel="stylesheet" href="{{asset('css/orders.css')}}">

@endsection

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Crear orden</h1>
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
                  <h3 class="card-title">Ingresar datos de la nueva orden</h3>
                </div>
                <!-- /.card-header -->
                <form action="{{route('orders.store')}}" method="POST">
                    @csrf
                    @method("POST")
                    <div class="card-body">
                      <div class="form-group">
                        <label for="user_id">Usuario</label>
                        <select class="form-control" id="user_id" name="user_id" required>
                          <option></option>
                          @empty(!$users)

                            @foreach ($users as $user)
                              <option value="{{$user->id}}">{{$user->name}}</option>
                            @endforeach

                          @endempty
                        </select>
                      </div>
                      <div class="form-group">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#buscar_productos">
                          Buscar productos
                        </button>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Productos agregados</label>
                        <table id="order_product" class="table table-bordered table-striped">
                          <thead>
                            <tr>
                              <th>Id</th>
                              <th>Nombre</th>
                              <th>Imagen</th>
                              <th>Precio</th>
                              <th>Cantidad</th>
                              <th>Subtotal</th>
                              <th>Eliminar</th>
                            </tr>
                          </thead>
                          <tbody>

                            {{-- Rellenar los valores de la tabla con los datos que contenga la session products_order que se rellena con los datos enviados desde Ajax al controlador --}}
                            
                            @empty(!session('products'))

                              @foreach (session('products') as $product)
                                <tr>
                                  <td>{{$product->id}}</td>
                                  <td>{{$product->name}}</td>
                                  <td>
                                    @if ($product->images->first())
                                      <div class="row">
                                          <div class="col-12">
                                          <a href="/storage/{{$product->images->first()->path}}" data-toggle="lightbox" data-title="Imagen producto {{$product->id}}">
                                              <img src="/storage/{{$product->images->first()->path}}" class="img-thumbnail w-50"/>
                                          </a>
                                          </div>
                                      </div>
                                      @endif
                                  </td>
                                  <td><span class="price">{{$product->price}}</span></td>
                                  <td>
                                    <div class="numbers-row">
                                      <input type="text" value="0" id="quantity" class="qty2" name="quantity">
                                      <div class="inc button_inc" product-id="{{$product->id}}">+</div><div class="dec button_inc" product-id="{{$product->id}}">-</div>
                                    </div>
                                  </td>
                                  <td><span class="subtotal"></span></td>
                                  <td><i class="fas fa-trash-alt btn-eliminar" product-id="{{$product->id}}"></i></td>
                                </tr>
                              @endforeach

                            @endempty
                            
                          </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                          <p><strong>Total orden: <span id="total_order"></span></strong></p>
                        </div>
                      </div>


                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success">Crear</button>
                        <button id="vaciar_orden" class="btn btn-info ml-5">Vaciar Orden</button>
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

    <div class="modal fade" id="buscar_productos" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-lg">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Lista de productos</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            
            <table id="product_search" class="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Imagen</th>
                  <th>Nombre</th>
                  <th>Precio</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($products as $product)
                  <tr>
                    <td>{{$product->id}}</td>
                    <td>
                      @if ($product->images->first())
                          <div class="row">
                              <div class="col-12">
                              <a href="/storage/{{$product->images->first()->path}}" data-toggle="lightbox" data-title="Imagen producto {{$product->id}}">
                                  <img src="/storage/{{$product->images->first()->path}}" class="img-thumbnail w-50"/>
                              </a>
                              </div>
                          </div>
                      @endif
                  </td>
                    <td>{{$product->name}}</td>
                    <td>{{$product->price}}</td>
                  </tr>
                @endforeach
              </tbody>
            </table>

          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-primary" id="btn-agregar">Agregar productos</button>
          </div>
        </div>
      </div>
    </div>

@endsection

@section('scripts')
    <!-- DataTables  & Plugins -->
    <script src="{{asset('back/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('back/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('back/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('back/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('back/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('back/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('back/plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('back/plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('back/plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('back/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('back/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('back/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

    <script src="{{asset('back/plugins/datatables-select/js/dataTables.select.min.js')}}"></script>
    <script src="{{asset('back/plugins/datatables-select/js/select.bootstrap4.min.js')}}"></script>

    <script src="{{asset('back/plugins/ekko-lightbox/ekko-lightbox.min.js')}}"></script>
    
    <!-- User Laravel Mix Scripts-->
    <script src="{{asset('js/orders.js')}}"></script>
@endsection