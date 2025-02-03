<x-app-layout>
    @vite(['resources/css/product.css'])

    <div class="product-wrapper">
        <div class="image-selector">
            @foreach ($product->images as $image)
                <img  src="{{ asset($image->path) }}" alt="{{ $product->title }}">
            @endforeach
        </div>

        <div class="image-display">
            <img src="{{ asset($product->images[0]->path) }}" alt="{{ $product->title }}">
        </div>


        <div class="product-text">
            <h1>{{ $product->title }}</h1>
            <h2>{{ $product->price }}</h2>
            {!! __("shop." . $product->slug . "-short") !!}

            <form action="{{ route('cart.add', $product->slug) }}" method="post">
                @csrf
                <button type="button" class='product-add-to-cart' onclick='addProductToCart("{{ $product->slug }}", "{{ csrf_token() }}", "{{ route('cart.add', $product->slug) }}")'>{{ __('shop.add_to_cart') }}</button>
            </form>
        </div>

        <script>
            const images = document.querySelectorAll('.image-selector img');

            images[0].classList.add('selected');

            images.forEach(image => {
                image.addEventListener('click', () => {
                    document.querySelector('.image-display img').src = image.src;

                    images.forEach(img => {
                        img.classList.remove('selected');
                    })

                    image.classList.add('selected');
                });
            });

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

    <div class='product-description'>
        {!! __("shop." . $product->slug . "-long") !!}
    </div>
</x-app-layout>
