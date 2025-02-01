<x-app-layout>
    @vite(['resources/css/shop.css'])

    <h1 class="product-header" >{{ __('shop.showing_amout', ['amount' => $products->total()]) }}</h1>

    <div class="product-wrapper">
        @foreach ($products as $product)
            <a class="product-item" href="{{ route('shop.show', $product->slug) }}">
                <img class='product-image' src="img/products/1_1.jpg" alt="{{ $product->title }}">
                <h2 class='product-title'>{{ $product->title }}</h2>
                <p class='product-price'>{{ $product->price }}</p>

                <form action="{{ route('shop.index') }}" method="post">
                    @csrf
                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                    <button type="submit" class='product-add-to-cart'>{{ __('shop.add_to_cart') }}</button>
                </form>
            </div>
        @endforeach
    </div>
</x-app-layout>
