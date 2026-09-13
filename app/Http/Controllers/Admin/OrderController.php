<?php

namespace App\Http\Controllers\Admin;

use App\DataTables\OrderDataTable;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(OrderDataTable $dataTable)
    {
        return $dataTable->render('dashboard.order.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $order = Order::with(['package', 'user'])->findOrFail($id);

        return view('dashboard.order.show',
            ['order' => $order]
        );
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $order = Order::findOrFail($id);
        $order->update([
            'payment_status' => $request->payment_status
        ]);

        return redirect()->back()->with('success', 'Payment status updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        try {
            $order = Order::findOrFail($id);
            $order->subscription()->delete();
            $order->delete();
            return to_route('admin.orders.index')->with('success', 'Order deleted successfully.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Failed to delete order: ' . $e->getMessage());
        }

    }
}

/*
 * Failed to delete order: SQLSTATE[23000]: Integrity constraint violation: 1451 Cannot delete or update a parent row: a foreign key constraint fails (`youtube_booking_app`.`subscriptions`, CONSTRAINT `subscriptions_order_id_foreign` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`)) (Connection: mysql, SQL: delete from `orders` where `id` = 10)
 *
 * */
