<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    public function pay($order_id)
    {
        $validator = Validator::make(
            ['order_id' => $order_id],
            ['order_id' => 'required|integer|exists:orders,id']
        );

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation error.',
                'errors' => $validator->errors(),
            ], 422);
        }

        $order = Order::find($order_id);
        if (!$order) {
            return response()->json(["message" => "order not found"]);
        }
        if ($order->status !== 'pending') {
            return response()->json([
                'message' => 'Order status must be pending to be paid.',
            ], 400);
        }

        DB::beginTransaction();

        try {
            $order->status = 'paid';
            $order->save();

            $user = $order->user;
            $pointsToAdd = $order->total_price;

            if ($order->total_price >= 100) {
                $pointsToAdd += 10;
            }

            $user->points += $pointsToAdd;
            $user->save();

            DB::commit();

            return response()->json([
                'message' => 'Order paid successfully.',
                'order' => $order,
                'user_points' => $user->points,
            ]);
        } catch (\Throwable $e) {
            DB::rollBack();

            return response()->json([
                'message' => 'Something went wrong.',
                'error' => $e->getMessage(),
            ], 500);
        }
    }
}
