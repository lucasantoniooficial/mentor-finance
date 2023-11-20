<x-layout.app>
    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <h2 class="card-title">Items da Lista de compra</h2>
            </div>
        </div>
        <div class="card-body">
            <x-notification type="success"></x-notification>
            <x-notification type="error"></x-notification>


            <form action="{{route('months.items.store', $purchaseMonth->id)}}" method="post">
                @csrf
                @foreach($items as $item)
                    <div class="d-flex align-items-center gap-2">
                            <span>{{$item->name}}</span>
                            <x-input type="number" :value="$purchaseMonth->purchaseItems->where('item_list_id', $item->id)->first()?->quantity" name="items[{{$item->id}}][quantity]" label="Quantidade" id="quantity" />
                            <x-input.checkbox label="Foi comprado ?" :checked="$purchaseMonth->purchaseItems->where('item_list_id', $item->id)->first()?->purchased" name="items[{{$item->id}}][purchased]" id="purchase"/>
                    </div>
                @endforeach
                <button class="btn btn-primary">Salvar</button>
            </form>
        </div>
    </div>
</x-layout.app>
