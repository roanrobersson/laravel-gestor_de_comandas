@extends('layouts.app')

@section('content')

  @navbar_secundaria(['btnURL' => route('home'),
                      'title' => 'Categorias'])
  @endnavbar_secundaria

  @alert @endalert

<div class="container p-0">

  <div class="list-group-flush">

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
          <button type="button" class="botao-categoria-excluir"  data-toggle="modal" data-target="#modalExcluir"><img class="list-img-action" src="{{ asset('img/category/garbage.png') }}" alt="img_excluir"></button>

        </div>

      </div>
    @empty
    <div class="alert alert-danger" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        Nenhuma categoria foi cadastrada!
    </div>
    @endforelse
</div>

  <!-- Botão flutuante -->
  <a href="{{ route('categoria_criar') }}"><img class="button-float" src="{{ asset('svg/plus.svg') }}"></a>

  @isset($c)
    <!-- modal_excluir -->
    <div class="modal fade" id="modalExcluir" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-body">
            Você realmente deseja excluír essa categoria?
          </div>
          <div class="modal-footer">

            <!-- Botão cancelar -->
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>

            <!-- Botão excluír -->
            <form class="form-categoria-editar" action={{ route('categoria_apagar', ['id' => $c->id]) }} method="post">
              @csrf
              @method('DELETE')
              <button type="submit" class="btn btn-primary">Excluír</button>
            </form>

          </div>
        </div>
      </div>
    </div>
    <!-- modal_excluir fim -->
  @endisset

@endsection
