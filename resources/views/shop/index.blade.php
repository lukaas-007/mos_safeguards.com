<x-app-layout>
    @vite(['resources/css/shop.css'])

    <h1 class="product-header" >{{ __('shop.showing_amout', ['amount' => $products->total()]) }}</h1>

    <div class="product-wrapper">
    @foreach ($products as $product)
        <div class="product-item">
            <a href="{{ route('shop.show', $product->slug) }}">
                <img class='product-image' src="img/products/1_1.jpg" alt="{{ $product->title }}">
                <h2 class='product-title'>{{ $product->title }}</h2>
                <p class='product-price'>{{ $product->price }}</p>
            </a>

            <form action="{{ route('cart.add', $product->slug) }}" method="post">
                @csrf
                <button type="button" class='product-add-to-cart'
                    onclick="addProductToCart('{{ $product->slug }}', '{{ csrf_token() }}', '{{ route('cart.add', $product->slug) }}')">
                    {{ __('shop.add_to_cart') }}
                </button>
            </form>
        </div>
    @endforeach


        <script>
            function addProductToCart(slug, csrfToken, url) {
                const xhr = new XMLHttpRequest();
                xhr.open('POST', url);
                xhr.setRequestHeader('Content-Type', 'application/json');
                xhr.setRequestHeader('X-CSRF-TOKEN', csrfToken);
                xhr.onload = function(e) {
                    alert(e.target.responseText);
                    location.reload();
                };
                xhr.send();
            }
        </script>
    </div>
</x-app-layout>
