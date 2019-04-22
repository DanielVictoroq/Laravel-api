@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>
                
                <div class="card-body">
                    <form id="formRegistro" method="POST" action="https://devel8.dialhost.com.br/projetos/laravel-api/public/register/post">
                        @csrf
                        <input type="text" name="nome_usuario" id = "nome_usuario" class="form-control" placeholder="Nome de Usuário">
                        <input type="password" name="password" id = "password" class="form-control"  placeholder="Senha">
                        <input type="email" name="email" id = "email" class="form-control" placeholder="E-mail">
                        <input type="text" name="nome" id = "nome" class="form-control" placeholder="Nome">
                        <input type="text" name="sobrenome" id = "sobrenome" class="form-control" placeholder="Sobrenome">
                        <input type="text" name="tipo" id = "tipo" class="form-control" placeholder="Tipo Usuário">
                        <input type="date" name="date" id = "date" class="form-control" placeholder="Data de Nascimento">
                        <input type="text" name="fone" id = "fone" class="form-control" placeholder="Telefone">
                        <button class = "btn btn-primary mt-4 col-md-3" type="submit">Cadastrar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="modalsucesso" tabindex="-1" role="dialog" aria-labelledby="modalsucesso" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalsucesso">Sucesso</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Sucesso
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-success fechar-modal" data-dismiss="modal" aria-label="Fechar">Ir para Home</button>
            </div>
        </div>
    </div>
</div>
@endsection
