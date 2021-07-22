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
            <h2>Detalle de tu orden</h2>
            <p>Podes ver en detalle todo lo que necesitas saber de tu orden</p>
        </div>
        <div class="row justify-content-center">

            <div class="col-md-10">

                    <table id="order_product" class="table table-bordered table-striped">
                      <thead>
                        <tr>
                          <th>Id</th>
                          <th>Nombre</th>
                          <th>Imagen</th>
                          <th>Precio</th>
                          <th>Cantidad</th>
                          <th>Subtotal</th>
                        </tr>
                      </thead>
                      <tbody>
                        
                        @empty(!$order->products()->get())

                          @foreach ($order->products()->get() as $product)
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
                              <td><span class="price">{{currencyFormat($product->pivot->price)}}</span></td>
                              <td>{{$product->pivot->quantity}}</td>
                              <td><span class="subtotal">{{$product->pivot->quantity * $product->pivot->price}}</span></td>
                            </tr>
                          @endforeach

                        @endempty
                        
                      </tbody>
                    </table>
                    <div class="d-flex justify-content-end">
                      <p><strong>Total orden: <span id="total_order">{{currencyFormat($order->total)}}</span></strong></p>
                    </div>
            
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