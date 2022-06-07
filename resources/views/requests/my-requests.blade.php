@extends('layouts.main')
@section('title', 'Meus Chamados')
@section('content')
    <main>
        <div class="container content-main">
            <div class="row g-0 content-request">
                <div class="col-md-12">
                    <h1 class="titles">Meus Chamados <i class="bi bi-card-checklist"></i></h1>
                    <small class="text-muted">Chamados abertos por </small>
                </div>
                <div class="col-md-12 mt-3 p-1 content-table">
                    <table id="table-my-request" class="table table-striped table-bordered" style="width: 100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Solicitante</th>
                                <th>Tipo do Problema</th>
                                <th>Status</th>
                                <th>Departamento</th>
                                <th>Andar</th>
                                <th>Ramal</th>
                                <th>Localização</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($requests as $request)
                                <tr class="text-center align-middle">
                                    <td><a class="nav-link"
                                            href="/chamado/{{ $request->id }}">{{ $request->id }}</a>
                                    </td>
                                    <td>{{ $request->requester }}</td>
                                    <td>{{ $request->problem }}</td>
                                    <td>{{ $request->status }}
                                        <button type="button" class="btn text-primary float-end" data-bs-toggle="modal"
                                            data-bs-target="#status{{ $request->id }}">
                                            <ion-icon name="create-outline"></ion-icon>
                                        </button>
                                        <a class="text-primary float-end nav-link"
                                            href="/chamado/status/{{ $request->id }}">

                                        </a>
                                        <!-- Modal status -->
                                        <div class="modal fade" id="status{{ $request->id }}" tabindex="-1"
                                            aria-labelledby="status{{ $request->id }}" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="status{{ $request->id }}">Chmado
                                                            ID: {{ $request->id }}
                                                        </h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <p>Alterar Status do Chamado ?</p>
                                                        <div class="col-md-10 mx-auto">
                                                            <form action="/chamado/status/{{ $request->id }}"
                                                                method="post">
                                                                @csrf
                                                                @method('PUT')
                                                                <div class="col-md-12 mb-3">
                                                                    <label for="status" class="form-label">Status
                                                                        *</label>
                                                                    <select class="form-select" aria-label="Status"
                                                                        id="status" name="status" required>
                                                                        <option selected disabled>{{ $request->status }}
                                                                        </option>
                                                                        <option value="Novo">Novo</option>
                                                                        <option value="Em Atendimento">Em Atendimento
                                                                        </option>
                                                                        <option value="Encerrado">Encerrado</option>
                                                                    </select>
                                                                </div>
                                                                <div class="col-md-12 text-center">
                                                                    <button type="submit"
                                                                        class="btn btn-success">Salvar</button>
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">Fechar</button>
                                                                </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>{{ $request->department }}</td>
                                    <td>{{ $request->floor }}</td>
                                    <td>
                                        @if ($request->branch_line)
                                            {{ $request->branch_line }}
                                        @else
                                            Não registrado
                                        @endif
                                    </td>
                                    <td>{{ $request->location }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Solicitante</th>
                                <th>Tipo do Problema</th>
                                <th>Status</th>
                                <th>Departamento</th>
                                <th>Andar</th>
                                <th>Ramal</th>
                                <th>Localização</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
