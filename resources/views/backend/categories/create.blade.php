@extends('backend.layout.layout')

@section('title', 'Categorias')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Crear categoria</h1>
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
                  <h3 class="card-title">Ingresar datos de la nueva categoria</h3>
                </div>
                <!-- /.card-header -->
                <form action="{{route('categories.store')}}" method="POST">
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
                          <label for="parent_id">Categoria padre</label>
                          <select class="form-control" id="parent_id" name="parent_id">
                            <option></option>
                            @empty(!$categories)

                              @foreach ($categories as $category)
                                <option value="{{$category->id}}">{{$category->name}}</option>
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