@extends('layouts.main')
@section('title', 'Novo Departamento')

@section('content')
    <main>
        <div class="container content-main">
            <div class="row g-0 content-request">
                <div class="col-md-12">
                    <h1 class="titles">Editar Departamento <i class="bi bi-plus-circle"></i></h1>
                    <small class="text-muted">Crie um novo departamento</small>
                </div>
                <div class="col-md-12 mt-3">
                    <form class="row g-3 needs-validation" novalidate action="/departamento/editar/{{ $department->id }}"
                        method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="col-md-6">
                            <label for="department" class="form-label">Nome do Departamento *</label>
                            <input type="text" class="form-control" id="department" name="name"
                                value="{{ $department->name }}" required />
                            <div class="invalid-feedback">
                                Essa informação é importante
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="floor" class="form-label">Andar *</label>
                            <input type="text" class="form-control" id="floor" name="floor"
                                value="{{ $department->floor }}" required placeholder="Qual o andar?" />
                            <div class="invalid-feedback">
                                Essa informação é importante
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-success" id="btn-send">
                                Salvar
                            </button>
                            <a href="/departamentos" class="btn btn-info">
                                Voltar
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
