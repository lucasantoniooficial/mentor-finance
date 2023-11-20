<x-layout.app>
    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <h2 class="card-title">Listas de compras</h2>
                <a href="{{route('purchaseLists.create')}}" class="btn btn-primary">Cadastrar</a>
            </div>
        </div>
        <div class="card-body">
            <x-notification type="success"></x-notification>
            <x-notification type="error"></x-notification>

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($purchaseLists as $purchaseList)
                        <tr>
                            <td class="align-middle">{{$purchaseList->name}}</td>
                            <td class="align-middle">{{$purchaseList->status}}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{route('lists.items.index', $purchaseList->id)}}" class="btn btn-dark" title="Items da lista de compra"><i class="fa-regular fa-rectangle-list"></i></a>
                                    <a href="{{route('lists.months.index', $purchaseList->id)}}" class="btn btn-warning" title="Planejar compra do mês"><i class="fa-solid fa-calendar"></i></a>
                                    <a href="{{route('purchaseLists.edit', $purchaseList->id)}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                    <a href="{{route('purchaseLists.destroy', $purchaseList->id)}}" onclick="event.preventDefault(); document.getElementById('user_form_delete_{{$purchaseList->id}}').submit()" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                    <form action="{{route('purchaseLists.destroy', $purchaseList->id)}}" id="user_form_delete_{{$purchaseList->id}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$purchaseLists->links()}}
        </div>
    </div>
</x-layout.app>
