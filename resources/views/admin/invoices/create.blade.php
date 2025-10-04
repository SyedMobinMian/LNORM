@extends('layouts.app')

@section('title', __('messages.create_invoice'))

@section('content')
<div class="container-fluid">
    <h4 class="mb-4">{{ __('messages.create_invoice') }}</h4>

    <form action="{{ route('admin.invoices.store') }}" method="POST" id="invoiceForm" class="card shadow-sm p-4">
        @csrf

        {{-- Invoice Details --}}
        <div class="row mb-4">
            <div class="col-md-4">
                <label class="form-label">Invoice Number</label>
                <input type="text" name="invoice_number" value="{{ $invoiceNumber }}" readonly class="form-control">
            </div>
            <div class="col-md-4">
                <label class="form-label">Client</label>
                <select name="client_id" class="form-select" id="clientSelect" required>
                    <option value="">Select Client</option>
                    @foreach($clients as $client)
                        <option value="{{ $client->id }}">{{ $client->company_name }} - {{ $client->email }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4">
                <label class="form-label">Invoice Date</label>
                <input type="date" name="invoice_date" class="form-control" required value="{{ now()->toDateString() }}">
            </div>
            <div class="col-md-4 mt-3">
                <label class="form-label">Due Date</label>
                <input type="date" name="due_date" class="form-control">
            </div>
        </div>

        {{-- Billing & Shipping --}}
        <div class="row mb-4">
            <div class="col-md-6">
                <label class="form-label">Billing Address</label>
                <textarea name="billing_address" id="billingAddress" class="form-control" rows="3" readonly></textarea>
            </div>
            <div class="col-md-6">
                <label class="form-label">Shipping Address</label>
                <textarea name="shipping_address" id="shippingAddress" class="form-control" rows="3" readonly></textarea>
            </div>
        </div>

        {{-- Payment Modes --}}
        <div class="mb-4">
            <label class="form-label">Payment Modes</label>
            <div class="d-flex flex-wrap gap-3">
                @foreach(['Cash', 'Cheque', 'PDC', 'NEFT', 'RTGS', 'QR', 'Online', 'NetBanking'] as $mode)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" name="payment_modes[]" value="{{ $mode }}" id="mode_{{ $mode }}">
                        <label class="form-check-label" for="mode_{{ $mode }}">{{ $mode }}</label>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Items Table --}}
        <div class="table-responsive mb-4">
            <table class="table table-bordered table-hover align-middle" id="itemsTable">
                <thead class="table-light">
                    <tr>
                        <th>Item</th>
                        <th>Description</th>
                        <th width="10%">Qty</th>
                        <th width="15%">Rate</th>
                        <th width="10%">Disc. (%)</th>
                        <th width="10%">GST (%)</th>
                        <th width="15%">Total</th>
                        <th width="5%"><button type="button" class="btn btn-sm btn-success" onclick="addRow()">+</button></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><input type="text" name="items[0][item]" class="form-control" required></td>
                        <td><input type="text" name="items[0][description]" class="form-control"></td>
                        <td><input type="number" name="items[0][quantity]" class="form-control qty" min="1" value="1" required></td>
                        <td><input type="number" name="items[0][unit_price]" class="form-control rate" min="0" step="0.01" required></td>
                        <td><input type="number" name="items[0][discount]" class="form-control discount" min="0" step="0.01"></td>
                        <td><input type="number" name="items[0][gst]" class="form-control gst" min="0" step="0.01"></td>
                        <td><input type="text" name="items[0][total]" class="form-control total" readonly></td>
                        <td><button type="button" class="btn btn-sm btn-danger" onclick="removeRow(this)">−</button></td>
                    </tr>
                </tbody>
            </table>
        </div>

<div class="row mt-4">
    {{-- Left: Item table (8 columns) --}}
    <div class="col-md-8">
        {{-- Keep your invoice items table here --}}
        {{-- (item, description, qty, rate, gst, discount, total) --}}
    </div>

    {{-- Right: Clean Vertical Totals (4 columns) --}}
    <div class="col-md-4">
        <div class="d-flex flex-column gap-2">

            <div class="d-flex justify-content-between align-items-center">
                <label class="mb-0 me-2">Total Price</label>
                <input type="number" name="total" id="total_price" class="form-control form-control-sm w-50 text-end" readonly>
            </div>

            <div class="d-flex justify-content-between align-items-center">
                <label class="mb-0 me-2">Total Discount</label>
                <input type="number" name="discount" class="form-control form-control-sm w-50 text-end" step="0.01">
            </div>

            <div class="d-flex justify-content-between align-items-center">
                <label class="mb-0 me-2">Packaging & Freight</label>
                <input type="number" name="freight" class="form-control form-control-sm w-50 text-end" step="0.01">
            </div>

            <div class="d-flex justify-content-between align-items-center">
                <label class="mb-0 me-2">Advance Paid</label>
                <input type="number" name="advance" class="form-control form-control-sm w-50 text-end" step="0.01">
            </div>

            <div class="d-flex justify-content-between align-items-center">
                <label class="mb-0 me-2">Balance Amount</label>
                <input type="number" name="balance" class="form-control form-control-sm w-50 text-end" readonly>
            </div>

            <div class="d-flex justify-content-between align-items-start">
                <label class="mb-0 me-2 mt-1">Note</label>
                <textarea name="notes" rows="3" class="form-control form-control-sm w-50"></textarea>
            </div>

        </div>
    </div>
</div>

    </form>
          <br>  
    {{-- Form Submit Button --}}
    <div class="d-flex justify-content-between">
        <div>
            <button type="submit" name="submit" value="submit" class="btn btn-primary">
                <i class="fas fa-save me-1"></i> Submit
            </button>
            <button type="submit" name="submit" value="draft" class="btn btn-warning">
                <i class="fas fa-file-alt me-1"></i> Save as Draft
            </button>
        </div>
        <a href="{{ route('admin.invoices.index') }}" class="btn btn-secondary">
            <i class="fas fa-times me-1"></i> Cancel
        </a>
    </div>
</div>
@endsection

@push('scripts')
<script>
    let rowIndex = 1;

    function addRow() {
        const row = `<tr>
            <td><input type="text" name="items[${rowIndex}][item]" class="form-control" required></td>
            <td><input type="text" name="items[${rowIndex}][description]" class="form-control"></td>
            <td><input type="number" name="items[${rowIndex}][quantity]" class="form-control qty" min="1" value="1" required></td>
            <td><input type="number" name="items[${rowIndex}][unit_price]" class="form-control rate" min="0" step="0.01" required></td>
            <td><input type="number" name="items[${rowIndex}][discount]" class="form-control discount" min="0" step="0.01"></td>
            <td><input type="number" name="items[${rowIndex}][gst]" class="form-control gst" min="0" step="0.01"></td>
            <td><input type="text" name="items[${rowIndex}][total]" class="form-control total" readonly></td>
            <td><button type="button" class="btn btn-sm btn-danger" onclick="removeRow(this)">−</button></td>
        </tr>`;
        $('#itemsTable tbody').append(row);
        rowIndex++;
    }

    function removeRow(btn) {
        $(btn).closest('tr').remove();
    }

    // TODO: Add logic for live calculation, balance update, and autofill billing/shipping from selected client
</script>
@endpush
