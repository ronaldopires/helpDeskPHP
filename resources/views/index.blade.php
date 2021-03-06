@extends('layouts.main')

@section('title', 'Dashboard')
@section('content')
<main>
  <div class="container content-main">
    <div class="row g-0 ">
      <div class="col-md-12">
        <h3 class="titles">Dashboard <i class="bi bi-graph-down"></i></h3>
        <small class="text-muted">Chamados</small>
      </div>
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-2 g-lg-3">
        <div class="col">
          <div class="card">
            <div class="card-header text-end">Chamados Hoje</div>
            <div class="card-body">
              <p class="card-numbers">{{ $ticketsDay }}</p>
            </div>
            <div class="card-footer text-center">
              <p class="card-text">
                <small class="text-muted"><i class="bi bi-clock"></i> Atualizado agora</small>
              </p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <div class="card-header text-end">Novos</div>
            <div class="card-body">
              <p class="card-numbers">{{ $ticketsNew }}</p>
            </div>
            <div class="card-footer text-center">
              <p class="card-text">
                <small class="text-muted"><i class="bi bi-clock"></i> Atualizado agora</small>
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-header text-end">Em Atendimento</div>
            <div class="card-body">
              <p class="card-numbers">{{ $ticketsAttendance }}</p>
            </div>
            <div class="card-footer text-center">
              <p class="card-text">
                <small class="text-muted"><i class="bi bi-clock"></i> Atualizado agora</small>
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-header text-end">Encerrados</div>
            <div class="card-body">
              <p class="card-numbers">{{ $ticketsClosed }}</p>
            </div>
            <div class="card-footer text-center">
              <p class="card-text">
                <small class="text-muted"><i class="bi bi-clock"></i> Atualizado agora</small>
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12 mt-4">
        <small class="text-muted">Usu??rios</small>
      </div>
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-2 g-lg-3">
        <div class="col">
          <div class="card">
            <div class="card-header text-end">Total de Usu??rios</div>
            <div class="card-body">
              <p class="card-numbers">{{$totalusers}}</p>
            </div>
            <div class="card-footer text-center">
              <p class="card-text">
                <small class="text-muted"><i class="bi bi-clock"></i> Atualizado agora</small>
              </p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <div class="card-header text-end">Ativos</div>
            <div class="card-body">
              <p class="card-numbers">{{$users_active}}</p>
            </div>
            <div class="card-footer text-center">
              <p class="card-text">
                <small class="text-muted"><i class="bi bi-clock"></i> Atualizado agora</small>
              </p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <div class="card-header text-end">Inativo</div>
            <div class="card-body">
              <p class="card-numbers">{{$users_inactive}}</p>
            </div>
            <div class="card-footer text-center">
              <p class="card-text">
                <small class="text-muted"><i class="bi bi-clock"></i> Atualizado agora</small>
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-12 mt-4">
        <small class="text-muted">Relat??rios</small>
      </div>
      <div class="row row-cols-1 row-cols-md-2 g-2 g-lg-3">
        <div class="col">
          <div class="col chart-index">
            <canvas id="tickets-for-day"></canvas>
          </div>
        </div>
        <div class="col">
          <div class="col chart-index">
            <canvas id="tickets-for-week"></canvas>
          </div>
        </div>
      </div>
      <div class="row row-cols-1 row-cols-md-2 g-2 g-lg-3">
        <div class="col">
          <div class="col chart-index">
            <h1 class="titles text-center">??ltimos Chamados</h1>
            <div class="col-12 requests-overflow">
              <div class="list-group">
                @if (count($lastRequests) == 0)
                <div class="m-3 alert alert-danger text-center alert-dismissible fade show" role="alert">
                  <ion-icon name="close-circle-outline"></ion-icon> Nenhum chamado foi criado
                </div>
                @else
                @foreach ($lastRequests as $request)
                <a href="/chamado/{{ $request->id }}" class="list-group-item list-group-item-action"
                  aria-current="true">
                  <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{{ $request->requester }}</h5>
                    <small>Criado ??s
                      {{ date('H:i', strtotime($request->created_at)) }}</small>
                  </div>
                  <p class="mb-1">{{ $request->problem }}</p>
                  <small>{{ $request->floor }}?? Andar - Ramal -
                    {{ $request->branch_line }} -
                    {{ $request->department }}</small>
                </a>
                @endforeach
                @endif
              </div>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="col chart-index">
            <canvas id="tickets-for-year"></canvas>
            <input type="hidden" id="requestYear" value="">
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
@endsection
