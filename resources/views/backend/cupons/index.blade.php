@extends('backend.layout.layout')

@section('title', 'Usuarios')

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
                    <h1>Lista de monedas</h1>
                </div>
                <div class="col-sm-6 text-right">
                    @if (request()->has('lista') && request()->input('lista') == 'eliminados')
                        <a href="{{route('cupons.index')}}"class="btn btn-primary">Activas</a>
                    @else
                        <a href="{{route('cupons.index',['lista' => 'eliminados'])}}"class="btn btn-info">Papelera</a>
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
                  <h3 class="card-title">Lista de cupones</h3>
                </div>
                <!-- /.card-header -->
                <div class="card-body">

                    <table id="cupons_list" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>NOMBRE</th>
                                <th>TIEMPO DE USO</th>
                                <th>TIPO</th>
                                <th>VALOR</th>
                                <th>MAXIMOS USOS</th>
                                <th>ACTIVO</th>
                                <th>ACCIONES</th>
                            </tr>
                        </thead>
                        <tbody>
                            
                            @empty($cupons)
                            
                            @else

                                @foreach ($cupons as $cupon)
                                    <tr>
                                        <td>{{$cupon->id}}</td>
                                        <td>{{$cupon->name}}</td>
                                        <td>{{$cupon->time_alive}}</td>
                                        <td>{{$cupon->type}}</td>
                                        <td>{{$cupon->value}}</td>
                                        <td>{{$cupon->maximum_uses}}</td>
                                        <td>{{$cupon->active}}</td>
                                        <td>
                                            @if (request()->has('lista') && request()->input('lista') == 'eliminados')
                                                <form action="{{route('cupons.destroy',[$cupon->id])}}" method="POST" >
                                                    @csrf
                                                    @method("DELETE")
                                                    <input type="hidden" name="eliminar" value="eliminar">
                                                    <input class= "btn btn-danger" type="submit" value="Eliminar definitivo">
                                                </form>
                                            @else
                                                <form action="{{route('cupons.destroy',[$cupon->id])}}" method="POST" >
                                                    @csrf
                                                    @method("DELETE")
                                                    <input class= "btn btn-danger" type="submit" value="Eliminar">
                                                </form>
                                                
                                                <form action="{{route('cupons.edit',[$cupon->id])}}" method="GET" >
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
    <script src="{{asset('back/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('back/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('back/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

    <!-- User Laravel Mix Scripts-->
    <script src="{{asset('js/cupons.js')}}"></script>
@endsection