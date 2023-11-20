<x-layout.app>
    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <h2 class="card-title">Despesas variáveis</h2>
                <a href="{{route('variableExpenses.index')}}" class="btn btn-dark">Voltar</a>
            </div>
        </div>
        <div class="card-body">
            <x-notification type="success"></x-notification>
            <x-notification type="error"></x-notification>
            <form action="{{route('variableExpenses.store')}}" method="post">
                @csrf
                <x-input type="text" label="Descrição" id="description" name="description" />
                <x-input type="text" label="Valor" id="amount" name="amount" />
                <x-input type="date" label="data de vencimento" id="due_date" name="due_date" />
                <x-button>Cadastrar</x-button>
            </form>
        </div>
    </div>
</x-layout.app>
