@extends('layouts.app')

@section('content')

  @navbar_secundaria(['btnURL' => route('home'),
                      'title' => 'Categorias'])
  @endnavbar_secundaria

<div class="container p-0">

  <div class="list-group-flush">

    @foreach ($categorias as $c)

      <div class="list-group-item list-group-item-action d-flex justify-content-between">
        <div class="">

          <!-- Ícone -->
          <img class="list-img-icon" src="{{ Storage::url('categoria_icone/' . $c->icone . '.png') }}" alt="img_categoria">

          <!-- Label Nome -->
          <span class="mb-1">{{ $c->nome }}</span>

        </div>

        <div class="mb-auto mt-auto">

          <!-- Botão editar -->
          <a href="{{ route('categoria_editar', ['id' => $c->id]) }}"> <img class="list-img-action" src="{{ asset('img/category/edit.png') }}" alt="img_editar"> </a>

          <!-- Botão excluir -->
          <button type="button" class="botao-categoria-editar"  data-toggle="modal" data-target="#modalExcluir"><img class="list-img-action" src="{{ asset('img/category/garbage.png') }}" alt="img_excluir"></button>

        </div>

      </div>

    @endforeach



    <div class="list-group-item list-group-item-action d-flex justify-content-between">
      <div class="">
        <img class="list-img-icon mr-3" src="{{ asset('img/category/refrigerante.png') }}" alt="img_categoria">
        <span class="mb-1">Refrigerante</span>
      </div>
      <div class="mb-auto mt-auto">
        <a href="#"> <img class="list-img-action mr-3" src="{{ asset('img/category/edit.png') }}" alt="img_editar"> </a>
        <a href="#"> <img class="list-img-action mr-3" src="{{ asset('img/category/garbage.png') }}" alt="img_excluir"> </a>
      </div>
    </div>


    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start justify-content-between">
        <img class="list-img mr-3" src="{{ asset('img/category/x.png') }}" alt="img_categoria">
      <span class="mb-1">X</span>
    </a>
    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start justify-content-between">
      <img class="list-img mr-3" src="{{ asset('img/category/bebida.png') }}" alt="img_categoria">
      <span class="mb-1">Bebida</span>
    </a>
    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start justify-content-between">
      <img class="list-img mr-3" src="{{ asset('img/category/cachorro-quente.png') }}" alt="img_categoria">
      <span class="mb-1">Cachorro-Quente</span>
    </a>
    <a href="#" class="list-group-item list-group-item-action flex-column align-items-start justify-content-between">
      <img class="list-img mr-3" src="{{ asset('img/category/sanduiche.png') }}" alt="img_categoria">
      <span class="mb-1">Sanduiche</span>
    </a>

</div>

  <!-- Botão flutuante -->
  <a href="{{ route('categoria_criar') }}"><img class="button-float" src="{{ asset('svg/plus.svg') }}"></a>

  <!-- modal_excluir -->
  <div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-body">
          Você realmente deseja excluír a categoria "{{ $c->nome}}"?
        </div>
        <div class="modal-footer">
          
          <!-- Botão cancelar -->
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

          <!-- Botão excluír -->
          <form class="form-categoria-editar" action={{ url('/categoria') . '/' . $c->id }} method="post">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-primary">Excluír</button>
          </form>

        </div>
      </div>
    </div>
  </div>
  <!-- modal_excluir fim -->


@endsection
