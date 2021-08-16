@extends('backend.layout.layout')

@section('title', 'Monedas')

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Exportar - Importar cupones desde Excel</h1>
                </div>
            </div>
            
        </div>
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Exportar cupones a Excel</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <a href="{{route('cupon.export')}}" class="btn btn-primary">Exportar</a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Importar cupones desde Excel</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{route('cupon.import')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="form-group">
                                    <label for="images">Archivo</label>
                                    <div class="custom-file">
                                      <input type="file" class="custom-file-input" id="excel-file" name="excel-file">
                                      <label class="custom-file-label" for="images">Elige un archivo de Excel XLSX</label>
                                    </div>
                                  </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success">Importar</button>
                                </div>
                            </form>                    
                        </div>
                        <!-- /.card-body -->
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
