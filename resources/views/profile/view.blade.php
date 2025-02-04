<x-app-layout>
    @vite(['resources/css/profile.css'])

    @if ($errors->any())
        <div class="alert alert-danger error-wrapper">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif


    <form action="{{ route('profile.update') }}" method="post">
        @csrf
        <h2>{{ __('account.profile_details') }}</h2>
        <div class="dual-input">
            <x-form-input name="first_name" value="{{old('first_name', $customer->first_name)}}" label="{{ __('account.first_name') }}" />
            <x-form-input name="last_name" value="{{old('last_name', $customer->last_name)}}" label="{{ __('account.last_name') }}" />
        </div>

        <x-form-input name="email" value="{{old('email', $user->email)}}" label="{{ __('account.email') }}" />
        <x-form-input name="phone" value="{{old('phone', $customer->phone)}}" label="{{ __('account.phone') }}" />

        <h2>{{ __('account.billing_address') }}</h2>
        <div class='dual-input'>
            <x-form-input name="billing[address1]" value="{{old('billing.address1', $billingAddress->address1)}}" label="{{ __('account.address1') }}" />
            <x-form-input name="billing[address2]" value="{{old('billing.address2', $billingAddress->address2)}}" label="{{ __('account.address2') }}"/>
        </div>

        <div class="dual-input">
            <x-form-input name="billing[city]" value="{{old('billing.city', $billingAddress->city)}}" label="{{ __('account.city') }}"/>
            <x-form-input name="billing[zipcode]" value="{{old('billing.zipcode', $billingAddress->zipcode)}}" label="{{ __('account.zipcode') }}" />
        </div>

        <div class="dual-input">
            <div class='input-wrapper'>
            <select name="billing[country_code]">
                <option value="">Select Country</option>

                @foreach ($countries as $country)
                    <option value="{{ $country->code }}" {{ $country->code === old('billing.country_code', $billingAddress->country_code) ? 'selected' : '' }}>
                        {{ $country->name }}
                    </option>
                @endforeach
            </select>
            <label for="billing[country_code]" class="form-label ">{{ __('account.country') }}</label>
            </div>
            <x-form-input name="billing[state]" value="{{old('billing.state', $billingAddress->state)}}" label="{{ __('account.state') }}" />
        </div>

        <div class="flex justify-between mt-6 mb-2">
            <h2 class="text-xl font-semibold">Shipping Address</h2>
            <label for="sameAsBillingAddress" class="text-gray-700">
                <input @change="$event.target.checked ? shippingAddress = {...billingAddress} : ''"
                    id="sameAsBillingAddress" type="checkbox"> Same as Billing
            </label>
        </div>
        <div class="grid grid-cols-2 gap-3 mb-3">
            <x-form-input name="shipping[address1]" value="{{old('shipping.address1', $shippingAddress->address1)}}" label="{{ __('account.address1') }}" />
            <x-form-input name="shipping[address2]" value="{{old('shipping.address2', $shippingAddress->address2)}}" label="{{ __('account.address2') }}" />
        </div>
        <div class="dual-input">
            <x-form-input name="shipping[city]" value="{{old('shipping.city', $shippingAddress->city)}}" label="{{ __('account.city') }}" />
            <x-form-input name="shipping[zipcode]" value="{{old('shipping.zipcode', $shippingAddress->zipcode)}}" label="{{ __('account.zipcode') }}" />
        </div>
        <div class="dual-input">
            <div class='input-wrapper'>
                <select name="shipping[country_code]" >
                    <option value="">Select Country</option>
                    @foreach ($countries as $country)
                        <option value="{{ $country->code }}" {{ $country->code === old('shipping.country_code', $shippingAddress->country_code) ? 'selected' : '' }}>
                            {{ $country->name }}
                        </option>
                    @endforeach
                </select>
                <label for="shipping[country_code]" class="form-label">{{ __('account.country') }}</label>
            </div>
            <x-form-input name="shipping[state]" value="{{old('shipping.state', $shippingAddress->state)}}" label="{{ __('account.state') }}" />
        </div>

        <button>{{ __('account.update_account') }}</button>
    </form>
    <form action="{{route('profile_password.update')}}" method="post">
        @csrf
        <h2>{{ __('account.update_password') }}</h2>
        <x-form-input type="password" label="{{ __('account.old_password') }}" name="old_password" />
        <x-form-input type="password" label="{{ __('account.new_password') }}" name="new_password" />
        <x-form-input type="password" label="{{ __('account.new_password_confirmation') }}" name="new_password_confirmation" />

        <button>{{ __('account.update_password') }}</button>
    </form>
</x-app-layout>
