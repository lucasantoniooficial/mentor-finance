<x-layout.app>
    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <h2 class="card-title">Listas de compras</h2>
                <a href="{{route('purchaseLists.index')}}" class="btn btn-dark">Voltar</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('purchaseLists.update', $purchaseList->id)}}" method="post">
                @csrf
                @method('PUT')
                <x-input type="text" label="Name" :value="$purchaseList->name" id="name" name="name" />
                <x-button>Salvar</x-button>
            </form>
        </div>
    </div>
</x-layout.app>
