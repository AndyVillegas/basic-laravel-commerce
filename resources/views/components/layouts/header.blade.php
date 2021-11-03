<header class="bg-gray-800">
    <nav class="text-white font-medium flex items-center justify-between px-2">
        <ul class="flex items-center">
            <li class="p-2 mr-2 text-xl">Ecommerce</li>
            <li>
                <x-common.header-link href="{{ route('page.home') }}" :active="request()->routeIs('page.home')">
                    {{ __('Home') }}
                    </x-common.link>
            </li>
            <li>
                <x-common.header-link href="{{ route('page.products') }}"
                    :active="request()->routeIs('page.products')">
                    {{ __('Products') }}
                    </x-common.link>
            </li>
            @auth
                <li>
                    <x-common.header-link href="{{ route('page.my-cart') }}"
                        :active="request()->routeIs('page.my-cart')">
                        {{ __('My Cart') }}
                        </x-common.link>
                </li>
                @if (Auth::user()->is_admin)
                    <li>
                        <x-common.header-link href="{{ route('dashboard') }}">
                            {{ __('Dashboard') }}
                            </x-common.link>
                    </li>
                @endif
            @endauth
        </ul>
        <ul class="flex items-center gap-3">
            @auth
                <li>
                    {{ Auth::user()->name }}
                </li>
                <li>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                        <button class="bg-blue-700 px-4 py-2 rounded-sm" type="submit"> {{ __('Log Out') }}</button>
                    </form>
                </li>
            @else
                <li>
                    <a href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
                <li class="ml-1">
                    <x-common.login-button />
                </li>
            @endauth
        </ul>
    </nav>
</header>
