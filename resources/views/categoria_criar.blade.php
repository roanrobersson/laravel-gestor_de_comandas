@extends('layouts.app')

@section('content')

@navbar_secundaria(['btnVoltarURL' => route('categoria_listar'),
                    'title' => 'Nova categoria'])
@endnavbar_secundaria

<div class="container p-0">



          <form class="bg-white p-3" action="{{ route('categoria_salvar') }}" method="POST" enctype="multipart/form-data">
            @method('POST')
            @csrf

            <div class="form-group" >
              <label for="nomeCategoria">Nome:</label>
              <input type="input" name="nome" class="form-control" id="nomeCategoria" placeholder="Nome" maxlength="15" required >
            </div>

            <div class="form-group">
              <label for="browseIcone">Ícone:</label>
              <label class= "btn btn-secondary d-block" for="browseButton">Selecionar ícone</label>
              <span class="small text-danger">*É recomendado selecionar um arquivo de 64x64 píxels.</span>
              <input type="file" name="arquivo_icone" class="botao-browse" id="browseButton" onchange="readURL(this);"  accept=".png, .jpg" width="64" height="64" required>
            </div>

            <button type="submit" class="btn btn-primary botao-submit" >Salvar</button>

          </form>


</div>
@endsection
