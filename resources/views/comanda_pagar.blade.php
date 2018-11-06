@extends('layouts.app')

@section('content')

  @navbar_secundaria(['btnVoltarURL' => URL::previous(),
                             'title' => 'Fechar comanda']);
  @endnavbar_secundaria


  <script type="text/javascript">
    jQuery(function($) {
        $('.valorItem').autoNumeric('init');
    });
  </script>

<div class="container p-0">



  <div class="container card-comanda-titulo rounded">
    <div class="row card-comanda-titulo-row-nomeCliente text-center pb-3">
      <div class="col-12 text-center">
        {{ $comanda->nomeCliente }}
      </div>
    </div>

  </div>

  <div class="container">
    <form action="{{ route('comanda_atualizar_pagamento', ['id' => $comanda->id])  }}" method="POST" enctype="multipart/form-data">
      @method('PUT')
      @csrf

      <div class="row comanda-Fechar-Item">
        <div class="col-9">
          Pedidos:
        </div>
        <div class="col-3 text-center">
          <span>{{ $comanda->itens->count()}}</span>
        </div>
      </div>
      <div class="row comanda-Fechar-Item">
        <div class="col-9">
          Valor total:
        </div>
        <div class="col-3 text-center">
          <span class="valorItem" required data-a-sign="R$ " data-a-dec="," data-a-sep="." data-v-max="999.99" data-v-min="0.01">{{ $comanda->itens->sum('valor') }}</span>
        </div>
      </div>
      <div class="row comanda-Fechar-Item">
        <div class="col-9 mt-2">
          Desconto:
        </div>
        <div class="col-3 text-center">
          <input type="text" name="valorDesconto" value="0.00" class="form-control text-right valorItem text-center" placeholder="Valor" required data-a-sign="R$ " data-a-dec="," data-a-sep="." data-v-max="{{ $comanda->itens->sum('valor') }}" data-v-min="0.00">
        </div>
      </div>
      <div class="row comanda-ValorTotal rounded mt-5">
          <div class="col-12">
            <button type="submit" class="btn btn-primary botao-submit" >Finalizar</button>
          </div>
      </div>




    </form>
  </div>


</div>


@endsection
