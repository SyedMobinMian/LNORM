@extends('layouts.app')

@section('title', __('messages.add_client'))

@section('content')
<div class="container-fluid">
    <h4 class="mb-4">{{ __('messages.add_client') }}</h4>

    <form action="{{ route('admin.clients.store') }}" method="POST" class="card shadow-sm p-4">
        @csrf

        <div class="row">
            {{-- Sidebar Vertical Tabs --}}
            {{-- Sidebar Vertical Tabs --}}
<div class="col-md-3 border-end">
    <div class="nav flex-column nav-pills" id="client-tab" role="tablist" aria-orientation="vertical">
        <button class="nav-link d-flex align-items-center gap-2 active" id="tab-address" data-bs-toggle="pill" data-bs-target="#panel-address" type="button" role="tab">
            <i class="fas fa-user"></i>
            <span>{{ __('Customer Info') }}</span>
        </button>
        <button class="nav-link d-flex align-items-center gap-2" id="tab-shipping" data-bs-toggle="pill" data-bs-target="#panel-shipping" type="button" role="tab">
            <i class="fas fa-truck"></i>
            <span>{{ __('Shipping Address') }}</span>
        </button>
        <button class="nav-link d-flex align-items-center gap-2" id="tab-billing" data-bs-toggle="pill" data-bs-target="#panel-billing" type="button" role="tab">
            <i class="fas fa-file-invoice-dollar"></i>
            <span>{{ __('Billing Address') }}</span>
        </button>
        <button class="nav-link d-flex align-items-center gap-2" id="tab-tax" data-bs-toggle="pill" data-bs-target="#panel-tax" type="button" role="tab">
            <i class="fas fa-percent"></i>
            <span>{{ __('Tax Details') }}</span>
        </button>
        <button class="nav-link d-flex align-items-center gap-2" id="tab-bank" data-bs-toggle="pill" data-bs-target="#panel-bank" type="button" role="tab">
            <i class="fas fa-university"></i>
            <span>{{ __('Bank Info') }}</span>
        </button>
    </div>
</div>

            {{-- <div class="col-md-3 border-end">
                <div class="nav flex-column nav-pills me-3" id="client-tab" role="tablist" aria-orientation="vertical">
                    <button class="nav-link active" id="tab-address" data-bs-toggle="pill" data-bs-target="#panel-address" type="button" role="tab">
                        <i class="fas fa-user me-2"></i> Customer Info
                    </button>
                    
                    <button class="nav-link"        id="tab-shipping"   data-bs-toggle="pill" data-bs-target="#panel-shipping"  type="button" role="tab">
                        <i class="fas fa-truck me-2"></i> Shipping Address
                    </button>
                    <button class="nav-link" id="tab-billing" data-bs-toggle="pill" data-bs-target="#panel-billing" type="button" role="tab">
                        <i class="fas fa-file-invoice-dollar me-2"></i> Billing Address
                    </button>
                    <button class="nav-link" id="tab-tax" data-bs-toggle="pill" data-bs-target="#panel-tax" type="button" role="tab">
                        <i class="fas fa-percent me-2"></i> Tax Details
                    </button>
                    <button class="nav-link" id="tab-bank" data-bs-toggle="pill" data-bs-target="#panel-bank" type="button" role="tab">
                        <i class="fas fa-university me-2"></i> Bank Info
                    </button>
                </div>
            </div> <!-- CLOSES col-md-3 --> --}}

            {{-- Tab Panels --}}
            <div class="col-md-9">
                <div class="tab-content" id="client-tabContent">

                    {{-- Customer Info --}}
                    <div class="tab-pane fade show active" id="panel-address" role="tabpanel">
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Customer Number</label>
                                <input type="text" name="customer_number" class="form-control" readonly value="{{ $customerNumber ?? '' }}">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Company Name</label>
                                <input type="text" name="company_name" class="form-control" required>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label class="form-label">Contact Person</label>
                                <input type="text" name="contact_person" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Email</label>
                                <input type="email" name="email" class="form-control" required>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Phone</label>
                            <input type="text" name="phone" class="form-control">
                        </div>
                    </div>

                    {{-- Shipping Address --}}
                    <div class="tab-pane fade" id="panel-shipping" role="tabpanel">
                        <h5 class="mb-3">Shipping Address</h5>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Street</label>
                                <input type="text" name="shipping_street" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">City</label>
                                <input type="text" name="shipping_city" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">State</label>
                                <input type="text" name="shipping_state" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Zip Code</label>
                                <input type="text" name="shipping_zip" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Country</label>
                                <input type="text" name="shipping_country" class="form-control">
                            </div>
                        </div>
                    </div>

                    {{-- Billing Address --}}
                    <div class="tab-pane fade" id="panel-billing" role="tabpanel">
                        <h5 class="mb-3">Billing Address</h5>
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label">Street</label>
                                <input type="text" name="billing_street" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">City</label>
                                <input type="text" name="billing_city" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">State</label>
                                <input type="text" name="billing_state" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Zip Code</label>
                                <input type="text" name="billing_zip" class="form-control">
                            </div>
                            <div class="col-md-6">
                                <label class="form-label">Country</label>
                                <input type="text" name="billing_country" class="form-control">
                            </div>
                        </div>
                    </div>

                    {{-- Tax Info --}}
                    <div class="tab-pane fade" id="panel-tax" role="tabpanel">
                        <h5 class="mb-3">Tax Information</h5>
                        <div class="mb-3">
                            <label class="form-label">Tax Number / GST / VAT</label>
                            <input type="text" name="tax_number" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tax Registration Type</label>
                            <select name="tax_type" class="form-select">
                                <option value="">Select...</option>
                                <option value="gst">GST</option>
                                <option value="vat">VAT</option>
                                <option value="none">Not Registered</option>
                            </select>
                        </div>
                    </div>

                    {{-- Bank Info --}}
                    <div class="tab-pane fade" id="panel-bank" role="tabpanel">
                        <h5 class="mb-3">Customer's Bank</h5>
                        <div class="mb-3">
                            <label class="form-label">Bank Name</label>
                            <input type="text" name="bank_name" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Account Number</label>
                            <input type="text" name="account_number" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">IFSC / SWIFT Code</label>
                            <input type="text" name="bank_code" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Account Holder Name</label>
                            <input type="text" name="account_holder" class="form-control">
                        </div>
                    </div>

                </div>
            </div>
        </div>

        {{-- Buttons --}}
        <div class="mt-4 text-end">
            <button type="submit" class="btn btn-success">
                <i class="fas fa-save me-1"></i> {{ __('messages.save') }}
            </button>
            <a href="{{ route('admin.clients.index') }}" class="btn btn-secondary">
                {{ __('messages.cancel') }}
            </a>
        </div>
    </form>
</div>
@endsection
