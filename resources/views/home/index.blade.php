<x-app-layout>
    @vite(['resources/css/home.css'])
    <div class="home-page">
        <section class="about-wrapper">
            abouts
        </section>
        <section class="review-wrapper">
            reviews
            @foreach ($reviews as $review)
                <div class="review-item">
                    <h2 class="review-title">{{ $review->title }}</h2>
                    <p class="review-content">{{ $review->content }}</p>
                </div>
            @endforeach
        </section>
        <section class="faq-wrapper">
            faq
        </section>
    </div>
</x-app-layout>
