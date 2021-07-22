@extends('frontend.layout.layout')

@section('styles')
      <!-- DataTables -->
    <link rel="stylesheet" href="{{asset('back/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('back/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{asset('back/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection

@section('content')

<div class="row justify-content-center">

    <div class="container margin_60">
        <div class="main_title">
            <h2>Tus pedidos</h2>
            <p>Listado de todos los pedidos realizados</p>
        </div>
        <div class="row justify-content-center">

            <div class="col-md-10">
            
                <table id="order_list" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>FECHA</th>
                            <th>CANTIDAD DE PRODUCTOS</th>
                            <th>TOTAL</th>
                            <th>ACCIONES</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @empty($orders)
                        
                        @else

                            @foreach ($orders as $order)
                                <tr>
                                    <td>{{$order->id}}</td>
                                    <td>{{$order->created_at}}</td>
                                    <td>{{$order->totalQuantity()}}</td>
                                    <td>{{currencyFormat($order->total)}}</td>
                                    <td>
                                       
                                        <form action="{{route('user.order.detail',[$order->id])}}" method="GET" >
                                            @csrf
                                            <input class= "btn btn-primary" type="submit" value="Detalle">
                                        </form>
                                        
                                    </td>
                                </tr>
                            @endforeach

                        @endempty
                        
                    </tbody>
                </table>
            
            </div>

        <div>
    
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

    <script src="{{asset('js/user_order.js')}}"></script>
@endsection