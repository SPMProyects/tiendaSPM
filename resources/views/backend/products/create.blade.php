@extends('backend.layout.layout')

@section('title', 'Products')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Crear producto</h1>
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
                  <h3 class="card-title">Ingresar datos del nuevo producto</h3>
                </div>
                <!-- /.card-header -->
                <form action="{{route('products.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("POST")
                    <div class="card-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">Nombre</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                        <div class="form-group">
                          <label for="description">Descripcion</label>
                          <textarea class="form-control" id="description" name="description" rows="3"></textarea>
                        </div>
                        <div class="form-group">
                          <label for="images">Imagenes</label>
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="images" name="images[]" multiple>
                            <label class="custom-file-label" for="images">Elegir uno o mas archivos</label>
                          </div>
                        </div>
                        <div class="form-group">
                          <label for="parent_id">Categoria</label>
                          <select class="form-control" id="category_id" name="category_id">
                            <option></option>
                            @empty(!$categories)

                              @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
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
                                <option value="{{$currency->id}}">{{$currency->name}}</option>
                              @endforeach

                            @endempty
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="price">Precio</label>
                          <input type="number" class="form-control" id="price" name="price" step=0.001>
                      </div>
                      <div class="form-group">
                        <label for="sales_price">Precio de oferta</label>
                        <input type="number" class="form-control" id="sales_price" name="sales_price" step=0.001>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="featured" name= "featured">
                        <label class="form-check-label" for="active">
                          Destacado
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="1" id="active" name= "active" checked>
                        <label class="form-check-label" for="active">
                          Activo
                        </label>
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