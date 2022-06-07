@extends('layouts.main')
@section('title', 'Novo Chamado')

@section('content')
    <main>
        <div class="container content-main">
            <div class="row g-0 content-request">
                <div class="col-md-12">
                    <h1 class="titles">Novo Chamado <i class="bi bi-plus-circle"></i></h1>
                    <small class="text-muted">Crie um novo chamado</small>
                </div>
                <div class="col-md-12 mt-3">
                    <form class="row g-3 needs-validation" novalidate action="/novo-chamado" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        <div class="col-md-6">
                            <label for="requester" class="form-label">Solicitante *</label>
                            <input type="text" class="form-control" id="requester" name="requester" list="datalistOptions"
                                id="exampleDataList" required placeholder="Quem está com o problema?" 
                                value="{{$user}}"/>
                            <datalist id="datalistOptions">
                                @foreach ($users as $user)
                                    <option value="{{ $user->requester }}">
                                @endforeach
                            </datalist>
                            <div class="invalid-feedback">
                                Essa informação é importante
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="status" class="form-label">Status *</label>
                            <select class="form-select" aria-label="status" id="status" name="status"
                                required="required">
                                <option value="">Selecione...</option>
                                <option value="Novo">Novo</option>
                                <option value="Em Atendimento">Em Atendimento</option>
                                <option value="Encerrado">Encerrado</option>
                            </select>
                            <div class="invalid-feedback">
                                Selecione o status
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label for="origin_of_requisition" class="form-label">Origem da Requisição *</label>
                            <select class="form-select" aria-label="request" id="origin_of_requisition"
                                name="origin_of_requisition" required="required">
                                <option value="">Selecione...</option>
                                <option value="Help Desk">Help Desk</option>
                                <option value="Telefone">Telefone</option>
                                <option value="E-mail">E-mail</option>
                            </select>
                            <div class="invalid-feedback">
                                Selecione a origem
                            </div>
                        </div>
                        <div class="col-md-6">
                            <label for="department" class="form-label">Departamento *</label>
                            <select class="form-select" aria-label="department" id="department" name="department"
                                required>
                                <option value="">Selecione...</option>
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
                            <div class="invalid-feedback">
                                Qual é o departamento?
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="floor" class="form-label">Andar *</label>
                            <select class="form-select" aria-label="floor" id="floor" name="floor" required>
                                <option value="">Selecione...</option>
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
                            <div class="invalid-feedback">
                                Selecione o andar
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="branch_line" class="form-label">Ramal</label>
                            <input type="number" class="form-control" id="branch_line" name="branch_line" min="0"
                                placeholder="Ex: 1234" />
                        </div>
                        <div class="col-md-2">
                            <label for="location" class="form-label">Localização *</label>
                            <select id="location" class="form-select" name="location" required>
                                <option value="">Selecione...</option>
                                <option value="Frente">Frente</option>
                                <option value="Fundos">Fundos</option>
                                <option value="Sala de Reunião">Sala de Reunião</option>
                            </select>
                            <div class="invalid-feedback">
                                Selecione a localização
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <label for="requester_email" class="form-label">E-mail do Solicitante</label>
                            <input type="email" class="form-control" id="requester_email" name="requester_email"
                                placeholder="example@corp.com" />
                        </div>
                        <div class="col-md-6">
                            <label for="problem" class="form-label">Tipo do Problema *</label>
                            <input type="txt" class="form-control" id="problem" name="problem"
                                placeholder="Resumo do problema" required />
                            <div class="invalid-feedback">
                                O que aconteceu?
                            </div>
                        </div>
                        <div class="col-md-2">
                            <label for="priority" class="form-label">Prioridade *</label>
                            <select id="priority" class="form-select" name="priority" required>
                                <option value="">Selecione...</option>
                                <option value="Baixa">Baixa</option>
                                <option value="Média">Média</option>
                                <option value="Alta">Alta</option>
                                <option value="Urgente">Urgente</option>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label for="observation" class="form-label">Observações *</label>
                            <textarea rows="5" class="form-control" aria-label="With textarea" id="observation" name="observation"
                                placeholder="Descreva melhor o problema" minlength="5" maxlength="10000"
                                required></textarea>
                        </div>
                        <div class="col-md-12">
                            <input type="file" class="form-control" id="file" name="image" />
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
