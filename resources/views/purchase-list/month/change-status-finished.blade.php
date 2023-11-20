<x-layout.app>
    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <h2 class="card-title">Finalizando lista de compra</h2>
                <a href="{{route('dashboard')}}" class="btn btn-dark">Voltar</a>
            </div>
        </div>
        <div class="card-body">
            <x-notification type="success"></x-notification>
            <x-notification type="error"></x-notification>
            <form action="{{route('lists.months.change.finished', $purchaseMonth->id)}}" method="post">
                @csrf
                <x-input type="text" label="Total da compra" id="total" name="total" />
                <x-button>Salvar</x-button>
            </form>
        </div>
    </div>
</x-layout.app>
