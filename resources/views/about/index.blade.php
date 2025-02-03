<x-app-layout>

    @vite(['resources/css/about.css'])

    <div class="top-container">
        <img src="{{ asset('img/products/1_8.jpg') }}" alt="About" class="about-image" >

        <div class="text-container">
            <h1 class="product-header" >{{ __('about.info') }}</h1>
            <p>{!! __('about.text') !!}</p>
            <a href="{{ route('shop.index') }}" class="shop-button">{{ __('about.shop') }}</a>
        </div>
    </div>

    <div class="review-wrapper">
        @foreach ($reviews as $review)
            <div class="review">
                <div class="review-header">
                    <h2>{{ $review->name }}</h2>
                </div>
                <div class="review-content">
                    <p>{{ $review->content }}</p>
                </div>

                <div class="review-stars-wrapper">
                    @for ($i = 0; $i < 5; $i++)
                        <i class="fas fa-star {{ $i < $review->rating ? 'active' : '' }}"></i>
                    @endfor
                </div>
            </div>
        @endforeach
    </div>
</x-app-layout>
