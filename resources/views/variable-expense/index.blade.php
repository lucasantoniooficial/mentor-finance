<x-layout.app>
    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <h2 class="card-title">Despesas variáveis</h2>
                <a href="{{route('variableExpenses.create')}}" class="btn btn-primary">Cadastrar</a>
            </div>
        </div>
        <div class="card-body">
            <x-notification type="success"></x-notification>
            <x-notification type="error"></x-notification>

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Descrição</th>
                        <th>Valor</th>
                        <th>Data de vencimento</th>
                        <th>Status</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($variableExpenses as $variableExpense)
                        <tr>
                            <td class="align-middle">{{$variableExpense->description}}</td>
                            <td class="align-middle">{{$variableExpense->amount_formated}}</td>
                            <td class="align-middle">{{$variableExpense->due_date_formated}}</td>
                            <td class="align-middle">{{$variableExpense->status}}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{route('variableExpenses.edit', $variableExpense->id)}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                    <a href="{{route('variableExpenses.destroy', $variableExpense->id)}}" onclick="event.preventDefault(); document.getElementById('user_form_delete_{{$variableExpense->id}}').submit()" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                    <form action="{{route('variableExpenses.destroy', $variableExpense->id)}}" id="user_form_delete_{{$variableExpense->id}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$variableExpenses->links()}}
        </div>
    </div>
</x-layout.app>
