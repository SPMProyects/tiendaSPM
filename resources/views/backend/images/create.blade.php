@extends('backend.layout.layout')

@section('title', 'Categorias')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Subir imagen</h1>
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
                  <h3 class="card-title">Subir nueva imagen y asociarla a productos</h3>
                </div>
                <!-- /.card-header -->
                <form action="{{route('images.store')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method("POST")
                    <div class="card-body">
                        <div class="form-group">
                          <label for="images">Imagenes</label>
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" id="images" name="image">
                            <label class="custom-file-label" for="images">Elegir uno o mas archivos</label>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="parent_id">Productos asociados</label>
                          <select class="form-control" id="products" name="products[]" multiple>
                            <option></option>
                            @empty(!$products)

                              @foreach ($products as $product)
                                <option value="{{$product->id}}">{{$product->name}}</option>
                              @endforeach

                            @endempty
                          </select>
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