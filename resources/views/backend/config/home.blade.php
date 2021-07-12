@extends('backend.layout.layout')

@section('title', 'Inicio')

@section('styles')
    <link rel="stylesheet" href="{{asset('back/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">
@endsection

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pagina Inicio</h1>
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
            <form action="{{route('config.updatehome')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("POST")

                <div class="row">
                    <div class="col-6">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Banner 1 - Slider principal</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title_1">Titulo del banner 1</label>
                                    <input type="text" class="form-control" id="title_1" name="title_1" value ="{{ $home->title_1 ?? ''}}">
                                </div>
                                <div class="form-group">
                                    <label for="text_1">Texto del banner 1</label>
                                    <textarea class="form-control" id="text_1" name="text_1">{{ $home->text_1 ?? ''}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="button_1">Texto del boton 1</label>
                                    <input type="text" class="form-control" id="button_1" name="button_1" value ="{{ $home->button_1 ?? ''}}">
                                </div>
                                <div class="form-group">
                                    <label for="link_1">Link del boton 1</label>
                                    <input type="text" class="form-control" id="link_1" name="link_1" value ="{{ $home->link_1 ?? ''}}">
                                </div>
                                <div class="form-group">
                                    <label for="icon">Imagen 1</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image_1" name="image_1">
                                            <label class="custom-file-label" for="image_1"></label>
                                        </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Elegir</span>
                                    </div>
                                    </div>
                                </div>

                                @if (isset($home->image_1) && $home->image_1 != '')
                                    <div class="row">
                                        <div class="col-12">
                                            <img src="/storage/{{$home->image_1}}" class="img-thumbnail w-25 mt-3 mb-3"/>
                                        </div>
                                    </div>
                                @endif

                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-6">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Banner 2 - Slider principal</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title_2">Titulo del banner 2</label>
                                    <input type="text" class="form-control" id="title_2" name="title_2" value ="{{ $home->title_2 ?? ''}}">
                                </div>
                                <div class="form-group">
                                    <label for="text_2">Texto del banner 2</label>
                                    <textarea class="form-control" id="text_2" name="text_2">{{ $home->text_2 ?? ''}}"</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="button_2">Texto del boton 2</label>
                                    <input type="text" class="form-control" id="button_2" name="button_2" value ="{{ $home->button_2 ?? ''}}">
                                </div>
                                <div class="form-group">
                                    <label for="link_2">Link del boton 2</label>
                                    <input type="text" class="form-control" id="link_2" name="link_2" value ="{{ $home->link_2 ?? ''}}">
                                </div>
                                <div class="form-group">
                                    <label for="icon">Imagen 2</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image_2" name="image_2">
                                            <label class="custom-file-label" for="image_2"></label>
                                        </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Elegir</span>
                                    </div>
                                    </div>
                                </div>
                                @if (isset($home->image_2) && $home->image_2 != '')
                                    <div class="row">
                                        <div class="col-12">
                                            <img src="/storage/{{$home->image_2}}" class="img-thumbnail w-25 mt-3 mb-3"/>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-6">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Banner 3 - Slider principal</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title_3">Titulo del banner 3</label>
                                    <input type="text" class="form-control" id="title_3" name="title_3" value ="{{ $home->title_3 ?? ''}}">
                                </div>
                                <div class="form-group">
                                    <label for="text_3">Texto del banner 3</label>
                                    <textarea class="form-control" id="text_3" name="text_3">{{ $home->text_3 ?? ''}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="button_3">Texto del boton 3</label>
                                    <input type="text" class="form-control" id="button_3" name="button_3" value ="{{ $home->button_3 ?? ''}}">
                                </div>
                                <div class="form-group">
                                    <label for="link_3">Link del boton 3</label>
                                    <input type="text" class="form-control" id="link_3" name="link_3" value ="{{ $home->link_3 ?? ''}}">
                                </div>
                                <div class="form-group">
                                    <label for="icon">Imagen 3</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="image_3" name="image_3">
                                            <label class="custom-file-label" for="image_3"></label>
                                        </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Elegir</span>
                                    </div>
                                    </div>
                                </div>
                                @if (isset($home->image_3) && $home->image_3 != '')
                                    <div class="row">
                                        <div class="col-12">
                                            <img src="/storage/{{$home->image_3}}" class="img-thumbnail w-25 mt-3 mb-3"/>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <div class="row">
                    <div class="col-6">
                        <!-- general form elements -->
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Icono personalizable 1</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="icon_title_1">Titulo del icono 1</label>
                                    <input type="text" class="form-control" id="icon_title_1" name="icon_title_1" value ="{{ $home->icon_title_1 ?? ''}}">
                                </div>
                                <div class="form-group">
                                    <label for="icon_link_1">Link del icono 1</label>
                                    <input type="text" class="form-control" id="icon_link_1" name="icon_link_1" value ="{{ $home->icon_link_1 ?? ''}}">
                                </div>
                                <div class="form-group">
                                    <label for="icon">Imagen icono 1</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="icon_image_1" name="icon_image_1">
                                            <label class="custom-file-label" for="icon_image_1"></label>
                                        </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Elegir</span>
                                    </div>
                                    </div>
                                </div>
                                @if (isset($home->icon_image_1) && $home->icon_image_1 != '')
                                    <div class="row">
                                        <div class="col-12">
                                            <img src="/storage/{{$home->icon_image_1}}" class="img-thumbnail w-25 mt-3 mb-3"/>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-6">
                        <!-- general form elements -->
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Icono personalizable 2</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="icon_title_2">Titulo del icono 2</label>
                                    <input type="text" class="form-control" id="icon_title_2" name="icon_title_2" value ="{{ $home->icon_title_2 ?? ''}}">
                                </div>
                                <div class="form-group">
                                    <label for="icon_link_2">Link del icono 2</label>
                                    <input type="text" class="form-control" id="icon_link_2" name="icon_link_2" value ="{{ $home->icon_link_2 ?? ''}}">
                                </div>
                                <div class="form-group">
                                    <label for="icon">Imagen icono 2</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="icon_image_2" name="icon_image_2">
                                            <label class="custom-file-label" for="icon_image_2"></label>
                                        </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Elegir</span>
                                    </div>
                                    </div>
                                </div>
                                @if (isset($home->icon_image_2) && $home->icon_image_2 != '')
                                    <div class="row">
                                        <div class="col-12">
                                            <img src="/storage/{{$home->icon_image_2}}" class="img-thumbnail w-25 mt-3 mb-3"/>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-6">
                        <!-- general form elements -->
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Icono personalizable 3</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="icon_title_3">Titulo del icono 3</label>
                                    <input type="text" class="form-control" id="icon_title_3" name="icon_title_3" value ="{{ $home->icon_title_3 ?? ''}}">
                                </div>
                                <div class="form-group">
                                    <label for="icon_link_3">Link del icono 3</label>
                                    <input type="text" class="form-control" id="icon_link_3" name="icon_link_3" value ="{{ $home->icon_link_3 ?? ''}}">
                                </div>
                                <div class="form-group">
                                    <label for="icon">Imagen icono 3</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="icon_image_3" name="icon_image_3">
                                            <label class="custom-file-label" for="icon_image_3"></label>
                                        </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Elegir</span>
                                    </div>
                                    </div>
                                </div>
                                @if (isset($home->icon_image_3) && $home->icon_image_3 != '')
                                    <div class="row">
                                        <div class="col-12">
                                            <img src="/storage/{{$home->icon_image_3}}" class="img-thumbnail w-25 mt-3 mb-3"/>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                    <div class="col-6">
                        <!-- general form elements -->
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Icono personalizable 4</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="icon_title_4">Titulo del icono 4</label>
                                    <input type="text" class="form-control" id="icon_title_4" name="icon_title_4" value ="{{ $home->icon_title_4 ?? ''}}">
                                </div>
                                <div class="form-group">
                                    <label for="icon_link_4">Link del icono 4</label>
                                    <input type="text" class="form-control" id="icon_link_4" name="icon_link_4" value ="{{ $home->icon_title_4 ?? ''}}">
                                </div>
                                <div class="form-group">
                                    <label for="icon">Imagen icono 4</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="icon_image_4" name="icon_image_4">
                                            <label class="custom-file-label" for="icon_image_4"></label>
                                        </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Elegir</span>
                                    </div>
                                    </div>
                                </div>
                                @if (isset($home->icon_image_4) && $home->icon_image_4 != '')
                                    <div class="row">
                                        <div class="col-12">
                                            <img src="/storage/{{$home->icon_image_4}}" class="img-thumbnail w-25 mt-3 mb-3"/>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
                <div class="row">

                    <div class="col-6">
                        <!-- general form elements -->
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Baner Medio</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="banner_text">Texto del banner</label>
                                    <input type="text" class="form-control" id="banner_text" name="banner_text" value ="{{ $home->banner_text ?? ''}}">
                                </div>
                                <div class="form-group">
                                    <label for="banner_link">Link del banner</label>
                                    <input type="text" class="form-control" id="banner_link" name="banner_link" value ="{{ $home->banner_link ?? ''}}">
                                </div>
                                <div class="form-group">
                                    <label for="icon">Imagen banner</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="banner_image" name="banner_image">
                                            <label class="custom-file-label" for="banner_image"></label>
                                        </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Elegir</span>
                                    </div>
                                    </div>
                                </div>
                                @if (isset($home->banner_image) && $home->banner_image != '')
                                    <div class="row">
                                        <div class="col-12">
                                            <img src="/storage/{{$home->banner_image}}" class="img-thumbnail w-25 mt-3 mb-3"/>
                                        </div>
                                    </div>
                                @endif
                            </div>
                            <!-- /.card-body -->
                        </div>
                        <!-- /.card -->
                    </div>
                </div>

                <div class="form-group mt-4 mb-0 pb-5">
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>

            </form>
        </div>
    </section>
                
@endsection

@section('scripts')
    <script src="{{asset('back/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js')}}"></script>
    <script src="{{asset('js/general.js')}}"></script>
@endsection