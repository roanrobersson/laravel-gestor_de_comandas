@extends('layouts.app')

@section('content')

  @navbar_secundaria(['btnVoltarURL' => route('home'),
                               'title' => 'Categorias',
                     'btnAdicionarURL' => route('categoria_criar')]);
  @endnavbar_secundaria

  @modal([  'modalId' => 'modalExcluir',
          'modalText' => 'Você realmente deseja excluír essa categoria?',
    'btnCancelarText' => 'Cancelar',
          'btnOKText' => 'Excluír']);
  @endmodal

<div class="container p-0">

  <div class="list-group-flush lista-categorias">

    @forelse ($categorias as $c)

      <div class="list-group-item list-group-item-action d-flex justify-content-between">
        <div class="">

          <!-- Ícone -->
          <img class="list-img-icon" src="{{ Storage::url($c->icone) }}" alt="img_categoria">

          <!-- Label Nome -->
          <span class="mb-1">{{ $c->nome }}</span>

        </div>

        <div class="mb-auto mt-auto">

          <!-- Botão editar -->
          <a class="botao-categoria-editar" href="{{ route('categoria_editar', ['id' => $c->id]) }}"> <img class="list-img-action" src="{{ asset('img/category/edit.png') }}" alt="img_editar"> </a>

          <!-- Botão excluir -->
          <button type="button" class="botao-categoria-excluir" onclick="abrirModal({{$c->id}}, '{{ route('categoria_apagar', ['id' => $c->id]) }}' )" data-toggle="modal" data-target="#modalExcluir"><img class="list-img-action" src="{{ asset('img/category/garbage.png') }}" alt="img_excluir"></button>

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
