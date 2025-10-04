@extends('layouts.app')
@section('title', 'Dashboard')
@section('content')
<div class="container-fluid">
    {{-- KPI Cards --}}
    <div class="row g-4 mb-4">
    <div class="col-sm-6 col-xl-3">
        <div class="kpi-card bg-primary text-white p-3 rounded shadow-sm position-relative">
            <h6 class="mb-2">{{ __('messages.total_sales') }}</h6>
            <hr class="bg-light opacity-50 mt-0 mb-3">
            <div class="d-flex justify-content-between align-items-center">
                <p class="fs-5 fw-bold mb-0">@currency(80000)</p>
                {{-- <i class="fas fa-dollar-sign fa-2x opacity-75"></i> --}}
                <i class="fas fa-money-bill-wave fa-2x opacity-75"></i>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="kpi-card bg-success text-white p-3 rounded shadow-sm position-relative">
            <h6 class="mb-2">{{ __('messages.total_profit') }}</h6>
            <hr class="bg-light opacity-50 mt-0 mb-3">
            <div class="d-flex justify-content-between align-items-center">
                <p class="fs-5 fw-bold mb-0">@currency(22000)</p>
                <i class="fas fa-chart-line fa-2x opacity-75"></i>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="kpi-card bg-warning text-dark p-3 rounded shadow-sm position-relative">
            <h6 class="mb-2">{{ __('messages.pending_invoices') }}</h6>
            <hr class="bg-dark opacity-25 mt-0 mb-3">
            <div class="d-flex justify-content-between align-items-center">
                <p class="fs-5 fw-bold mb-0">@currency(15000)</p>
                <i class="fas fa-file-invoice fa-2x opacity-75"></i>
            </div>
        </div>
    </div>
    <div class="col-sm-6 col-xl-3">
        <div class="kpi-card bg-danger text-white p-3 rounded shadow-sm position-relative">
            <h6 class="mb-2">{{ __('messages.low_inventory') }}</h6>
            <hr class="bg-light opacity-50 mt-0 mb-3">
            <div class="d-flex justify-content-between align-items-center">
                <p class="fs-5 fw-bold mb-0">4 Items</p>
                <i class="fas fa-boxes fa-2x opacity-75"></i>
            </div>
        </div>
    </div>
</div>

    {{-- <div class="row g-4 mb-4">
        <div class="col-sm-6 col-xl-3">
            <div class="kpi-card bg-primary text-white p-3 rounded shadow-sm">
                <h6>{{ __('messages.total_sales') }}</h6>
                <p class="fs-5 fw-bold mb-0">@currency(80000 )</p>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="kpi-card bg-success text-white p-3 rounded shadow-sm">
                <h6>{{ __('messages.total_profit')}}</h6>
                <p class="fs-5 fw-bold mb-0">@currency(22000)</p>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="kpi-card bg-warning text-dark p-3 rounded shadow-sm">
                <h6>{{ __('messages.pending_invoices')}}</h6>
                <p class="fs-5 fw-bold mb-0">@currency(15000)</p>
            </div>
        </div>
        <div class="col-sm-6 col-xl-3">
            <div class="kpi-card bg-danger text-white p-3 rounded shadow-sm">
                <h6>{{ __('messages.low_inventory')}}</h6>
                <p class="fs-5 fw-bold mb-0">4 Items</p>
            </div>
        </div>
    </div> --}}
    {{-- ......................... --}}
    {{-- Charts --}}
    <div class="row g-4">
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header fw-semibold">{{ __('messages.bank_summary')}}</div>
                <div class="card-body">
                    <canvas id="bankChart" height="200"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header fw-semibold">{{ __('messages.inventory_levels')}}</div>
                <div class="card-body">
                    <canvas id="inventoryChart" height="200"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header fw-semibold">{{ __('messages.monthly_sales')}}</div>
                <div class="card-body">
                    <canvas id="salesChart" height="200"></canvas>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card shadow-sm">
                <div class="card-header fw-semibold">{{ __('messages.profit_vs_loss')}}</div>
                <div class="card-body">
                    <canvas id="profitLossChart" height="200"></canvas>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
