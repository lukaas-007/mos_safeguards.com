<x-app-layout>

    @vite(['resources/css/contact.css'])

    <script async src="https://www.google.com/recaptcha/api.js"></script>

    {{-- display the current URL --}}
    <p>{{ Request::url() }}</p>

    <div class="contact-wrapper">
        <div class='contact-info'>
            <h1>{{__("contact.info")}}</h1>
            <p>{{__("contact.email")}}</p>
            <p>{{__("contact.phone")}}</p>
            <p>{{__("contact.address")}}</p>

        </div>
        <form method="POST" action="{{ route('contact') }}" class='contact-form'>
            @csrf
            <x-form-input name="name" label="Name" />
            <x-form-input name="email" label="Email" />
            <x-form-input name="about" label="about" />
            <x-form-input name="message" label="Message" />

            <div class="mt-4 g-recaptcha" data-sitekey={{config('services.recaptcha.key')}}></div>

            <button type="submit" class='contact-form-submit btn'>Submit</button>
        </form>
    </div>
</x-app-layout>

