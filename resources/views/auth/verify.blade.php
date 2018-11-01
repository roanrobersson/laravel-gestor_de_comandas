@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Verificar seu endereço de e-mail</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            Um novo link de verificação foi enviado para seu endereço de e-mail.
                        </div>
                    @endif
                    Antes de proceder, por favor procure o link de verificação em seu e-mail.
                    Se você não recebeu o e-mail, <a href="{{ route('verification.resend') }}">clique aqui para enviar outro</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
