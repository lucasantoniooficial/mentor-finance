<x-layout.app>
    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <h2 class="card-title">Usuários</h2>
                <a href="{{route('users.index')}}" class="btn btn-dark">Voltar</a>
            </div>
        </div>
        <div class="card-body">
            <x-notification type="success"></x-notification>
            <x-notification type="error"></x-notification>
            <form action="{{route('users.store')}}" method="post">
                @csrf
                <x-input type="text" label="Nome" id="name" name="name" />
                <x-input type="email" label="E-mail" id="email" name="email" />
                <x-input type="password" label="Senha" id="password" name="password" />
                <x-input type="password" label="Confirmar a senha" id="password_confirmation" name="password_confirmation" />
                <x-button>Cadastrar</x-button>
            </form>
        </div>
    </div>
</x-layout.app>
