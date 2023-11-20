<x-layout.app>
    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <h2 class="card-title">Listas de compras</h2>
                <a href="{{route('purchaseLists.index')}}" class="btn btn-dark">Voltar</a>
            </div>
        </div>
        <div class="card-body">
            <x-notification type="success"></x-notification>
            <x-notification type="error"></x-notification>
            <form action="{{route('purchaseLists.store')}}" method="post">
                @csrf
                <x-input type="text" label="Nome" id="name" name="name" />
                <x-button>Cadastrar</x-button>
            </form>
        </div>
    </div>
</x-layout.app>
