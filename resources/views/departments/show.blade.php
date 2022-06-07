@extends('layouts.main')
@section('title', 'Departamentos')

@section('content')
    <main>
        <div class="container content-main">
            <div class="row g-0 content-request">
                <div class="col-md-12">
                    <h1 class="titles">Departamentos <i class="bi bi-plus-circle"></i></h1>
                    <small class="text-muted">Departamentos Cadastrados</small>
                </div>
                <div class="col-md-6 mt-3 p-3 border-end">
                    <ul class="list-group list-group-flush">
                        @if (count($departments) == 0)
                            <li class="list-group-item">
                                <div class="alert alert-danger" role="alert">
                                    Sem departamentos cadastrados!
                                </div>
                            </li>
                        @else
                            <li class="list-group-item">
                                <b>Departamento - Andar</b>
                            </li>
                            @foreach ($departments as $department)
                                <li class="list-group-item">
                                    {{ $department->name }} - {{ $department->floor }}


                                    <div class="btn-group float-end" role="group" aria-label="Basic example">
                                        <a class="btn ms-2 ms-auto text-info"
                                            href="/departamento/editar/{{ $department->id }}">
                                            <ion-icon name="create-outline"></ion-icon>
                                        </a>
                                        <button type="button" class="btn text-danger" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal{{ $department->id }}">
                                            <ion-icon name="trash-outline"></ion-icon>
                                        </button>
                                        <!-- Modal Delete Department -->
                                        <div class="modal fade" id="exampleModal{{ $department->id }}" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog  modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Remover
                                                            Departamento
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Deseja realmente excluir esse departamento?</p>
                                                        <p>Nome: {{ $department->name }} - {{ $department->floor }}º
                                                            Andar
                                                        </p>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <form action="/departamento/excluir/{{ $department->id }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button class="btn btn-danger" type="submit">Remover</button>
                                                        </form>
                                                        <button type="button" class="btn btn-light"
                                                            data-bs-dismiss="modal">Cancelar</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </div>
                <div class="col-md-6 mt-3 p-3">
                    <form class="row g-3 needs-validation" novalidate action="/departamentos" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-6">
                            <label for="department" class="form-label">Nome do Departamento *</label>
                            <input type="text" class="form-control" id="department" name="name" maxlength="50"
                                placeholder="Digite o nome do departamento" required />
                            <div class="invalid-feedback">
                                Essa informação é importante
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="floor" class="form-label">Andar *</label>
                            <input type="text" class="form-control" id="floor" name="floor" placeholder="Qual o andar?"
                                required />
                            <div class="invalid-feedback">
                                Essa informação é importante
                            </div>
                        </div>
                        <div class="col-12">
                            <button type="submit" class="btn btn-success" id="btn-send">
                                Criar
                            </button>
                            <button type="reset" class="btn btn-danger" id="btn-send">
                                Limpar
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
@endsection
