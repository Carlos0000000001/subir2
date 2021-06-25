@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Subir archivos') }}</div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            @if (session('status'))
                                <div class="alert alert-success" role="alert">
                                    {{ session('status') }}
                                </div>
                            @endif
                            <form method="POST" action="{{ route('user.files.store') }}"
                                  enctype="multipart/form-data">
                                @csrf
                                <input type="file"class="form-control" name="files[]" multiple>
                                <button type="submit" class=" mt-4 btn btn-primary float-right">
                                    subir
                                </button>
                            </form>

                            {{ __('You are logged in!') }}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col-md-12">
            <div class="card border border-primary">
                <div class="card-header bg-primary text-white font-weight-bold">
                    {{ __('Listado de Archivos') }}
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-sm table-bordered">
                                <thead class="thead-dark">
                                    <tr>
                                        <th>#</th>
                                        <th>Archivo</th>
                                        <th>Accion</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse( $files as $archivo)
                                        <tr>
                                            <td>{{$loop->iteration}}</td>
                                            <td>{{ $archivo->name }}</td>
                                            <td>
                                                @if(strpos($archivo->name,'.pdf')>0)
                                                    <a
                                                        class="btn btn-sm btn-info text-white"
                                                        href="{{ "/storage/archivos/".Auth::id().'/'.$archivo->name }}" >
                                                        Ver
                                                    </a>
                                                @endif
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td>-- Datos No Registrados --</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
