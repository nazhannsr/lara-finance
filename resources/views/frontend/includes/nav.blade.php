<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">
            {{ config('app.name', 'Lara-Finance') }}
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">

            </ul>

            <ul class="navbar-nav ml-auto">
                @if (Route::has('login'))
                    @if (auth()->user()->hasRole('customer'))
                    <li class="nav-item">
                        <a href="{{ route('customer.payment.index') }}" class="nav-link">Payment View</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ route('customer.transaction.index') }}" class="nav-link">Transaction View</a>
                    </li>
                    @endif
                    @if (auth()->user()->hasRole('company'))
                    <li class="nav-item">
                        <a href="{{ route('company.create') }}" class="nav-link">Create New Staff</a>
                    </li>
                    @endif
                    @auth
                        <li class="nav-item">
                            <a href="{{ (auth()->user()->hasRole('company'))? route('company.index') : route('customer.index') }}" class="nav-link">Home</a>
                        </li>
                        <li class="nav-item">
                            <form action="{{route('logout')}}" method="post">
                                @csrf
                                <button type="submit" class="nav-link">Logout</button>
                            </form>
                        </li>
                    @else
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endif
            @endif
            </ul>
        </div>
    </div>
</nav>

