<x-app-layout>

    {{-- {{ dd($cartItems) }} --}}

    @foreach ($cartItems as $cartItem)
        <div class="product-item">
            {{ $cartItem["product_id"] }} -- {{ $cartItem["quantity"] }}
        </div>
    @endforeach

</x-app-layout>
