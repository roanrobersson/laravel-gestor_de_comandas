@extends('layouts.app')

@section('content')

@navbar_secundaria(['btnVoltarURL' => route('home'),
                    'title' => 'Cardápio',
                    'btnAdicionarURL' => route('cardapio_criar')]);
@endnavbar_secundaria

@alert @endalert

<div class="container p-0">



  <div class="accordion" id="accordionExample">

    @forelse ($categorias as $c)
    <div class="list-group-flush" >
      <button class="list-group-item list-group-item-action d-flex justify-content-between" type="button" data-toggle="collapse" data-target="#www{{ $c->id }}" aria-expanded="true" aria-controls="collapseOne">
        <div class="">
          <!-- Ícone -->
          <img class="list-img-icon" src="{{ Storage::url($c->icone) }}" alt="img_categoria">
          <!-- Label Nome -->
          <span>{{ $c->nome }}</span>
        </div>
      </button>
    </div>

    <div id="www{{ $c->id }}" class="collapse @if ($loop->first) show @endif background-lista-itens-cardapio" data-parent="#accordionExample">
      <div class="list-group-flush lista-itens-cardapio">

        @foreach ($categorias as $c)

          <div class="list-group-item list-group-item-action d-flex justify-content-between">
            <div class="">

              <!-- Label Nome -->
              <span class="mb-1">{{ $c->nome }}</span>

            </div>

            <div class="mb-auto mt-auto">

              <!-- Botão editar -->
              <a class="botao-categoria-editar" href="{{ route('categoria_editar', ['id' => $c->id]) }}"> <img class="list-img-action" src="{{ asset('img/category/edit.png') }}" alt="img_editar"> </a>

              <!-- Botão excluir -->
              <button type="button" class="botao-categoria-excluir"  data-toggle="modal" data-target="#modalExcluir"><img class="list-img-action" src="{{ asset('img/category/garbage.png') }}" alt="img_excluir"></button>

            </div>

          </div>
        @endforeach

      </div>
    </div>


    @empty
      <div class="alert alert-danger" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          Nenhuma categoria foi cadastrada!
      </div>
    @endforelse

  </div>

</div>
@endsection
