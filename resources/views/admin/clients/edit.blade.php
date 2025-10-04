@extends('layouts.app')

@section('title', __('messages.edit_client'))

@section('content')
<div class="container-fluid">
    <h4 class="mb-4">{{ __('messages.edit_client') }}</h4>

    <form action="{{ route('clients.update', $client) }}" method="POST" class="card p-4 shadow-sm">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">{{ __('messages.name') }}</label>
            <input type="text" name="name" class="form-control" required value="{{ old('name', $client->name) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('messages.email') }}</label>
            <input type="email" name="email" class="form-control" required value="{{ old('email', $client->email) }}">
        </div>

        <div class="mb-3">
            <label class="form-label">{{ __('messages.phone') }}</label>
            <input type="text" name="phone" class="form-control" value="{{ old('phone', $client->phone) }}">
        </div>

        <button type="submit" class="btn btn-primary">{{ __('messages.update') }}</button>
        <a href="{{ route('admin.clients.index') }}" class="btn btn-secondary">{{ __('messages.cancel') }}</a>
    </form>
</div>
@endsection
