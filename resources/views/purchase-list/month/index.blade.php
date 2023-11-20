<x-layout.app>
    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <h2 class="card-title">Planejar compra do mês</h2>
                <div class="d-flex align-items-center gap-2">
                    <a href="{{route('purchaseLists.index')}}" class="btn btn-dark">Voltar</a>
                    <a href="{{route('lists.months.create', $purchaseList->id)}}" class="btn btn-primary">Cadastrar</a>
                </div>
            </div>
        </div>
        <div class="card-body">
            <x-notification type="success"></x-notification>
            <x-notification type="error"></x-notification>

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Data da compra</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($purchaseMonths as $purchaseMonth)
                        <tr>
                            <td class="align-middle">{{$purchaseMonth->purchase_date_formated}}</td>
                            <td class="align-middle">{{$purchaseMonth->status}}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{route('lists.months.edit', ['purchaseList' => $purchaseList->id, 'purchaseMonth' => $purchaseMonth->id])}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                    <a href="{{route('lists.months.destroy', ['purchaseList' => $purchaseList->id, 'purchaseMonth' => $purchaseMonth->id])}}" onclick="event.preventDefault(); document.getElementById('user_form_delete_{{$purchaseMonth->id}}').submit()" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                    <form action="{{route('lists.months.destroy', ['purchaseList' => $purchaseList->id, 'purchaseMonth' => $purchaseMonth->id])}}" id="user_form_delete_{{$purchaseMonth->id}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$purchaseMonths->links()}}
        </div>
    </div>
</x-layout.app>
