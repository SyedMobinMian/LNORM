<?php

namespace App\Http\Controllers;

use App\Models\Client;
use App\Models\Invoice;
use App\Models\InvoiceItem;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class InvoiceController extends Controller
{
    public function index()
    {
        $invoices = Invoice::latest()->with('client')->paginate(10);
        return view('admin.invoices.index', compact('invoices'));
    }

    public function create()
    {
        $clients = Client::all();

        // Generate invoice number (INV-00001)
        $lastInvoice = Invoice::orderBy('id', 'desc')->first();
        $nextId = $lastInvoice ? $lastInvoice->id + 1 : 1;
        $invoiceNumber = 'INV-' . str_pad($nextId, 5, '0', STR_PAD_LEFT);

        return view('admin.invoices.create', compact('clients', 'invoiceNumber'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'client_id' => 'required|exists:clients,id',
            'invoice_date' => 'required|date',
            'due_date' => 'nullable|date',
            'items.*.item' => 'required|string',
            'items.*.quantity' => 'required|integer|min:1',
            'items.*.unit_price' => 'required|numeric|min:0',
        ]);

        DB::beginTransaction();

        try {
            $invoice = Invoice::create([
                'invoice_number' => $request->invoice_number,
                'client_id'      => $request->client_id,
                'invoice_date'   => $request->invoice_date,
                'due_date'       => $request->due_date,
                'tax'            => $request->tax ?? 0,
                'discount'       => $request->discount ?? 0,
                'total'          => $request->total ?? 0,
                'status'         => 'draft',
                'notes'          => $request->notes,
            ]);

            foreach ($request->items as $item) {
                InvoiceItem::create([
                    'invoice_id' => $invoice->id,
                    'item'       => $item['item'],
                    'quantity'   => $item['quantity'],
                    'unit_price' => $item['unit_price'],
                    'total'      => $item['quantity'] * $item['unit_price'],
                ]);
            }

            DB::commit();
            return redirect()->route('invoices.index')->with('success', 'Invoice created successfully.');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->with('error', 'Error creating invoice: ' . $e->getMessage());
        }
    }
}
