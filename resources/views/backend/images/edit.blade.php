@extends('backend.layout.layout')

@section('title', 'Imagen')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Editar imagen</h1>
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
                  <h3 class="card-title">Datos de la imagen actual</h3>
                </div>
                <!-- /.card-header -->
                <form action="{{route('images.update',[$image->id])}}" method="POST">
                    @csrf
                    @method("PUT")
                    <div class="card-body">
                        <input type="hidden" name="id" value="{{$image->id}}">
                        <div class="form-group">
                          <label for="images">Imagen</label>
                          <div class="col-sm-3">
                            <a href="/storage/{{$image->path}}" data-toggle="lightbox" data-title="{{str_replace('images/','',$image->path)}}" data-gallery="gallery">
                              <img src="/storage/{{$image->path}}" class="img-fluid mb-2"/>
                            </a>
                          </div>
                        </div>

                        <div class="form-group">
                          <label for="parent_id">Productos asociados ({{ $image->products()->count() }})</label>
                          <select class="form-control" id="products" name="products[]" multiple>
                            <option></option>
                            @empty(!$products)

                              @foreach ($products as $product)
                                <option value="{{$product->id}}"
                                  
                                  @empty(!$image->products)
                                      @foreach ($image->products as $img)
                                          {{ $product->id == $img->id ? 'selected' : ''}}
                                      @endforeach
                                  @endempty
                                  
                                  >{{$product->name}}</option>
                              @endforeach

                            @endempty
                          </select>
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