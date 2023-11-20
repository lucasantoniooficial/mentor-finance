<x-layout.app>
    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <h2 class="card-title">Planejar compra do mês</h2>
                <a href="{{route('lists.months.index', $purchaseList->id)}}" class="btn btn-dark">Voltar</a>
            </div>
        </div>
        <div class="card-body">
            <x-notification type="success"></x-notification>
            <x-notification type="error"></x-notification>
            <form action="{{route('lists.months.update', ['purchaseList' => $purchaseList->id, 'purchaseMonth' => $purchaseMonth->id])}}" method="post">
                @csrf
                @method('PUT')
                <x-input type="date" label="Data da compra" :value="$purchaseMonth->purchase_date" id="purchase_date" name="purchase_date" />
                <x-button>Salvar</x-button>
            </form>
        </div>
    </div>
</x-layout.app>
