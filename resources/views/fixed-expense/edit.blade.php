<x-layout.app>
    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <h2 class="card-title">Despesas fixas</h2>
                <a href="{{route('expenses.index')}}" class="btn btn-dark">Voltar</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('expenses.update', $fixedExpense->id)}}" method="post">
                @csrf
                @method('PUT')
                <x-input type="text" label="Descrição" id="description" :value="$fixedExpense->description" name="description" />
                <x-input type="text" label="Valor" id="amount" :value="$fixedExpense->amount" name="amount" />
                <x-input type="number" label="Dia do mês para vencimento" id="day_of_month" :value="$fixedExpense->day_of_month" name="day_of_month" />
                <x-button>Salvar</x-button>
            </form>
        </div>
    </div>
</x-layout.app>
