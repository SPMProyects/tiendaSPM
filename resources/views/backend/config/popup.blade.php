@extends('backend.layout.layout')

@section('title', 'Pop-ups')

@section('styles')
    <link rel="stylesheet" href="{{asset('back/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.min.css')}}">
@endsection

@section('content')

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pop-Ups</h1>
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
            <form action="{{route('config.updatepopup')}}" method="POST" enctype="multipart/form-data">
                @csrf
                @method("POST")

                <div class="row">
                    <div class="col-6">
                        <!-- general form elements -->
                        <div class="card card-primary">
                            <div class="card-header">
                                <h3 class="card-title">Popup 1</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title_1">Titulo del popup 1</label>
                                    <input type="text" class="form-control" id="title_1" name="title_1" value ="{{ $popup->title_1 ?? ''}}">
                                </div>
                                <div class="form-group">
                                    <label for="text_1">Texto del popup 1</label>
                                    <textarea class="form-control" id="text_1" name="text_1">{{ $popup->text_1 ?? ''}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="button_1">Texto del popup 1</label>
                                    <input type="text" class="form-control" id="button_1" name="button_1" value ="{{ $popup->button_1 ?? ''}}">
                                </div>
                                <div class="form-group">
                                    <label for="link_1">Link del popup 1</label>
                                    <input type="text" class="form-control" id="link_1" name="link_1" value ="{{ $popup->link_1 ?? ''}}">
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
                                @if (isset($popup->image_1) && $popup->image_1 != '')
                                    <div class="row">
                                        <div class="col-12">
                                            <img src="/storage/{{$popup->image_1}}" class="img-thumbnail w-25 mt-3 mb-3"/>
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
                                <h3 class="card-title">Popup 2</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title_2">Titulo del popup 2</label>
                                    <input type="text" class="form-control" id="title_2" name="title_2" value ="{{ $popup->title_2 ?? ''}}">
                                </div>
                                <div class="form-group">
                                    <label for="text_2">Texto del popup 2</label>
                                    <textarea class="form-control" id="text_2" name="text_2">{{ $popup->text_2 ?? ''}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="button_2">Texto del popup 2</label>
                                    <input type="text" class="form-control" id="button_2" name="button_2" value ="{{ $popup->button_2 ?? ''}}">
                                </div>
                                <div class="form-group">
                                    <label for="link_2">Link del popup 2</label>
                                    <input type="text" class="form-control" id="link_2" name="link_2" value ="{{ $popup->link_2 ?? ''}}">
                                </div>
                                <div class="form-group">
                                    <label for="icon">Popup 2</label>
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
                                @if (isset($popup->image_2) && $popup->image_2 != '')
                                    <div class="row">
                                        <div class="col-12">
                                            <img src="/storage/{{$popup->image_2}}" class="img-thumbnail w-25 mt-3 mb-3"/>
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
                                <h3 class="card-title">Popup 3</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="title_3">Titulo del popup 3</label>
                                    <input type="text" class="form-control" id="title_3" name="title_3" value ="{{ $popup->title_3 ?? ''}}">
                                </div>
                                <div class="form-group">
                                    <label for="text_3">Texto del popup 3</label>
                                    <textarea class="form-control" id="text_3" name="text_3">{{ $popup->text_3 ?? ''}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="button_3">Texto del popup 3</label>
                                    <input type="text" class="form-control" id="button_3" name="button_3" value ="{{ $popup->button_3 ?? ''}}">
                                </div>
                                <div class="form-group">
                                    <label for="link_3">Link del popup 3</label>
                                    <input type="text" class="form-control" id="link_3" name="link_3" value ="{{ $popup->link_3 ?? ''}}">
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
                                @if (isset($popup->image_3) && $popup->image_3 != '')
                                    <div class="row">
                                        <div class="col-12">
                                            <img src="/storage/{{$popup->image_3}}" class="img-thumbnail w-25 mt-3 mb-3"/>
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