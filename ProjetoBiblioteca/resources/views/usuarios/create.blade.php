@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>Criar Novo Usuário</h1>
        <form action="{{ route('usuarios.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" name="nome" class="form-control" id="nome" required>
            </div>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" required>
            </div>
            <div class="mb-3">
                <label for="role" class="form-label">Papel</label>
                <select name="role" class="form-select" id="role" required>
                    <option value="usuario">Usuário</option>
                    <option value="bibliotecario">Bibliotecário</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Criar</button>
        </form>
    </div>
@endsection
