@extends('backend.layout.layout')

@section('title', 'General')

@section('styles')
    <link rel="stylesheet" href="{{asset('back/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">
@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Generales</h1>
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
            <div class="row m-1">
                <div class="col-12">
                    <!-- general form elements -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Generales</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('config.updategeneral')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method("POST")
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nombre de la tienda</label>
                                    <input type="text" class="form-control" id="store_name" name="store_name" value ="{{ $general->store_name ?? ''}}">
                                </div>
                                <div class="form-group">
                                    <label>Color de la tienda 1</label>
                
                                    <div class="input-group my-colorpicker2">
                                        <input type="text" class="form-control" name="color" id="color" value ="{{ $general->color ?? ''}}">
                    
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-square"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Color de la tienda 2</label>
                
                                    <div class="input-group my-colorpicker2">
                                        <input type="text" class="form-control" name="color_2" id="color_2" value ="{{ $general->color_2 ?? ''}}">
                    
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-square"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label>Color de la tienda 3</label>
                
                                    <div class="input-group my-colorpicker2">
                                        <input type="text" class="form-control" name="color_3" id="color_3" value ="{{ $general->color_3 ?? ''}}">
                    
                                        <div class="input-group-append">
                                            <span class="input-group-text"><i class="fas fa-square"></i></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="icon">Logo</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="icon" name="icon">
                                            <label class="custom-file-label" for="icon"></label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Elegir</span>
                                        </div>
                                    </div>
                                    @if (isset($general->icon) && $general->icon != '')
                                        <div class="row">
                                            <div class="col-12">
                                                <img src="/storage/{{$general->icon}}" class="img-thumbnail w-25 mt-3 mb-3"/>
                                            </div>
                                        </div>
                                    @endif
                                    
                                </div>
                                <div class="form-group">
                                    <label for="fav_icon">Icono</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="fav_icon" name="fav_icon">
                                            <label class="custom-file-label" for="fav_icon"></label>
                                        </div>
                                        <div class="input-group-append">
                                            <span class="input-group-text">Elegir</span>
                                        </div>
                                    </div>
                                    @if (isset($general->fav_icon) && $general->fav_icon != '')
                                        <div class="row">
                                            <div class="col-12">
                                                <img src="/storage/{{$general->fav_icon}}" class="img-thumbnail w-25 mt-3 mb-3"/>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                                <div class="form-group">
                                    <label for="store_mode">Modo de trabajo</label>
                                    <select class="form-control" id="store_mode" name="store_mode">
                                    <option></option>
                                        <option value="1" {{ isset($general->store_mode) && $general->store_mode == '1' ? 'selected' : '' }}>Catalogo</option>
                                        <option value="2" {{ isset($general->store_mode) && $general->store_mode == '2' ? 'selected' : '' }}>Tienda sin precio</option>
                                        <option value="3" {{ isset($general->store_mode) && $general->store_mode == '3' ? 'selected' : '' }}>Tienda con precio</option>
                                    </select>
                                </div>
                            </div>
                            <!-- /.card-body -->

                            <div class="card-footer">
                            <button type="submit" class="btn btn-primary">Actualizar</button>
                            </div>
                        </form>
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </section>
@endsection

@section('scripts')
    <script src="{{asset('back/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
    <script src="{{asset('js/general.js')}}"></script>
@endsection