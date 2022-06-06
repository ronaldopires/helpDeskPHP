@extends('layouts.main')
@section('title', 'Chamados')
@section('content')
    <main>
        <div class="container content-main">
            <div class="row g-0 content-request">
                <div class="col-md-12">
                    <h1 class="titles">Fila de Chamados <i class="bi bi-card-checklist"></i></h1>
                    <small class="text-muted">Consulte todos os chamados da fila</small>
                </div>
                <div class="col-md-12 mt-3 p-1 py-2 content-table table-responsive-sm">
                    <table id="table-request" class="table table-striped table-bordered" style="width: 100%">
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
                                <th>Atribuir</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($listRequests as $request)
                                <tr class="text-center">
                                    <td><a class="nav-link"
                                            href="/chamado/{{ $request->id }}">{{ $request->id }}</a></td>
                                    <td>{{ $request->requester }}</td>
                                    <td>{{ $request->problem }}</td>
                                    <td>{{ $request->status }}</td>
                                    <td>{{ $request->department }}</td>
                                    <td>{{ $request->floor }}º</td>
                                    <td>{{ $request->branch_line }}</td>
                                    <td>{{ $request->location }}</td>
                                    <td>
                                        <a class="nav-link text-success" href="/add-request/{{ $request->id }}"
                                            title="Adicionar">
                                            <ion-icon name="add-circle-outline"></ion-icon>
                                        </a>
                                    </td>
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
                                <th>Obter Chamado</th>
                            </tr>
                        </tfoot>
                    </table>
                </div>
            </div>
        </div>
    </main>
@endsection
