@extends('layouts.app')

@section('content')

@navbar_secundaria(['btnVoltarURL' => route('comanda_listar'),
                    'title' => 'Editando comanda'] )
@endnavbar_secundaria

<div class="container p-0">


          <form class="bg-white p-3" action="{{ route('comanda_atualizar', ['id' => $comanda->id]) }} " method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="form-group" >
              <label for="nomeCategoria">Nome do cliente:</label>
              <input type="input" name="nomeCliente" class="form-control" id="nomeCategoria" placeholder="Nome" value="{{ $comanda->nomeCliente}}" maxlength="45" required>
            </div>

            <button type="submit" class="btn btn-primary botao-submit" >Salvar</button>

          </form>

</div>
@endsection
