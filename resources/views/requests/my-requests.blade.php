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
                            <tr>
                                <td><a href="/chamado/5">5</a></td>
                                <td>Regislany Ribeiro</td>
                                <td>Não assina no sisdoc</td>
                                <td>Novo <a class="text-primary float-end" href="/chamado/status/">
                                        <ion-icon name="create-outline" title="Editar Status"></ion-icon>
                                    </a></td>
                                <td>SECRETARIA EXECUTIVA</td>
                                <td>7º</td>
                                <td>2256</td>
                                <td>Fundos</td>
                            </tr>
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
