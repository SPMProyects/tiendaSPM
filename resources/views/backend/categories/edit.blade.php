@extends('backend.layout.layout')

@section('title', 'Categoria')

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Editar categoria</h1>
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
                  <h3 class="card-title">Datos de la categoria actual</h3>
                </div>
                <!-- /.card-header -->
                <form action="{{route('categories.update',[$category->id])}}" method="POST">
                    @csrf
                    @method("PUT")
                    <div class="card-body">
                        <input type="hidden" name="id" value="{{$category->id}}">
                        <div class="form-group">
                            <label for="name">Nombre</label>
                            <input type="text" class="form-control" id="name" name="name" value="{{$category->name}}">
                        </div>
                        <div class="form-group">
                            <label for="description">Descripcion</label>
                            <textarea class="form-control" id="description" name="description" rows="3">{{$category->description}}</textarea>
                          </div>
                          <div class="form-group">
                            <label for="parent_id">Categoria padre</label>
                            <select class="form-control" id="parent_id" name="parent_id">
                              <option></option>
                              @empty(!$categories)
  
                                @foreach ($categories as $categorylist)
                                  <option {{$category->id == $categorylist->id ? 'selected' : ''}} value="{{$categorylist->id}}">{{$categorylist->name}}</option>
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