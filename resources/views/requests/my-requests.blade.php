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
              <td>Novo</td>
              <td>SECRETARIA EXECUTIVA</td>
              <td>7º</td>
              <td>2256</td>
              <td>Fundos</td>
            </tr>
            <tr>
              <td><a href="/chamado/2">2</a></td>
              <td>Antenor Barbosa da Rocha</td>
              <td>Máquina Lenta</td>
              <td>Em Atendimento</td>
              <td>ELÉTRICA</td>
              <td>5º</td>
              <td>2245</td>
              <td>Fundos</td>
            </tr>
            <tr>
              <td><a href="/chamado/8">8</a></td>
              <td>Andresa Oliveira Santos</td>
              <td>Não consegue imprimir</td>
              <td>Encerrado</td>
              <td>DRI</td>
              <td>2º</td>
              <td>2034</td>
              <td>Fundos</td>
            </tr>
            <tr>
              <td><a href="/chamado/10">10</a></td>
              <td>Andréa Maria Romanof</td>
              <td>Instalar ferramenta Kairos</td>
              <td>Novo</td>
              <td>RH</td>
              <td>3º</td>
              <td>2234</td>
              <td>Frente</td>
            </tr>
            <tr>
              <td><a href="/chamado/12">12</a></td>
              <td>Bruno Cruz Silva</td>
              <td>Teams não abre</td>
              <td>Em Atendimento</td>
              <td>FINANCEIRO</td>
              <td>3º</td>
              <td>2048</td>
              <td>Frente</td>
            </tr>
            <tr>
              <td><a href="/chamado/18">18</a></td>
              <td>Bruno Delvaz Linhares </td>
              <td>Teams não abre</td>
              <td>Novo</td>
              <td>SANEAMENTO</td>
              <td>6º</td>
              <td>2181</td>
              <td>Fundos</td>
            </tr>
            <tr>
              <td><a href="/chamado/19">19</a></td>
              <td>Camila Pedron Vicente</td>
              <td>Fone de ouvido não funciona</td>
              <td>Encerrado</td>
              <td>DRI</td>
              <td>2º</td>
              <td>2225</td>
              <td>Frente</td>
            </tr>
            <tr>
              <td><a href="/chamado/1">1</a></td>
              <td>Danielle Christine Ramos Lodi</td>
              <td>Instalar Office 365</td>
              <td>Novo</td>
              <td>SANEAMENTO</td>
              <td>6º</td>
              <td>2187</td>
              <td>Fundos</td>
            </tr>
            <tr>
              <td><a href="/chamado/23">23</a></td>
              <td>Elaine Sandovette</td>
              <td>Máquina Lenta</td>
              <td>Em Atendimento</td>
              <td>SANEAMENTO</td>
              <td>6º</td>
              <td>2140</td>
              <td>Fundos</td>
            </tr>
            <tr>
              <td><a href="/chamado/20">20</a></td>
              <td>Eliésio Francisco da Silva</td>
              <td>Não assina no SAFI</td>
              <td>Em Atendimento</td>
              <td>GÁS</td>
              <td>4º</td>
              <td>2107</td>
              <td>Fundos</td>
            </tr>
            <tr>
              <td><a href="/chamado/29">29</a></td>
              <td>Antenor Barbosa da Rocha</td>
              <td>Máquina Lenta</td>
              <td>Em Atendimento</td>
              <td>ELÉTRICA</td>
              <td>5º</td>
              <td>2245</td>
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