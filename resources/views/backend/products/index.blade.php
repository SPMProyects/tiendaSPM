@extends('backend.layout.layout')

@section('title', 'Categorias')

@section('styles')
      <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('back/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('back/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('back/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Lista de Productos</h1>
                </div>
                <div class="col-sm-6 text-right">
                    @if (request()->has('lista') && request()->input('lista') == 'eliminados')
                        <a href="{{route('products.index')}}"class="btn btn-primary">Activas</a>
                    @else
                        <a href="{{route('products.index',['lista' => 'eliminados'])}}"class="btn btn-info">Papelera</a>
                    @endif
                    
                </div>
            </div>
            
            @if (session()->has('status'))
                <div class="row">
                    <div class="alert alert-success col-12">
                        {{session()->get('status')}}
                    </div>
                </div>
            @endif
            
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">Lista de productos</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <table id="product_list" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NOMBRE</th>
                                <th>CATEGORIA</th>
                                <th>MONEDA</th>
                                <th>PRECIO</th>
                                <th>OFERTA</th>
                                <th>DESTACADO</th>
                                <th>ACTIVO</th>                                
                                <th>ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @empty($products)
                            
                            @else

                                @foreach ($products as $product)
                                    <tr>
                                        <td>{{$product->id}}</td>
                                        <td>{{$product->name}}</td>
                                        <td>{{$product->category->name}}</td>
                                        <td>{{$product->currency->name}}</td>
                                        <td>{{$product->price}}</td>
                                        <td>{{$product->sales_price}}</td>
                                        <td>{{$product->active == '1' ? 'Si' : 'No'}}</td>
                                        <td>{{$product->featured == '1' ? 'Si' : 'No'}}</td>
                                        <td>
                                            @if (request()->has('lista') && request()->input('lista') == 'eliminados')
                                                <form action="{{route('products.destroy',[$product->id])}}" method="POST" >
                                                    @csrf
                                                    @method("DELETE")
                                                    <input type="hidden" name="eliminar" value="eliminar">
                                                    <input class= "btn btn-danger" type="submit" value="Eliminar definitivo">
                                                </form>
                                            @else
                                                <form action="{{route('products.destroy',[$product->id])}}" method="POST" >
                                                    @csrf
                                                    @method("DELETE")
                                                    <input class= "btn btn-danger" type="submit" value="Eliminar">
                                                </form>
                                                
                                                <form action="{{route('products.edit',[$product->id])}}" method="GET" >
                                                    @csrf
                                                    @method("GET")
                                                    <input class= "btn btn-success" type="submit" value="Editar">
                                                </form>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach

                            @endempty
                           
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
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

    <!-- User Laravel Mix Scripts-->
    <script src="{{asset('js/product.js')}}"></script>
@endsection