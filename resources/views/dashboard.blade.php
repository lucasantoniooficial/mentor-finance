<x-layout.app>
    <div class="p-4">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Saldo disponível</h4>
                        <p class="fw-bold fs-3">R$ {{number_format($balanceAccount, 2,',','.')}}</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="card mt-4">
            <div class="card-body">
                <x-notification type="success"></x-notification>
                <x-notification type="error"></x-notification>
                <h4 class="card-title">Lista de compras do mês</h4>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>Identificador</th>
                            <th>Data</th>
                            <th>Status</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($purchaseMonths as $purchaseMonth)
                            <tr>
                                <td class="align-middle">{{$purchaseMonth->purchaseList->name}}</td>
                                <td class="align-middle">{{$purchaseMonth->purchase_date_formated}}</td>
                                <td class="align-middle">{{$purchaseMonth->status}}</td>
                                <td>
                                    <div class="btn-group">
                                        @if($purchaseMonth->status == 'Pendente')
                                            <a href="{{route('lists.months.change.shopping', $purchaseMonth->id)}}" onclick="event.preventDefault(); document.getElementById('change-status-shopping-{{$purchaseMonth->id}}').submit()" class="btn btn-warning" title="Mudar status para comprando"><i class="fas fa-credit-card"></i></a>
                                            <form action="{{route('lists.months.change.shopping', $purchaseMonth->id)}}" method="post" id="change-status-shopping-{{$purchaseMonth->id}}">
                                                @csrf
                                            </form>
                                        @endif
                                        @if($purchaseMonth->status == 'Comprando')
                                            <a href="{{route('lists.months.change.finished', $purchaseMonth->id)}}" class="btn btn-success" title="Mudar status para comprado"><i class="fas fa-check"></i></a>
                                        @endif
                                        @if($purchaseMonth->status != 'Finalizada')
                                                <a href="{{route('months.items.create', $purchaseMonth->id)}}" class="btn btn-dark" title="Items da lista de compra"><i class="fas fa-eye"></i></a>
                                        @endif
                                        <a href="{{route('lists.items.index', $purchaseMonth->purchaseList->id)}}" class="btn btn-info" title="items da lista de compra"><i class="fa-regular fa-rectangle-list"></i></a>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="card mt-4">
            <div class="card-body">
                <x-notification type="success"></x-notification>
                <x-notification type="error"></x-notification>
                <h4 class="card-title">Despesas do mês</h4>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>É fixa ?</th>
                            <th>Descrição</th>
                            <th>Data de vencimento</th>
                            <th>Valor</th>
                            <th>Ações</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($expenses as $expense)
                            <tr>
                                <td class="align-middle">{{$expense->fixed}}</td>
                                <td class="align-middle">{{$expense->description}}</td>
                                <td class="align-middle">{{$expense->due_date}}</td>
                                <td class="align-middle">R$ {{number_format($expense->amount, 2,',','.')}}</td>
                                <td>
                                    <div class="btn-group">
                                        <a href="{{route('payments', ['id' => $expense->id, 'fixed' => $expense->fixed])}}" onclick="event.preventDefault(); document.getElementById('payment-expense-{{$expense->id}}-{{$expense->fixed}}').submit()" class="btn btn-success" title="Fazer pagamento"><i class="fas fa-money-bill"></i></a>
                                        <form action="{{route('payments', ['id' => $expense->id, 'fixed' => $expense->fixed])}}" id="payment-expense-{{$expense->id}}-{{$expense->fixed}}" method="post">
                                            @csrf
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-layout.app>
