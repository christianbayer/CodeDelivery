<?php
namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Repositories\OrderRepository;

class OrdersController extends Controller
{

    private $orderRepository;

    public function __construct(OrderRepository $orderRepository)
    {

        $this->orderRepository = $orderRepository;
    }

    public function index()
    {
        $orders = $this->orderRepository->paginate(5);
        return view('admin.orders.index', compact('orders'));
    }
}