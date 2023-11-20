<x-layout.app>
    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <h2 class="card-title">Conta bancária</h2>
                <a href="{{route('accounts.index')}}" class="btn btn-dark">Voltar</a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{route('accounts.update', $bankAccount->id)}}" method="post">
                @csrf
                @method('PUT')
                <x-input type="text" label="Descrição" :value="$bankAccount->description" id="description" name="description" />
                <x-input type="text" label="Valor" id="balance" :value="$bankAccount->balance" name="balance" />
                <x-input type="date" label="Data de entrada" id="entry_date" :value="$bankAccount->entry_date" name="entry_date" />
                <x-button>Salvar</x-button>
            </form>
        </div>
    </div>
</x-layout.app>
