<div id="layoutSidenav_nav">
    <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
        <div class="sb-sidenav-menu">
            <div class="nav">
                <a class="nav-link {{request()->routeIs('dashboard') ? 'active' : ''}}" href="{{route('dashboard')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                    Inicio
                </a>
                <a class="nav-link {{request()->routeIs('users.*') ? 'active' : ''}}" href="{{route('users.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-users"></i></div>
                    Usuários
                </a>
                <a class="nav-link {{request()->routeIs('accounts.*') ? 'active' : ''}}" href="{{route('accounts.index')}}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-piggy-bank"></i></div>
                    Conta bancária
                </a>
                <a class="nav-link {{request()->routeIs('expenses.*') ? 'active' : ''}}" href="{{route('expenses.index')}}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-file-invoice-dollar"></i></div>
                    Despesas fixas
                </a>
                <a class="nav-link {{request()->routeIs('variableExpenses.*') ? 'active' : ''}}" href="{{route('variableExpenses.index')}}">
                    <div class="sb-nav-link-icon"><i class="fas fa-credit-card"></i></div>
                    Despesas variáveis
                </a>
                <a class="nav-link {{request()->routeIs('purchaseLists.*') ? 'active' : ''}}" href="{{route('purchaseLists.index')}}">
                    <div class="sb-nav-link-icon"><i class="fa-solid fa-list"></i></div>
                    Listas de compras
                </a>
            </div>
        </div>
        <div class="sb-sidenav-footer">
            <div class="small">Logado com:</div>
            {{ auth()->user()->name }}
        </div>
    </nav>
</div>
