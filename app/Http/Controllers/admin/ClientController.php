<?php
namespace App\Http\Controllers\Admin;
use App\Models\Client;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class ClientController extends Controller
{
    public function index()
    {
        $clients = Client::latest()->paginate(10);
        return view('admin.clients.index', compact('clients'));
    }
    public function create()
    {
        // Define a prefix (can later be loaded from settings)
        $prefix = 'CUST-';

        // Get the last client number
        $lastClient = Client::orderBy('id', 'desc')->first();
        $nextNumber = $lastClient ? $lastClient->id + 1 : 1;

        // Generate customer number with leading zeros
        $customerNumber = $prefix . str_pad($nextNumber, 5, '0', STR_PAD_LEFT);

        return view('admin.clients.create', compact('customerNumber'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email',
        ]);

        $data = $request->all();

        // Assign generated customer number manually
        $lastClient = Client::orderBy('id', 'desc')->first();
        $nextNumber = $lastClient ? $lastClient->id + 1 : 1;
        $data['customer_number'] = 'CUST-' . str_pad($nextNumber, 5, '0', STR_PAD_LEFT);

        Client::create($data);

        return redirect()->route('admin.clients.index')->with('success', 'Client created successfully.');
    }
    public function edit(Client $client)
    {
        return view('admin.clients.edit', compact('client'));
    }
    public function update(Request $request, Client $client)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'email' => 'required|email|unique:clients,email,' . $client->id,
        ]);
        $client->update($request->all());
        return redirect()->route('admin.clients.index')->with('success', 'Client updated successfully.');
    }
    public function destroy(Client $client)
    {
        $client->delete();
        return back()->with('success', 'Client deleted.');
    }
}
