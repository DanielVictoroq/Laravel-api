@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mt-2">
            <div class="card bg-primary">

                <div class="card-header"><h5 class="text-white mb-0">Registro de Morador</h5></div>
                <div class="card-body">
                    <form id="formRegistro" method="POST" action="{{url('register/post')}}">
                        @csrf
                        <div class="d-flex align-items-center input-cad ">
                            <label for="nome_usuario">Nome de Usuário</label>
                            <input type="text" name="nome_usuario" id = "nome_usuario" class="form-control mb-2" placeholder="Nome de Usuário">
                        </div>
                        <div class="d-flex align-items-center input-cad">
                            <label for="password">Senha</label>
                            <input type="password" name="password" id = "password" class="form-control mb-2"  placeholder="Senha">
                        </div>
                        <div class="d-flex align-items-center input-cad">
                            <label for="email">E-mail</label>
                            <input type="email" name="email" id = "email" class="form-control mb-2" placeholder="E-mail">
                        </div>
                        <div class="d-flex align-items-center input-cad">
                            <label for="nome">Nome</label>
                            <input type="text" name="nome" id = "nome" class="form-control mb-2" placeholder="Nome">
                        </div>
                        <div class="d-flex align-items-center input-cad">
                            <label for="sobrenome">Sobrenome</label>
                            <input type="text" name="sobrenome" id = "sobrenome" class="form-control mb-2" placeholder="Sobrenome">
                        </div>
                        <div class="d-flex align-items-center input-cad">
                            <label for="date">Data de Nascimento</label>
                            <input type="text" name="date" id = "date" class="form-control mb-2" placeholder="Data de Nascimento">
                        </div>
                        <div class="d-flex align-items-center input-cad">
                            <label for="fone">Telefone</label>
                            <input type="text" name="fone" id = "fone" class="form-control mb-2" placeholder="Telefone">
                        </div>
                        <div class="d-flex align-items-center input-cad">
                            <label for="condominio">Condominio</label>
                            <select name="condominio" id="condominio" class="form-control mb-2">
                                <option value="0">Escolha...</option>
                                @foreach ($data as $item)
                                <option value="{{$item->id_condominio}}">{{$item->nome_cond}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="d-flex align-items-center input-cad">
                            <label for="n_apt">Númerio do Apartamento</label>
                            <input type="text" name="n_apt" id = "n_apt" class="form-control mb-2" placeholder="Número do Apartamento">
                        </div>
                        <button class = "btn btn-success mt-4 col-md-4 offset-md-4" type="submit">Cadastrar</button>
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
