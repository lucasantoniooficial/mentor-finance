<x-layout.guest>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5">
                <div class="card shadow-lg border-0 rounded-lg mt-5">
                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Esqueci a senha</h3></div>
                    <div class="card-body">
                        <form action="{{route('password.request')}}" method="post">
                            @csrf
                            <x-input type="email" name="email" label="E-mail" id="email" />
                            <x-button>Solicitar</x-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-layout.guest>
