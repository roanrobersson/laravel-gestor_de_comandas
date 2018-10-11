@extends('layouts.app')

@section('content')
<div class="container p-0">



          <form class="bg-white p-3">

            <div class="form-group" >
              <label for="nomeCategoria">Nome:</label>
              <input type="text" class="form-control" id="nomeCategoria" placeholder="Nome">
            </div>

            <div class="form-group">
              <label for="exampleFormControlFile1">Example file input</label>
              <input type="file" class="form-control-file" id="exampleFormControlFile1" onchange="readURL(this);" >
            </div>
            <img id="blah" alt="your image" width="50px" height="50px"/>

            <button type="submit" class="btn btn-primary">Submit</button>

          </form>


</div>
@endsection
