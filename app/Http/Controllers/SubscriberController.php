<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Subscriber;
use Illuminate\Support\Facades\Validator;

class SubscriberController extends Controller
{
    public function store(Request $request)
    {
        // 1. Validasi
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:subscribers,email'
        ], [
            'email.required' => 'Email is required.',
            'email.email'    => 'Please provide a valid email address.',
            'email.unique'   => 'You have already subscribed!',
        ]);

        // 2. Jika Gagal Validasi
        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        // 3. Simpan ke Database
        try {
            Subscriber::create([
                'email' => $request->email
            ]);

            return response()->json([
                'status'  => 'success',
                'message' => 'Thank you for subscribing to our newsletter!'
            ]);

        } catch (\Exception $e) {
            return response()->json([
                'status' => 'error',
                'message' => 'Something went wrong, please try again.'
            ], 500);
        }
    }
}
