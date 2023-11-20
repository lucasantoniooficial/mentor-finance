<x-layout.guest>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    @if(session('status'))
                        <div class="alert alert-success">
                            {{session('status')}}
                        </div>
                    @endif
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                    <div class="card-body">
                        <form action="{{route('login')}}" method="post">
                            @csrf
                            <x-input type="email" name="email" label="E-mail" id="email" />
                            <x-input type="password" name="password" label="Senha" id="password" />
                            <x-input.checkbox label="Lembrar-me" name="remember" id="remember-me" />
                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                @if(Route::has('password.request'))
                                    <a class="small" href="{{route('password.request')}}">Esqueceu a senha?</a>
                                @endif
                                <x-button>Entrar</x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout.guest>
