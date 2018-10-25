@extends('layouts.app')

@section('content')

  @navbar_secundaria(['btnVoltarURL' => route('home'),
                             'title' => 'Adicionais',
                   'btnAdicionarURL' => route('adicional_criar')]);
  @endnavbar_secundaria

  @modal([  'modalId' => 'modalExcluir',
          'modalText' => 'Você realmente deseja excluír esse adicional?',
    'btnCancelarText' => 'Cancelar',
          'btnOKText' => 'Excluír']);
  @endmodal

<div class="container p-0">


  <div class="accordion" id="accordionExample">
    @isset($categorias)
    @foreach ($categorias as $c)
      @if( count($c->itens) > 0)

      <div class="list-group-flush" >
        <div class="list-group-item list-group-item-action d-flex justify-content-between" type="button" data-toggle="collapse" data-target="#www{{ $c->id }}" aria-expanded="true" aria-controls="collapseOne">
          <div class="">
            <!-- Ícone -->
            <img class="list-img-icon" src="{{ Storage::url($c->icone) }}" alt="img_categoria">
            <!-- Label Nome -->
            <span>{{ $c->nome }}</span>
          </div>
        </div>
      </div>

      <div id="www{{ $c->id }}" class="collapse @if ($loop->first) show @endif background-lista-itens-cardapio" data-parent="#accordionExample">
        <div class="list-group-flush lista-itens-cardapio">

          @foreach ($c->itens as $i)

            <div class="list-group-item list-group-item-action d-flex justify-content-between">
              <div class="nomeItem">

                <!-- Label Nome -->
                <span class="mb-1 ">{{ $i->nome }}</span>
              </div>

              <div class="mb-auto mt-auto">

                <!-- Botão editar -->
                <a class="botao-cardapio-editar" href="{{ route('cardapio_editar', ['id' => $i->id]) }}"> <img class="list-img-action" src="{{ asset('img/category/edit.png') }}" alt="img_editar"> </a>

                <!-- Botão excluir -->
                <button type="button" class="botao-cardapio-excluir" onclick="abrirModal({{$i->id}}, '{{ route('cardapio_apagar', ['id' => $i->id]) }}' )" data-toggle="modal" data-target="#modalExcluir"><img class="list-img-action" src="{{ asset('img/category/garbage.png') }}" alt="img_excluir"></button>

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
