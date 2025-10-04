@extends('layouts.app')

@section('title', __('Invoices'))

@section('content')
<div class="container-fluid">
    {{-- Page Heading and Create Button --}}
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h4 class="mb-0">{{ __('Invoices') }}</h4>
        <a href="{{ route('admin.invoices.create') }}" class="btn btn-primary">
            <i class="fas fa-plus me-1"></i> {{ __('Create Invoice') }}
        </a>
    </div>

    {{-- Mass Actions --}}
    <div class="mb-3">
        <button class="btn btn-outline-secondary btn-sm me-2">
            <i class="fas fa-file-download me-1"></i> {{ __('Export') }}
        </button>
        <button class="btn btn-outline-danger btn-sm">
            <i class="fas fa-trash-alt me-1"></i> {{ __('Delete Selected') }}
        </button>
    </div>

    {{-- Invoice Table --}}
    <div class="card shadow-sm">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th><input type="checkbox"></th>
                        <th>{{ __('Invoice ID') }}</th>
                        <th>{{ __('Customer') }}</th>
                        <th>{{ __('Company') }}</th>
                        <th>{{ __('Email') }}</th>
                        <th>{{ __('Issue Date') }}</th>
                        <th>{{ __('Due Date') }}</th>
                        <th>{{ __('Status') }}</th>
                        <th>{{ __('Total') }}</th>
                        <th class="text-end">{{ __('Actions') }}</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($invoices as $invoice)
                        <tr>
                            <td><input type="checkbox" name="bulk_ids[]" value="{{ $invoice->id }}"></td>
                            <td>
                                <strong>{{ $invoice->invoice_number }}</strong><br>
                                <small>
                                    <a href="{{ route('admin.invoices.show', $invoice->id) }}" class="text-decoration-none">View</a> |
                                    <a href="{{ route('admin.invoices.edit', $invoice->id) }}" class="text-decoration-none">Edit</a> |
                                    <form action="{{ route('admin.invoices.destroy', $invoice->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this invoice?');">
                                        @csrf @method('DELETE')
                                        <button class="btn btn-link p-0 text-danger text-decoration-none" type="submit">Delete</button>
                                    </form>
                                </small>
                            </td>
                            <td>{{ $invoice->client->contact_person ?? '-' }}</td>
                            <td>{{ $invoice->client->company_name ?? '-' }}</td>
                            <td>{{ $invoice->client->email ?? '-' }}</td>
                            <td>{{ \Carbon\Carbon::parse($invoice->invoice_date)->format('d M Y') }}</td>
                            <td>{{ \Carbon\Carbon::parse($invoice->due_date)->format('d M Y') }}</td>
                            <td>
                                @php
                                    $badgeClass = match($invoice->status) {
                                        'draft' => 'secondary',
                                        'sent' => 'info',
                                        'unpaid' => 'warning',
                                        'paid' => 'success',
                                        default => 'light'
                                    };
                                @endphp
                                <span class="badge bg-{{ $badgeClass }}">{{ ucfirst($invoice->status) }}</span>
                            </td>
                            <td>@currency($invoice->total)</td>
                            <td class="text-end">
                                <a href="{{ route('admin.invoices.show', $invoice->id) }}" class="btn btn-sm btn-outline-primary">
                                    <i class="fas fa-eye"></i>
                                </a>
                                <a href="{{ route('admin.invoices.edit', $invoice->id) }}" class="btn btn-sm btn-outline-warning">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('admin.invoices.destroy', $invoice->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure?')">
                                    @csrf @method('DELETE')
                                    <button class="btn btn-sm btn-outline-danger">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10" class="text-center text-muted">{{ __('No invoices found.') }}</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="card-footer text-end">
            {{ $invoices->links() }}
        </div>
    </div>
</div>
@endsection
