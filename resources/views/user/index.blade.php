<x-layout.app>
    <div class="card mb-4">
        <div class="card-header">
            <div class="d-flex align-items-center justify-content-between">
                <h2 class="card-title">Usuários</h2>
                <a href="{{route('users.create')}}" class="btn btn-primary">Cadastrar</a>
            </div>
        </div>
        <div class="card-body">
            <x-notification type="success"></x-notification>
            <x-notification type="error"></x-notification>

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Ações</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td class="align-middle">{{$user->name}}</td>
                            <td class="align-middle">{{$user->email}}</td>
                            <td>
                                <div class="btn-group">
                                    <a href="{{route('users.edit', $user->id)}}" class="btn btn-info"><i class="fas fa-edit"></i></a>
                                    <a href="{{route('users.destroy', $user->id)}}" onclick="event.preventDefault(); document.getElementById('user_form_delete_{{$user->id}}').submit()" class="btn btn-danger"><i class="fas fa-trash"></i></a>
                                    <form action="{{route('users.destroy', $user->id)}}" id="user_form_delete_{{$user->id}}" method="post">
                                        @csrf
                                        @method('DELETE')
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            {{$users->links()}}
        </div>
    </div>
</x-layout.app>
