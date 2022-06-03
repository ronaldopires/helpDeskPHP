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
            </tr>
          </thead>
          <tbody>
            @foreach($listRequests as $request)
            <tr>
              <td class="text-center"><a class="nav-link" href="/chamado/{{$request->id}}">{{$request->id}}</a></td>
              <td>{{$request->requester}}</td>
              <td>{{$request->problem}}</td>
              <td>{{$request->status}}
                <a class="text-primary float-end" href="/chamado/status/{{$request->id}}">
                  <ion-icon name="create-outline" title="Editar Status"></ion-icon>
                </a>
              </td>
              <td>{{$request->department}}</td>
              <td class="text-center">{{$request->floor}}º</td>
              <td class="text-center">{{$request->branch_line}}</td>
              <td class="text-center">{{$request->location}}</td>
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