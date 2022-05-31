@extends('layouts.main')

@section('title', 'Dashboard')
@section('content')
<main>
  <div class="container content-main">
    <div class="row g-0">
      <h3 class="titles">Dashboard <i class="bi bi-graph-down"></i></h3>
      <br /><small class="text-muted">Resumo dos chamados</small>
      <div class="row row-cols-1 row-cols-md-2 row-cols-lg-4 g-2 g-lg-3">
        <div class="col">
          <div class="card">
            <div class="card-header text-end">Chamados Hoje</div>
            <div class="card-body">
              <p class="card-numbers">20</p>
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
            <div class="card-header text-end">Pendentes</div>
            <div class="card-body">
              <p class="card-numbers">10</p>
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
              <p class="card-numbers">5</p>
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
              <p class="card-numbers">5</p>
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
            <div class="col-12 overflow-auto" style="height: 247px">
              <div class="list-group">
                <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                  <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">Angelica Ramos</h5>
                    <small>3 min ago</small>
                  </div>
                  <p class="mb-1">Não conecta na internet</p>
                  <small>7º Andar - Ramal - 2222 - RH</small>
                </a>
                <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                  <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">Angelica Ramos</h5>
                    <small>3 min ago</small>
                  </div>
                  <p class="mb-1">Não conecta na internet</p>
                  <small>7º Andar - Ramal - 2222 - RH</small>
                </a>
                <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                  <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">Angelica Ramos</h5>
                    <small>3 min ago</small>
                  </div>
                  <p class="mb-1">Não conecta na internet</p>
                  <small>7º Andar - Ramal - 2222 - RH</small>
                </a>
                <a href="#" class="list-group-item list-group-item-action" aria-current="true">
                  <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">Angelica Ramos</h5>
                    <small>3 min ago</small>
                  </div>
                  <p class="mb-1">Não conecta na internet</p>
                  <small>7º Andar - Ramal - 2222 - RH</small>
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                  <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">List group item heading</h5>
                    <small class="text-muted">3 days ago</small>
                  </div>
                  <p class="mb-1">Some placeholder content in a paragraph.</p>
                  <small class="text-muted">And some muted small print.</small>
                </a>
                <a href="#" class="list-group-item list-group-item-action">
                  <div class="d-flex w-100 justify-content-between">
                    <h5 class="mb-1">List group item heading</h5>
                    <small class="text-muted">3 days ago</small>
                  </div>
                  <p class="mb-1">Some placeholder content in a paragraph.</p>
                  <small class="text-muted">And some muted small print.</small>
                </a>
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
</main>
@endsection