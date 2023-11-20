<x-layout.app>
    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <h2 class="card-title">Items da Lista de compra</h2>
               <div class="d-flex align-items-center gap-2">
                   <a href="{{route('purchaseLists.index')}}" class="btn btn-dark">Voltar</a>
                   <a href="{{route('lists.items.create', $purchaseList->id)}}" class="btn btn-primary">Cadastrar</a>
               </div>
            </div>
        </div>
        <div class="card-body">
            <x-notification type="success"></x-notification>
            <x-notification type="error"></x-notification>

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($itemLists as $itemList)
                        <tr>
                            <td class="align-middle">{{$itemList->name}}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{route('lists.items.edit', ['purchaseList' => $purchaseList->id, 'itemList' => $itemList->id])}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                    <a href="{{route('lists.items.destroy', ['purchaseList' => $purchaseList->id, 'itemList' => $itemList->id])}}" onclick="event.preventDefault(); document.getElementById('user_form_delete_{{$itemList->id}}').submit()" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                    <form action="{{route('lists.items.destroy', ['purchaseList' => $purchaseList->id, 'itemList' => $itemList->id])}}" id="user_form_delete_{{$itemList->id}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$itemLists->links()}}
        </div>
    </div>
</x-layout.app>
