<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $payments = PaymentMethod::all();
        return view('admin.payment-methods.index', compact('payments'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'tipe_pembayaran' => 'required|string|max:255',
        ],[
            'tipe_pembayaran.required' => 'Nama tipe pembayaran wajib diisi.'
        ]);

        PaymentMethod::create([
            'tipe_pembayaran' => $request->tipe_pembayaran,
        ]);
        
        return redirect()->route('admin.payment-methods.index')->with('success', 'Metode pembayaran berhasil ditambahkan.');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $request->validate([
            'tipe_pembayaran' => 'required|string|max:255',
        ],[
            'tipe_pembayaran.required' => 'Nama tipe pembayaran wajib diisi.'
        ]);

        $paymentMethods = PaymentMethod::findOrFail($id);

        $paymentMethods->update([
            'tipe_pembayaran' => $request->tipe_pembayaran,
        ]);

        
        return redirect()->route('admin.payment-methods.index')->with('success', 'Metode pembayaran berhasil ditambahkan.');

        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        PaymentMethod::destroy($id);
        return redirect()->route('admin.payment-methods.index')->with('success', 'Metode pembayaran berhasil dihapus.');

    }
}
