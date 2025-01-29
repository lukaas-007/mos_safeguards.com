{{-- Add the styling for the header (header.css) --}}
<style>
    .header-wrapper {
        background-color: white;
        color: black;
        display: flex;
        justify-content: space-between;
    }

    .header-left {
        display: flex;
        align-items: center;
    }
</style>

<header
    x-data="{
        cartItemsCount: {{ \App\Helpers\Cart::getCartItemsCount() }},
    }"
    @cart-change.window="cartItemsCount = $event.detail.count"
    class="header-wrapper"
>
    <div class="header-left">
        <a href="{{ route('home') }}" class="block pl-5 py-navbar-item">
            {{-- logo --}}
            <img
                src="{{ asset('img/logo.png') }}"
                alt="logo"
                class="w-32 h-12"
            />
        </a>

        <a href="{{ route('shop') }}" class="block pl-5 py-navbar-item">
            Shop
        </a>

        <a href="{{ route('shop') }}" class="block pl-5 py-navbar-item">
            About us
        </a>

        <a href="{{ route('shop') }}" class="block pl-5 py-navbar-item">
            Contact
        </a>
    </div>
    <!--/ Responsive Menu -->
    <nav class="">
        <ul class="grid items-center grid-flow-col">
            <li>
                <a
                    href="{{ route('cart.index') }}"
                    class="relative inline-flex items-center py-navbar-item px-navbar-item hover:bg-slate-900"
                >
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        class="w-5 h-5 mr-2"
                        fill="none"
                        viewBox="0 0 24 24"
                        stroke="currentColor"
                        stroke-width="2"
                    >
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z"
                        />
                    </svg>
                    Cart
                    <small
                        x-show="cartItemsCount"
                        x-transition
                        x-cloak
                        x-text="cartItemsCount"
                        class="absolute z-[100] top-4 -right-3 py-[2px] px-[8px] rounded-full bg-red-500"
                    ></small>
                </a>
            </li>
            @if (!Auth::guest())
                <li x-data="{open: false}" class="relative">
                    <a
                        @click="open = !open"
                        class="flex items-center pr-5 cursor-pointer py-navbar-item px-navbar-item hover:bg-slate-900"
                    >
              <span class="flex items-center">
                <svg
                    xmlns="http://www.w3.org/2000/svg"
                    class="w-5 h-5 mr-2"
                    fill="none"
                    viewBox="0 0 24 24"
                    stroke="currentColor"
                    stroke-width="2"
                >
                  <path
                      stroke-linecap="round"
                      stroke-linejoin="round"
                      d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                  />
                </svg>
                My Account
              </span>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-5 h-5 ml-2"
                            viewBox="0 0 20 20"
                            fill="currentColor"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                clip-rule="evenodd"
                            />
                        </svg>
                    </a>
                    <ul
                        @click.outside="open = false"
                        x-show="open"
                        x-transition
                        x-cloak
                        class="absolute right-0 z-10 w-48 py-2 bg-slate-800"
                    >
                        <li>
                            <a
                                href="{{ route('profile') }}"
                                class="flex px-3 py-2 hover:bg-slate-900"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="w-5 h-5 mr-2"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="2"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"
                                    />
                                </svg>
                                My Profile
                            </a>
                        </li>
                        <li>
                            <a
                                href="{{ route('order.index') }}"
                                class="flex px-3 py-2 hover:bg-slate-900"
                            >
                                <svg
                                    xmlns="http://www.w3.org/2000/svg"
                                    class="w-5 h-5 mr-2"
                                    fill="none"
                                    viewBox="0 0 24 24"
                                    stroke="currentColor"
                                    stroke-width="2"
                                >
                                    <path
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                        d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"
                                    />
                                </svg>
                                My Orders
                            </a>
                        </li>
                        <li>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf

                                <a href="{{ route('logout') }}"
                                   class="flex px-3 py-2 hover:bg-slate-900"
                                   onclick="event.preventDefault();
                                        this.closest('form').submit();">
                                    <svg
                                        xmlns="http://www.w3.org/2000/svg"
                                        class="w-5 h-5 mr-2"
                                        fill="none"
                                        viewBox="0 0 24 24"
                                        stroke="currentColor"
                                        stroke-width="2"
                                    >
                                        <path
                                            stroke-linecap="round"
                                            stroke-linejoin="round"
                                            d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"
                                        />
                                    </svg>
                                    {{ __('Log Out') }}
                                </a>
                            </form>
                        </li>
                    </ul>
                </li>
            @else
                <li>
                    <a
                        href="{{ route('login') }}"
                        class="flex items-center py-navbar-item px-navbar-item hover:bg-slate-900"
                    >
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            class="w-5 h-5 mr-2"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke="currentColor"
                            stroke-width="2"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M11 16l-4-4m0 0l4-4m-4 4h14m-5 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h7a3 3 0 013 3v1"
                            />
                        </svg>
                        {{__"Login"}}
                    </a>
                </li>
                <li>
                    <a
                        href="{{ route('register') }}"
                        class="inline-flex items-center px-3 py-2 mx-5 text-white transition-colors rounded shadow-md bg-emerald-600 hover:bg-emerald-700 active:bg-emerald-800"
                    >
                        {{__"Register now"}}
                    </a>
                </li>
            @endif
        </ul>
    </nav>
</header>
