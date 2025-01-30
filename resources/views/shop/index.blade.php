<x-app-layout>
    @vite(['resources/css/shop.css'])

    <div class="product-wrapper">
        @foreach ($products as $product)
            <div class="product-item">
                {{ $product->title }} <br>
                {{ $product->price }}
            </div>
        @endforeach
    </div>
</x-app-layout>
