<x-layout.app>
    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <h2 class="card-title">Items da Lista de compra</h2>
                <a href="{{route('lists.items.index', ['purchaseList' => $purchaseList->id])}}" class="btn btn-dark">Voltar</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('lists.items.update', ['purchaseList' => $purchaseList->id, 'itemList' => $itemList->id])}}" method="post">
                @csrf
                @method('PUT')
                <x-input type="text" label="Name" :value="$itemList->name" id="name" name="name" />
                <x-button>Salvar</x-button>
            </form>
        </div>
    </div>
</x-layout.app>
