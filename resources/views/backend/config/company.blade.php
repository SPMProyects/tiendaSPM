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
                                    <label for="exampleInputEmail1">Texto superior</label>
                                    <input type="text" class="form-control" id="superior_text" name="superior_text" value ="{{ $company->superior_text ?? ''}}">
                                </div>
                                <div class="form-group">
                                    <label for="superior_image">Imagenes superior</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="superior_image" name="superior_image">
                                            <label class="custom-file-label" for="superior_image"></label>
                                        </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Elegir</span>
                                    </div>
                                    </div>
                                </div>
                                @if (isset($company->superior_image) && $company->superior_image != '')
                                    <div class="row">
                                        <div class="col-12">
                                            <img src="/storage/{{$company->superior_image}}" class="img-thumbnail w-25 mt-3 mb-3"/>
                                        </div>
                                    </div>
                                @endif
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Texto inferior</label>
                                    <input type="text" class="form-control" id="inferior_text" name="inferior_text" value ="{{ $company->inferior_text ?? ''}}">
                                </div>
                                <div class="form-group">
                                    <label for="inferior_image">Imagenes inferior</label>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input type="file" class="custom-file-input" id="inferior_image" name="inferior_image">
                                            <label class="custom-file-label" for="inferior_image"></label>
                                        </div>
                                    <div class="input-group-append">
                                        <span class="input-group-text">Elegir</span>
                                    </div>
                                    </div>
                                </div>
                                @if (isset($company->inferior_image) && $company->inferior_image != '')
                                    <div class="row">
                                        <div class="col-12">
                                            <img src="/storage/{{$company->inferior_image}}" class="img-thumbnail w-25 mt-3 mb-3"/>
                                        </div>
                                    </div>
                                @endif
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