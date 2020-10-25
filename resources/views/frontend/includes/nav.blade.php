<div>
    @if (Route::has('login'))
        <div>
            @if (auth()->user()->hasRole('customer'))
                <a href="{{ route('customer.payment.index') }}">payment view</a>
                <a href="{{ route('customer.transaction.index') }}">transaction view</a>
            @endif
            @if (auth()->user()->hasRole('company'))
                <a href="{{ route('company.create') }}">Create New Staff</a>
            @endif
        </div>
        <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
            @auth
                <a href="{{ (auth()->user()->hasRole('company'))? route('company.index') : route('customer.index') }}" class="text-sm text-gray-700 underline">Home</a>
                <form action="{{route('logout')}}" method="post">
                    @csrf
                    <button type="submit" class="ml-4 text-sm text-gray-700 underline">Logout</button>
                </form>
            @else
                <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Login</a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                @endif
            @endif
        </div>
    @endif
</div>

