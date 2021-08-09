@extends('backend.layout.layout')

@section('title', 'Usuarios')

@section('styles')
     
@endsection

@section('content')
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Exportar - Importar usuarios desde Excel</h1>
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
                            <h3 class="card-title">Exportar usuarios a Excel</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <a href="{{route('users.export')}}" class="btn btn-primary">Exportar</a>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
                <!-- /.col -->
                <div class="col-6">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Importar usuarios desde Excel</h3>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body">
                            <form action="{{route('users.import')}}" method="POST" enctype="multipart/form-data">
                                @csrf
                                @method('POST')
                                <div class="form-group">
                                    <label for="images">Archivo</label>
                                    <div class="custom-file">
                                      <input type="file" class="custom-file-input" id="excel-file" name="excel-file">
                                      <label class="custom-file-label" for="images">Elige un archivo de Excel XLSX</label>
                                    </div>
                                  </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Contraseña cifrada</label>
                                    <select class="form-control" id="encrypted" name="encrypted">
                                        <option></option>
                                        <option value="1">Si</option>
                                        <option value="0">No</option>
                                      </select>
                                </div>
                                <div class="card-footer">
                                    <button type="submit" class="btn btn-success">Importar</button>
                                </div>
                            </form>
                        </div>
                        <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                    @if (session()->has('status'))
                        <div class="row">
                            <div class="col-12">
                                <div class="alert alert-success col-12">
                                    {{session()->get('status')}}
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
                <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>

@endsection

@section('scripts')
    <!-- DataTables  & Plugins -->
    <script src="{{asset('back/plugins/datatables/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('back/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
    <script src="{{asset('back/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('back/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>
    <script src="{{asset('back/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('back/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
    <script src="{{asset('back/plugins/jszip/jszip.min.js')}}"></script>
    <script src="{{asset('back/plugins/pdfmake/pdfmake.min.js')}}"></script>
    <script src="{{asset('back/plugins/pdfmake/vfs_fonts.js')}}"></script>
    <script src="{{asset('back/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('back/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('back/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

    <!-- User Laravel Mix Scripts-->
    <script src="{{asset('js/user.js')}}"></script>
@endsection