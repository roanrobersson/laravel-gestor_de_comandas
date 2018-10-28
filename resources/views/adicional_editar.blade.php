@extends('layouts.app')

@section('content')

@navbar_secundaria(['btnVoltarURL' => route('adicional_listar'),
                    'title' => 'Editando adicional'] )
@endnavbar_secundaria

<script type="text/javascript">
  jQuery(function($) {
      $('#valorItem').autoNumeric('init');
  });
</script>

<div class="container p-0">

  <form class="bg-white p-3" action="{{ route('adicional_atualizar', ['id' => $adicional->id]) }}" method="POST" enctype="multipart/form-data">
    @method('PUT')
    @csrf

    <div class="form-group" >
      <label for="nomeItem">Nome:</label>
      <input type="text" name="nome" class="form-control" id="nomeItem" value={{ $adicional->nome }} placeholder="Nome" maxlength="30" required >
    </div>

    <div class="form-group">
      <label for="categoria">Categoria:</label>
      <select class="form-control" name="categoria_id" id="categoria" required>

        @foreach ($categorias as $c)

          @if ($c->id == $adicional->categoria_id)
            <option value="{{ $c->id }}" selected="true">{{ $c->nome }}</option>
          @else
            <option value="{{ $c->id }}">{{ $c->nome }}</option>
          @endif

        @endforeach
      </select>
    </div>

    <div class="form-group" >
      <label for="valorItem">Valor:</label>
      <input type="text" name="valor" class="form-control text-right" id="valorItem" value={{ $adicional->valor}} placeholder="Valor" required data-a-sign="R$ " data-a-dec="," data-a-sep="." data-v-max="999.99" data-v-min="0.01">
    </div>

    <button type="submit" class="btn btn-primary botao-submit" >Salvar</button>

  </form>

</div>
@endsection
