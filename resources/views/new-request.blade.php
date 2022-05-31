@extends('layouts.main')
@section('title', 'Novo Chamado')

@section('content')
<main>
  <div class="container content-main">
    <div class="row g-0 content-request">
      <h3 class="titles">Novo Chamado <i class="bi bi-plus-circle"></i></h3>
      <br /><small class="text-muted">Crie um novo chamado</small>
      <div class="col-md-12 mt-5">
        <form class="row g-3" action="" method="post" name="create-request">
          <div class="col-md-3">
            <label for="date-start" class="form-label">Data de Abertura *</label>
            <input type="date" class="form-control" id="date-start" name="date-start" required />
          </div>
          <div class="col-md-6">
            <label for="user" class="form-label">Criado Por</label>
            <input type="text" class="form-control" id="user" name="user" value="" disabled readonly />
          </div>
          <div class="col-md-3">
            <label for="status" class="form-label">Status *</label>
            <select class="form-select" aria-label="Status" id="status" name="status" required>
              <option selected disabled>Selecione...</option>
              <option value="new">Novo</option>
              <option value="attendance">Em Atendimento</option>
              <option value="closed">Encerrado</option>
            </select>
          </div>
          <div class="col-md-3">
            <label for="request" class="form-label">Origem da Requisição *</label>
            <select class="form-select" aria-label="request" id="request" name="request" required>
              <option selected disabled>Selecione...</option>
              <option value="phone">Telefone</option>
              <option value="email-contact">E-mail</option>
              <option value="helpdesk">Help Desk</option>
            </select>
          </div>
          <div class="col-md-3">
            <label for="department" class="form-label">Departamento *</label>
            <select class="form-select" aria-label="department" id="department" name="department" required>
              <option selected disabled>Selecione...</option>
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
          <div class="col-md-2">
            <label for="floor" class="form-label">Andar *</label>
            <select class="form-select" aria-label="floor" id="floor" name="floor" required>
              <option selected disabled>Selecione...</option>
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
          <div class="col-md-2">
            <label for="ramal" class="form-label">Ramal</label>
            <input type="number" class="form-control" id="ramal" name="ramal" min="0" />
          </div>
          <div class="col-md-2">
            <label for="localization" class="form-label">Localização *</label>
            <select id="localization" class="form-select" name="localization" required>
              <option selected>Selecione...</option>
              <option value="frente">Frente</option>
              <option value="fundos">Fundos</option>
              <option value="sala-reuniao">Sala de Reunião</option>
            </select>
          </div>
          <div class="col-md-4">
            <label for="client" class="form-label">Solicitante *</label>
            <input type="text" class="form-control" id="client" name="client" />
          </div>
          <div class="col-md-4">
            <label for="client-email" class="form-label">E-mail do Solicitante</label>
            <input type="email" class="form-control" id="client-email" name="client-email" />
          </div>
          <div class="col-md-2">
            <label for="problem" class="form-label">Tipo do Problema *</label>
            <input type="txt" class="form-control" id="problem" name="problem" required />
          </div>
          <div class="col-md-2">
            <label for="priority" class="form-label">Prioridade *</label>
            <select id="priority" class="form-select" name="priority" required>
              <option selected>Selecione...</option>
              <option value="baixa">Baixa</option>
              <option value="media">Média</option>
              <option value="alta">Alta</option>
              <option value="urgente">Urgente</option>
            </select>
          </div>
          <div class="col-md-12">
            <label for="comments" class="form-label">Observações *</label>
            <textarea rows="5" class="form-control" aria-label="With textarea" id="comments" name="comments"
              required></textarea>
          </div>
          <div class="col-md-12">
            <input type="file" class="form-control" id="file" name="file" />
          </div>
          <div class="col-12">
            <button type="submit" class="btn btn-success" id="btn-send">
              Criar chamado
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