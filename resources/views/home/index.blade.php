<x-app-layout>
    @vite(['resources/css/home.scss'])
    <div class="home-page">
        <section class="about-wrapper">
            abouts
        </section>
        <section class="review-container">
            reviews
            <div class='review-wrapper'>
                @foreach ($reviews as $review)
                    <div class="review-item">
                        <p class="review-content">{{ $review->content }}</p>
                        <h2 class="reviewer-name">{{ $review->name }}</h2>
                    </div>
                @endforeach
            </div>

        </section>
        <section class="faq-wrapper">
            faq
        </section>
    </div>
</x-app-layout>
