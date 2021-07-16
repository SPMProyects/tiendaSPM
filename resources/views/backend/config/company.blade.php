@extends('backend.layout.layout')

@section('title', 'Empresa')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Pagina de empresa</h1>
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
                            <h3 class="card-title">Empresa</h3>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <form action="{{route('config.updatecompany')}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method("POST")
                            <div class="card-body">
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Titulo 1</label>
                                    <input type="text" class="form-control" id="title_1" name="title_1" value ="{{ $company->title_1 ?? ''}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Texto 1</label>
                                    <textarea class="form-control" id="text_1" name="text_1" cols="30" rows="10">{{ $company->text_1 ?? ''}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="image_1">Imagen 1</label>
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
                                @if (isset($company->image_1) && $company->image_1 != '')
                                    <div class="row">
                                        <div class="col-12">
                                            <img src="/storage/{{$company->image_1}}" class="img-thumbnail w-25 mt-3 mb-3"/>
                                        </div>
                                    </div>
                                @endif
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Titulo 2</label>
                                    <input type="text" class="form-control" id="title_2" name="title_2" value ="{{ $company->title_2 ?? ''}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Texto 2</label>
                                    <textarea class="form-control" id="text_2" name="text_2" cols="30" rows="10">{{ $company->text_2 ?? ''}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="image_2">Imagen 2</label>
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
                                
                                @if (isset($company->image_2) && $company->image_2 != '')
                                    <div class="row">
                                        <div class="col-12">
                                            <img src="/storage/{{$company->image_2}}" class="img-thumbnail w-25 mt-3 mb-3"/>
                                        </div>
                                    </div>
                                @endif
                                
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Titulo 3</label>
                                    <input type="text" class="form-control" id="title_3" name="title_3" value ="{{ $company->title_3 ?? ''}}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Texto 3</label>
                                    <textarea class="form-control" id="text_3" name="text_3" cols="30" rows="10">{{ $company->text_3 ?? ''}}</textarea>
                                </div>
                                <div class="form-group">
                                    <label for="image_3">Imagen 3</label>
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
                                @if (isset($company->image_3) && $company->image_3 != '')
                                    <div class="row">
                                        <div class="col-12">
                                            <img src="/storage/{{$company->image_3}}" class="img-thumbnail w-25 mt-3 mb-3"/>
                                        </div>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Titulo Banner</label>
                                    <input type="text" class="form-control" id="banner_title" name="banner_title" value ="{{ $company->banner_title ?? ''}}">
                                </div>
                                <div class="form-group">
                                    <label for="banner_image">Imagen Banner</label>
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
                                @if (isset($company->banner_image) && $company->banner_image != '')
                                    <div class="row">
                                        <div class="col-12">
                                            <img src="/storage/{{$company->banner_image}}" class="img-thumbnail w-25 mt-3 mb-3"/>
                                        </div>
                                    </div>
                                @endif
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
