<x-layout.app>
    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <h2 class="card-title">Despesas variáveis</h2>
                <a href="{{route('variableExpenses.index')}}" class="btn btn-dark">Voltar</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('variableExpenses.update', $variableExpense->id)}}" method="post">
                @csrf
                @method('PUT')
                <x-input type="text" label="Descrição" id="description" :value="$variableExpense->description" name="description" />
                <x-input type="text" label="Valor" id="amount" :value="$variableExpense->amount" name="amount" />
                <x-input type="date" label="data de vencimento" :value="$variableExpense->due_date" id="due_date" name="due_date" />
                <x-button>Salvar</x-button>
            </form>
        </div>
    </div>
</x-layout.app>
