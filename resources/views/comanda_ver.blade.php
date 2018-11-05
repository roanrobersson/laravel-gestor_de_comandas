@extends('layouts.app')

@section('content')

  @navbar_secundaria(['btnVoltarURL' => route('comanda_listar'),
                             'title' => 'Visualizando comanda']);
  @endnavbar_secundaria

  @modal([  'modalId' => 'modalExcluir',
          'modalText' => 'Você realmente deseja excluír esse item?',
    'btnCancelarText' => 'Cancelar',
          'btnOKText' => 'Excluír']);
  @endmodal

  <script type="text/javascript">
    jQuery(function($) {
        $('.valorItem').autoNumeric('init');
    });
  </script>

<div class="container p-0">



  <div class="container card-comanda-titulo rounded">
    <div class="row card-comanda-titulo-row-nomeCliente text-center">
      <div class="col-12 text-center">
        {{ $comanda->nomeCliente }}
      </div>
    </div>
    <hr class="row m-0 p-0" style="border-top: 1px solid white;">
    <div class="row card-comanda-titulo-row-valorTotal">
      <div class="col-3 text-left" style="transform: translateY(10%)">
        Itens:
        {{ $comanda->itens->count()}}
      </div>
      <div class="col-5 text-left" style="transform: translateY(10%)">
        Valor total:
        <span>
          {{ $comanda->itens->sum('valor') }}
        </span>
      </div>
      <div class="col-4 text-right">
        <!-- Botão novo pedido-->

        <div class="dropdown d-inline dropleft">
          <button class=" botao-categoria-editar" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <img class="list-img-action" src="{{ asset('img/add_white.png') }}" alt="img_editar">
          </button>
          <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
            <div class="text-center font-weight-bold" style="color: #3490dc">
              <span>Selecione uma categoria</span>
            </div>
            @foreach($categoria as $c)
              <a class="dropdown-item" href="{{ route('comanda_novoPedido', ['id' => $comanda->id, 'categoria_id' => $c->id]) }}">
                <img class="list-img-action" src="{{ Storage::url($c->icone) }}" alt="img_editar">
                {{ $c->nome }}
              </a>
            @endforeach
          </div>
        </div>





        @if($comanda->itens->count('valor') > 0.01)
          <!-- Botão PagarComanda -->
          <a class="botao-categoria-editar ml-4" href="{{ route('comanda_pagar', ['id' => $comanda->id]) }}"> <img class="list-img-action" src="{{ asset('img/pay.png') }}" alt="img_editar"> </a>
        @endif
      </div>

    </div>
  </div>


  @forelse ($comanda->itens->sortBy("nome") as $ci)
  <div class="container">
    <div class="row lista-itens-comanda-linha">
      <div class="col-6">
        {{ $ci->nome }}
      </div>
      <div class="col-3 text-center ">
        <span class="valorItem">
          R$ {{ $ci->valorTotalComAdicionais($ci->pivot->id) }}
        </span>
      </div>
      <div class="col-3 text-right">
        @if($ci->pivot->observacao <> null)
          <div class="btn-group dropright">
            <button type="button" class="botao-categoria-excluir" data-toggle="dropdown" ><img class="list-img-action" src="{{ asset('img/observation.png') }}" alt="img_excluir"></button>
            <div class="dropdown-menu p-2" style="min-width: 20rem; max-width: 30rem;">
              <div class="text-center" style="color: #3490dc; ">
                <span>Observação</span>
              </div>

              <p style="min-height: 10rem; overflow: hidden">{{ $ci->pivot->observacao }}</p>
            </div>
          </div>
          @endif

        <!-- Botão excluir -->
        <button type="button" class="botao-categoria-excluir" onclick="abrirModal({{$ci->pivot->id}}, '{{ route('comanda_apagar_item', ['id' => $comanda->id, 'idItem' => $ci->pivot->id]) }}' )" data-toggle="modal" data-target="#modalExcluir"><img class="list-img-action" src="{{ asset('img/garbage.png') }}" alt="img_excluir"></button>
      </div>
    </div>
  </div>

  @empty
  <div class="alert alert-danger" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      Nenhum item foi adicionado na comanda!
  </div>
  @endforelse

  <div class="container">
    <div class="row comanda-ValorTotal rounded">
      <div class="col-6">
        Valor total:
      </div>
      <div class="col-3 text-center">
        <span class="valorItem" required data-a-sign="R$ " data-a-dec="," data-a-sep="." data-v-max="999.99" data-v-min="0.01">{{ $comanda->itens->sum('valor') }}</span>
      </div>
    </div>
  </div>


</div>


@endsection
