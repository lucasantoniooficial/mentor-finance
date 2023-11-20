<x-layout.guest>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Esqueci a senha</h3></div>
                    <div class="card-body">
                        <form action="{{route('password.reseting')}}" method="post">
                            @csrf
                            <input type="hidden" name="token" value="{{$token}}">
                            <input type="hidden" name="email" value="{{$email}}">
                            <x-input type="password" name="password" label="Senha" id="password" />
                            <x-input type="password" name="password_confirmation" label="Confirmar senha" id="password_confirmation" />
                            <x-button>Resetar</x-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout.guest>
