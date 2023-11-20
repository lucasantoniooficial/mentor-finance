<x-layout.app>
    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <h2 class="card-title">Despesas fixas</h2>
                <a href="{{route('expenses.create')}}" class="btn btn-primary">Cadastrar</a>
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
                        <th>Dia de vencimento</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($fixedExpenses as $fixedExpense)
                        <tr>
                            <td class="align-middle">{{$fixedExpense->description}}</td>
                            <td class="align-middle">{{$fixedExpense->amount_formated}}</td>
                            <td class="align-middle">{{$fixedExpense->day_of_month}}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{route('expenses.edit', $fixedExpense->id)}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                    <a href="{{route('expenses.destroy', $fixedExpense->id)}}" onclick="event.preventDefault(); document.getElementById('user_form_delete_{{$fixedExpense->id}}').submit()" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                    <form action="{{route('expenses.destroy', $fixedExpense->id)}}" id="user_form_delete_{{$fixedExpense->id}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$fixedExpenses->links()}}
        </div>
    </div>
</x-layout.app>
