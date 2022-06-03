@extends('layouts.main')
@section('title', 'Chamado')

@section('content')
<main>
  <div class="container content-main">
    <div class="row g-0 content-request">
      <div class="col-md-12">
        <h3 class="titles">Chamado ID: {{$request->id}} </h3>
      </div>
      <div class="col-md-12 mt-3">
        <form class="row g-3" action="" method="post" name="create-request">
          <div class="col-md-3">
            <label for="created_at" class="form-label">Data de Abertura *</label>
            <input type="text" class="form-control" id="created_at" name="created_at" value="{{date("d/m/Y", strtotime($request->created_at))}} às {{date("H:i", strtotime($request->created_at))}}" required readonly />
          </div>
          <div class="col-md-5">
            <label for="created_by" class="form-label">Criado Por</label>
            <input type="text" class="form-control" id="created_by" name="created_by" value="" disabled readonly />
          </div>
          <div class="col-md-2">
            <label for="status" class="form-label">Status *</label>
            <select class="form-select" aria-label="Status" id="status" name="status" required>
              <option selected disabled>{{$request->status}}</option>
              <option value="Novo">Novo</option>
              <option value="Em Atendimento">Em Atendimento</option>
              <option value="Encerrado">Encerrado</option>
            </select>
          </div>
          <div class="col-md-2">
            <label for="origin_of_requisition" class="form-label">Origem da Requisição *</label>
            <select class="form-select" aria-label="origin_of_requisition" id="origin_of_requisition" name="request" required>
              <option selected disabled>{{$request->origin_of_requisition}}</option>
              <option value="Telefone">Telefone</option>
              <option value="E-mail">E-mail</option>
              <option value="Help Desk">Help Desk</option>
            </select>
          </div>
          <div class="col-md-3">
            <label for="department" class="form-label">Departamento *</label>
            <select class="form-select" aria-label="department" id="department" name="department" required>
              <option selected disabled>{{$request->department}}</option>
              <option value="DRI">DRI</option>
              <option value="SANEAMENTO">SANEAMENTO</option>
              <option value="ELETRICA">ELÉTRICA</option>
              <option value="GAS">GÁS</option>
              <option value="SECRETARIA-EXECUTIVA">SECRETARIA EXECUTIVA</option>
              <option value="ADMINISTRATIVO">ADMINISTRATIVO</option>
              <option value="FINANCEIRO">FINANCEIRO</option>
              <option value="ECONOMICO-FINANCEIRO">ECONÔMICO FINANCEIRO</option>
              <option value="RH">RH</option>
              <option value="TI">TI</option>
              <option value="MANUTENCAO">MANUTENÇÃO</option>
              <option value="SEGURANCA">SEGURANÇA</option>
              <option value="RECEPCAO">RECEPÇÃO</option>
              <option value="OUTROS">OUTROS</option>
            </select>
          </div>
          <div class="col-md-3">
            <label for="floor" class="form-label">Andar *</label>
            <select class="form-select" aria-label="floor" id="floor" name="floor" required>
              <option selected disabled>{{$request->floor}}</option>
              <option value="1">1º</option>
              <option value="2">2º</option>
              <option value="3">3º</option>
              <option value="4">4º</option>
              <option value="5">5º</option>
              <option value="6">6º</option>
              <option value="7">7º</option>
              <option value="S1">S1º</option>
              <option value="S2">S2º</option>
            </select>
          </div>
          <div class="col-md-3">
            <label for="branch_line" class="form-label">Ramal</label>
            <input type="number" class="form-control" id="branch_line" name="branch_line" min="0" value="{{$request->branch_line}}" />
          </div>
          <div class="col-md-3">
            <label for="location" class="form-label">Localização *</label>
            <select id="location" class="form-select" name="location" required>
              <option selected>{{$request->location}}</option>
              <option value="Frente">Frente</option>
              <option value="Fundos">Fundos</option>
              <option value="Sala de Reunião">Sala de Reunião</option>
            </select>
          </div>
          <div class="col-md-4">
            <label for="requester" class="form-label">Solicitante *</label>
            <input type="text" class="form-control" id="requester" name="requester" value="{{$request->requester}}" />
          </div>
          <div class="col-md-4">
            <label for="requester_email" class="form-label">E-mail do Solicitante</label>
            <input type="email" class="form-control" id="requester_email" name="requester_email" value="{{$request->requester_email}}"/>
          </div>
          <div class="col-md-2">
            <label for="problem" class="form-label">Tipo do Problema *</label>
            <input type="text" class="form-control" id="problem" name="problem" value="{{$request->problem}}" required />
          </div>
          <div class="col-md-2">
            <label for="priority" class="form-label">Prioridade *</label>
            <select id="priority" class="form-select" name="priority" required>
              <option selected>{{$request->priority}}</option>
              <option value="Baixa">Baixa</option>
              <option value="Média">Média</option>
              <option value="Alta">Alta</option>
              <option value="Urgente">Urgente</option>
            </select>
          </div>
          <div class="col-md-12">
            <label for="observation" class="form-label">Observações *</label>
            <textarea rows="5" class="form-control" aria-label="With textarea" id="observation" name="observation" required>{{$request->observation}}</textarea>
          </div>
          <div class="col-md-4">
            @if ($request->image)
            <img class="img-fluid rounded" src="/img/requests/{{$request->image}}" alt="Imagem do chamado">
            @else
            <img class="img-fluid rounded" src="/img/requests/image-not-found.jpg" alt="Imagem do chamado">
            @endif
          
          </div>
          <div class="col-12">
            <button type="submit" class="btn btn-success" id="btn-send">
              Atualizar chamado
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