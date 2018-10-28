@extends('layouts.app')

@section('content')

  @navbar_secundaria(['btnVoltarURL' => route('home'),
                             'title' => 'Cardápio',
                   'btnAdicionarURL' => route('cardapio_criar')]);
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


  <div class="accordion" id="accordionExample">
    @isset($categorias)
    @foreach ($categorias as $c)
      @if( count($c->itens) > 0)

      <div class="list-group-flush" >
        <div class="list-group-item list-group-item-action d-flex justify-content-between background-azul" type="button" data-toggle="collapse" data-target="#www{{ $c->id }}" aria-expanded="true" aria-controls="collapseOne">
          <div class="">
            <!-- Ícone -->
            <img class="list-img-icon" src="{{ Storage::url($c->icone) }}" alt="img_categoria">
            <!-- Label Nome -->
            <span>{{ $c->nome }}</span>
          </div>
        </div>
      </div>

      <div id="www{{ $c->id }}" class="collapse @if ($loop->first) show @endif background-lista-itens-cardapio" data-parent="#accordionExample">

          <div class=" lista-itens-cardapio">

              @foreach ($c->itens->sortBy("nome") as $i)
              <div class="container">
                <div class="row lista-itens-cardapio-linha">
                  <div class="col-4">
                    {{ $i->nome }}
                  </div>
                  <div class="col-4 text-center">
                    <span class="valorItem" required data-a-sign="R$ " data-a-dec="," data-a-sep="." data-v-max="999.99" data-v-min="0.01">{{ $i->valor }}</span>
                  </div>
                  <div class="col-4 text-right">
                    <a class="botao-cardapio-editar" href="{{ route('cardapio_editar', ['id' => $i->id]) }}"> <img class="list-img-action" src="{{ asset('img/edit.png') }}" alt="img_editar"> </a>
                    <button type="button" class="botao-cardapio-excluir" onclick="abrirModal({{$i->id}}, '{{ route('cardapio_apagar', ['id' => $i->id]) }}' )" data-toggle="modal" data-target="#modalExcluir"><img class="list-img-action" src="{{ asset('img/garbage.png') }}" alt="img_excluir"></button>
                  </div>
                </div>
              </div>
              @endforeach

          </div>

      </div>


      @endif
    @endforeach
    @endisset
  </div>

  @if(count($itens) == 0)
  <div class="alert alert-danger" role="alert">
      <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      Nenhum item foi cadastrado!
  </div>
  @endif


</div>




@endsection
