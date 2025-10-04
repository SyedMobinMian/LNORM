@extends('layouts.app')

@section('title', __('messages.settings'))

@section('content')
<div class="container">
    <h4>{{ __('messages.settings') }}</h4>
    <form action="{{ route('admin.settings.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">{{ __('messages.language') }}</label>
            <select name="language" class="form-select">
                <option value="en" {{ $language === 'en' ? 'selected' : '' }}>English</option>
                <option value="ar" {{ $language === 'ar' ? 'selected' : '' }}>Arabic</option>
                <option value="de" {{ $language === 'de' ? 'selected' : '' }}>German</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('messages.currency') }}</label>
            <select name="currency" class="form-select">
                <option value="USD" {{ $currency === 'USD' ? 'selected' : '' }}>USD ($)</option>
                <option value="INR" {{ $currency === 'INR' ? 'selected' : '' }}>INR (₹)</option>
                <option value="EUR" {{ $currency === 'EUR' ? 'selected' : '' }}>EUR (€)</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('messages.currency_position') }}</label>
            <select name="currency_position" class="form-select">
                <option value="left" {{ $currency_position === 'left' ? 'selected' : '' }}>Left</option>
                <option value="right" {{ $currency_position === 'right' ? 'selected' : '' }}>Right</option>
            </select>
        </div>

        <button class="btn btn-primary">{{ __('messages.save') }}</button>
    </form>
</div>
@endsection
