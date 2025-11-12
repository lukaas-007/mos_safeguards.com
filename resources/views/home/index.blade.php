<x-app-layout>
    @vite(['resources/css/home.scss', 'resources/css/root.scss'])
    <div class="home-page">

        {{-- Hero Section --}}
        <section class="hero-section">
            <div class="hero-content">
                <div class="hero-text">
                    <h1 class="hero-title">{{ __('home.hero_title') }}</h1>
                    <h2 class="hero-subtitle">{{ __('home.hero_subtitle') }}</h2>
                    <p class="hero-description">{{ __('home.hero_description') }}</p>
                    <div class="hero-buttons">
                        <a href="{{ route('shop.index') }}" class="btn btn-primary">{{ __('home.shop_now') }}</a>
                        <a href="{{ route('about') }}" class="btn btn-secondary">{{ __('home.learn_more') }}</a>
                    </div>
                </div>
                <div class="hero-image">
                    <img src="{{ asset('img/products/1_1.jpg') }}" alt="GUARD FL23™ Protective Case">
                </div>
            </div>
        </section>

        {{-- About Section --}}
        <section class="about-section">
            <div class="about-content">
                <h2 class="section-title">{{ __('home.about_title') }}</h2>
                <p class="about-text">{{ __('home.about_text') }}</p>
                <p class="about-focus">{{ __('home.about_focus') }}</p>
            </div>
        </section>

        {{-- Features Section --}}
        <section class="features-section">
            <h2 class="section-title">{{ __('home.features_title') }}</h2>
            <div class="features-grid">
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-hands"></i>
                    </div>
                    <h3 class="feature-title">{{ __('home.feature_1_title') }}</h3>
                    <p class="feature-description">{{ __('home.feature_1_desc') }}</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3 class="feature-title">{{ __('home.feature_2_title') }}</h3>
                    <p class="feature-description">{{ __('home.feature_2_desc') }}</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-unlock-alt"></i>
                    </div>
                    <h3 class="feature-title">{{ __('home.feature_3_title') }}</h3>
                    <p class="feature-description">{{ __('home.feature_3_desc') }}</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-layer-group"></i>
                    </div>
                    <h3 class="feature-title">{{ __('home.feature_4_title') }}</h3>
                    <p class="feature-description">{{ __('home.feature_4_desc') }}</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-wrench"></i>
                    </div>
                    <h3 class="feature-title">{{ __('home.feature_5_title') }}</h3>
                    <p class="feature-description">{{ __('home.feature_5_desc') }}</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">
                        <i class="fas fa-award"></i>
                    </div>
                    <h3 class="feature-title">{{ __('home.feature_6_title') }}</h3>
                    <p class="feature-description">{{ __('home.feature_6_desc') }}</p>
                </div>
            </div>
        </section>

        {{-- Reviews Section --}}
        <section class="reviews-section">
            <div class="reviews-header">
                <h2 class="section-title">{{ __('home.reviews_title') }}</h2>
                <p class="reviews-subtitle">{{ __('home.reviews_subtitle') }}</p>
            </div>
            <div class="review-wrapper">
                @foreach ($reviews as $review)
                    <div class="review-item">
                        <div class="review-stars">
                            @for ($i = 0; $i < 5; $i++)
                                <i class="fas fa-star {{ $i < $review->rating ? 'active' : '' }}"></i>
                            @endfor
                        </div>
                        <p class="review-content">{{ $review->content }}</p>
                        <h3 class="reviewer-name">- {{ $review->name }}</h3>
                    </div>
                @endforeach
            </div>
        </section>

        {{-- FAQ Section --}}
        <section class="faq-section">
            <h2 class="section-title">{{ __('home.faq_title') }}</h2>
            <div class="faq-grid">
                <div class="faq-item">
                    <h3 class="faq-question">{{ __('home.faq_1_question') }}</h3>
                    <p class="faq-answer">{{ __('home.faq_1_answer') }}</p>
                </div>
                <div class="faq-item">
                    <h3 class="faq-question">{{ __('home.faq_2_question') }}</h3>
                    <p class="faq-answer">{{ __('home.faq_2_answer') }}</p>
                </div>
                <div class="faq-item">
                    <h3 class="faq-question">{{ __('home.faq_3_question') }}</h3>
                    <p class="faq-answer">{{ __('home.faq_3_answer') }}</p>
                </div>
                <div class="faq-item">
                    <h3 class="faq-question">{{ __('home.faq_4_question') }}</h3>
                    <p class="faq-answer">{{ __('home.faq_4_answer') }}</p>
                </div>
                <div class="faq-item">
                    <h3 class="faq-question">{{ __('home.faq_5_question') }}</h3>
                    <p class="faq-answer">{{ __('home.faq_5_answer') }}</p>
                </div>
                <div class="faq-item">
                    <h3 class="faq-question">{{ __('home.faq_6_question') }}</h3>
                    <p class="faq-answer">{{ __('home.faq_6_answer') }}</p>
                </div>
            </div>
        </section>

        {{-- CTA Section --}}
        <section class="cta-section">
            <div class="cta-content">
                <h2 class="cta-title">{{ __('home.cta_title') }}</h2>
                <p class="cta-description">{{ __('home.cta_description') }}</p>
                <a href="{{ route('shop.index') }}" class="btn btn-primary btn-large">{{ __('home.cta_button') }}</a>
            </div>
        </section>
    </div>
</x-app-layout>
