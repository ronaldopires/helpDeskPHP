@extends('layouts.main')

@section('title', 'Dashboard')
@section('content')
<main>
  <div class="container content-main">
    <div class="row g-0 ">
      <div class="col-md-12">
        <h3 class="titles">Dashboard <i class="bi bi-graph-down"></i></h3>
        <small class="text-muted">Resumo dos chamados</small>
      </div>
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-2 g-lg-3">
        <div class="col">
          <div class="card">
            <div class="card-header text-end">Chamados Hoje</div>
            <div class="card-body">
              <p class="card-numbers">{{$requestDay}}</p>
            </div>
            <div class="card-footer text-center">
              <p class="card-text">
                <small class="text-muted"><i class="bi bi-clock"></i> Atualizado 3 minutos atrás</small>
              </p>
            </div>
          </div>
        </div>
        <div class="col">
          <div class="card">
            <div class="card-header text-end">Novos</div>
            <div class="card-body">
              <p class="card-numbers">{{$requestNew}}</p>
            </div>
            <div class="card-footer text-center">
              <p class="card-text">
                <small class="text-muted"><i class="bi bi-clock"></i> Atualizado 3 minutos atrás</small>
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-header text-end">Em Atendimento</div>
            <div class="card-body">
              <p class="card-numbers">{{$attendance}}</p>
            </div>
            <div class="card-footer text-center">
              <p class="card-text">
                <small class="text-muted"><i class="bi bi-clock"></i> Atualizado 3 minutos atrás</small>
              </p>
            </div>
          </div>
        </div>
        <div class="col-md-6">
          <div class="card">
            <div class="card-header text-end">Encerrados</div>
            <div class="card-body">
              <p class="card-numbers">{{$closed}}</p>
            </div>
            <div class="card-footer text-center">
              <p class="card-text">
                <small class="text-muted"><i class="bi bi-clock"></i> Atualizado 3 minutos atrás</small>
              </p>
            </div>
          </div>
        </div>
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
            <h1 class="titles text-center">Últimos Chamados</h1>
            <div class="col-12 requests-overflow">
              <div class="list-group">                
                @if (count($lastRequests) == 0)
                <div class="m-3 alert alert-danger text-center alert-dismissible fade show" role="alert">
                  <ion-icon name="close-circle-outline"></ion-icon> Nenhum chamado foi criado
                </div>
                @else
                @foreach($lastRequests as $request)
                <a href="/chamado/{{$request->id}}" class="list-group-item list-group-item-action" aria-current="true">
                  <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">{{$request->requester}}</h5>
                    <small>Criado às {{date('H:i', strtotime($request->created_at))}}</small>
                  </div>
                  <p class="mb-1">{{$request->problem}}</p>
                  <small>{{$request->floor}}º Andar - Ramal - {{$request->branch_line}} - {{$request->department}}</small>
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
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<!-- <button type="button" class="btn btn-primary" id="liveToastBtn">
    Show live toast
  </button>
  <div class="toast-container position-fixed bottom-0 end-0 p-3">
    <div
      id="liveToast"
      class="toast"
      role="alert"
      aria-live="assertive"
      aria-atomic="true"
    >
      <div class="toast-header">
        <img src="" class="rounded me-2" alt="..." />
        <strong class="me-auto">Bootstrap</strong>
        <small>11 mins ago</small>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="toast"
          aria-label="Close"
        ></button>
      </div>
      <div class="toast-body">Hello, world! This is a toast message.</div>
    </div>
  </div> -->
@endsection