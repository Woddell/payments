<?php

namespace App\Http\Controllers;

use App\Http\Resources\PaymentCollection;
use App\Http\Resources\PaymentResource;
use App\Models\Payment;
use Illuminate\Http\Request;
        return new PaymentCollection(Payment::all());
    }

    public function store(Request $request)
    {
        $data = $request->validate(
            [
                'title' => 'required',
                'description' => 'required',
                'amount' => 'required|numeric',
                'payment_date' => 'required|date'
            ]
        );

        Payment::query()->create(
            [
                'user_id' => 1,
                'title' => $data['title'],
                'description' => $data['description'],
                'amount' => $data['amount'],
                'payment_date' => $data['payment_date'],
            ]
        );

        return response()->json(['status' => 'created'], 201);

    }

    public function show(Payment $payment)
    {
        return new PaymentResource($payment);
    }

    public function update(Request $request, Payment $payment)
    {
        //
    }

    public function destroy(Payment $payment)
    {
        //
    }
}
