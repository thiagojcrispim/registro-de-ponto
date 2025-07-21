<aside class="left-sidebar">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-small-cap">--- MENU</li>
                <li>
                    <a class="waves-effect waves-dark" href="{{ route('dashboard') }}" aria-expanded="false">
                        <i class="far fa-circle text-primary"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect waves-dark" href="{{ route('registro-ponto.index') }}" aria-expanded="false">
                        <i class="far fa-circle text-info"></i>
                        <span class="hide-menu">Registros de Ponto</span>
                    </a>
                </li>
                @if(auth()->user()->isAdmin())
                    <li>
                        <a class="waves-effect waves-dark" href="{{ route('registro-ponto.relatorio') }}" aria-expanded="false">
                            <i class="fas fa-file-alt text-warning"></i>
                            <span class="hide-menu">Relatório de Ponto</span>
                        </a>
                    </li>
                @endif
                @if(auth()->user()->isGestor())
                    <li>
                        <a class="waves-effect waves-dark" href="{{ route('funcionarios.index') }}" aria-expanded="false">
                            <i class="far fa-circle text-info"></i>
                            <span class="hide-menu">Funcionários</span>
                        </a>
                    </li>
                @endif

            </ul>
        </nav>
    </div>
</aside>
