<x-app-layout>

    @vite(['resources/css/cart.css'])

    <div class="cart-wrapper">
        <h1 class="cart-title">{{ __('cart.cart') }}</h1>

        @foreach ($cartItems as $product)
            {{-- Loop over cart items to find the product --}}
            @foreach ($products as $product)
                @if ($product->id == $product->id)
                        <div class="cart-item">

                            <img src="{{ $product->image }}" alt="{{ $product->title }}" class="cart-item-image" />

                            <div class="cart-item-details">
                                <h1>{{ $product->title }}</h1>
                                {{ $product->price }}
                            </div>

                            <div class="cart-item-quantity">
                                <div class="input-wrapper">
                                    <input type="number" min="1" name="quantity" value="{{ $cartItems[$product->id]['quantity'] }}" id="product-{{ $product->id }}"/>
                                    <label for="quantity">{{ __('cart.quantity') }}</label>
                                </div>

                                <button
                                    type="button"
                                    onclick='changeQuantity(
                                        "{{ $product->slug }}",
                                        "{{ csrf_token() }}",
                                        "{{ route('cart.update-quantity', $product) }}",
                                        "{{ "product-" . $product->id }}")'>
                                    {{ __('cart.update') }}
                                </button>
                            </div>

                            <button type="button" class='product-remove-from-cart' onclick='removeProductFromCart("{{ $product->slug }}", "{{ csrf_token() }}", "{{ route('cart.remove', $product->slug) }}")'>
                                {{ __('cart.remove') }}
                            </button>
                    </div>
                @endif
            @endforeach
        @endforeach

        <script>
            function removeProductFromCart(slug, csrfToken, url) {
                const xhr = new XMLHttpRequest();
                xhr.open('POST', url);
                xhr.setRequestHeader('Content-Type', 'application/json');
                xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
                xhr.onload = function (e) {
                    alert(e.target.responseText);
                    location.reload();
                };
                xhr.send();
            }

            function changeQuantity(slug, csrfToken, url, inputId) {
                const xhr = new XMLHttpRequest();
                xhr.open('POST', url);
                const quantity = document.getElementById(inputId).value;

                xhr.setRequestHeader('Content-Type', 'application/json');
                xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
                xhr.onload = function (e) {
                    alert(e.target.responseText);
                    location.reload();
                };
                xhr.send(
                    JSON.stringify({
                        quantity: quantity
                    })
                );
            }

        </script>

        <div class="cart-total">

            <div class='cart-total-price'>
                {{ __('cart.total') }}: {{ $total }}
            </div>

            <form action="{{route('cart.checkout')}}" method="post">
                @csrf
                <button type="submit" class="checkout-button">
                    {{ __('cart.checkout') }}
                </button>
            </form>


        </div>
    </div>
</x-app-layout>
