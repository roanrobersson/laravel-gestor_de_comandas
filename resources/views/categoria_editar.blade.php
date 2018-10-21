@extends('layouts.app')

@section('content')

@navbar_secundaria(['btnVoltarURL' => route('categoria_listar'),
                    'title' => 'Editando categoria'] )
@endnavbar_secundaria

<div class="container p-0">


          <form class="bg-white p-3" action="{{ route('categoria_atualizar', ['id' => $categoria->id]) }} " method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf

            <div class="form-group" >
              <label for="nomeCategoria">Nome:</label>
              <input type="input" name="nome" class="form-control" id="nomeCategoria" placeholder="Nome" value={{ $categoria->nome}} maxlength="15" required>
            </div>

            <div class="form-group">
              <label for="browseIcone">Ícone:</label>
              <label class= "btn btn-secondary d-block" for="browseButton">Selecionar ícone</label>
              <input type="file" name="arquivo_icone" class="botao-browse" id="browseButton" onchange="readURL(this);"  accept=".png, .jpg" width="64" height="64">
            </div>

            <button type="submit" class="btn btn-primary botao-submit" >Salvar</button>

          </form>

</div>
@endsection
