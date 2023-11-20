<x-layout.app>
    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <h2 class="card-title">Conta bancária</h2>
                <a href="{{route('accounts.create')}}" class="btn btn-primary">Cadastrar</a>
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
                        <th>Data de entrada</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($bankAccounts as $bankAccount)
                        <tr>
                            <td class="align-middle">{{$bankAccount->description}}</td>
                            <td class="align-middle">{{$bankAccount->balance_formated}}</td>
                            <td class="align-middle">{{$bankAccount->entry_date_formated}}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{route('accounts.edit', $bankAccount->id)}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                    <a href="{{route('accounts.destroy', $bankAccount->id)}}" onclick="event.preventDefault(); document.getElementById('user_form_delete_{{$bankAccount->id}}').submit()" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                    <form action="{{route('accounts.destroy', $bankAccount->id)}}" id="user_form_delete_{{$bankAccount->id}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$bankAccounts->links()}}
        </div>
    </div>
</x-layout.app>
