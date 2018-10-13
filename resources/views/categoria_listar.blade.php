@extends('layouts.app')

@section('content')

@navbar_secundaria(['btnURL' => route('home'), 'title' => 'Categorias'] )@endnavbar_secundaria


<div class="container p-0">




  <div class="list-group-flush">
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

  <a href="{{ route('categoria_criar') }}"><img class="button-float" src="{{ asset('svg/plus.svg') }}"></a>

@endsection
