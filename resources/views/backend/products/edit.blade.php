@extends('backend.layout.layout')

@section('title', 'Categoria')

@section('styles')
    <!-- Ekko Lightbox -->
  <link rel="stylesheet" href="{{asset('back/plugins/ekko-lightbox/ekko-lightbox.css')}}">
@endsection

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Editar producto</h1>
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
                  <h3 class="card-title">Datos del producto actual</h3>
                </div>
                <!-- /.card-header -->
                <form action="{{route('products.update',[$product->id])}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("PUT")
                    <div class="card-body">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Nombre</label>
                        <input type="text" class="form-control" id="name" name="name" value ="{{$product->name}}">
                      </div>
                      <div class="form-group">
                        <label for="description">Descripcion</label>
                        <textarea class="form-control" id="description" name="description" rows="3">{{$product->description}}</textarea>
                      </div>
                      <div class="form-group">
                        <label for="images">Imagenes</label>
                        <div class="custom-file">
                          <input type="file" class="custom-file-input" id="images" name="images[]" multiple>
                          <label class="custom-file-label" for="images">Elegir uno o mas archivos</label>
                        </div>
                        <div class="col-12 mt-4">
                          <div class="card card-primary">
                            <div class="card-header">
                              <h4 class="card-title">Imagenes actuales</h4>
                            </div>
                            <div class="card-body">
                              <div class="row">
                                @foreach ($product->images as $image)
                                  <div class="col-sm-3">
                                    <a href="/storage/{{$image->path}}" data-toggle="lightbox" data-title="Imagen producto {{$product->id}}" data-gallery="gallery">
                                      <img src="/storage/{{$image->path}}" class="img-fluid mb-2"/>
                                    </a>
                                  </div>
                                @endforeach
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="form-group">
                        <label for="parent_id">Categoria</label>
                        <select class="form-control" id="category_id" name="category_id">
                          <option></option>
                          @empty(!$categories)

                            @foreach ($categories as $category)
                              <option {{$product->category_id == $category->id ? 'selected' : ''}} value="{{$category->id}}">{{$category->name}}</option>
                            @endforeach

                          @endempty
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="parent_id">Moneda</label>
                        <select class="form-control" id="currency_id" name="currency_id">
                          <option></option>
                          @empty(!$currencies)

                            @foreach ($currencies as $currency)
                              <option {{$product->currency_id == $currency->id ? 'selected' : ''}} value="{{$currency->id}}">{{$currency->name}}</option>
                            @endforeach

                          @endempty
                        </select>
                      </div>
                      <div class="form-group">
                        <label for="price">Precio</label>
                        <input type="number" class="form-control" id="price" name="price" step=0.001 value={{$product->price}}>
                      </div>
                      <div class="form-group">
                        <label for="sales_price">Precio de oferta</label>
                        <input type="number" class="form-control" id="sales_price" name="sales_price" step=0.001 value="{{$product->sales_price}}">
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="featured" name= "featured" {{$product->featured == 1 ? 'checked' : ''}}>
                        <label class="form-check-label" for="active">
                          Destacado
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="active" name= "active" {{$product->active == 1 ? 'checked' : ''}}>
                        <label class="form-check-label" for="active">
                          Activo
                        </label>
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

  <script src="{{asset('back/plugins/ekko-lightbox/ekko-lightbox.min.js')}}"></script>
  <script src="{{asset('js/product.js')}}"></script>

@endsection