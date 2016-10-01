<?php
namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Repositories\OrderRepository;
use CodeDelivery\Repositories\UserRepository;
use Illuminate\Http\Request;

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

    public function edit($id, UserRepository $userRepository) {
        $list_status = [0 => 'Pending', 1 => 'On the way', 2 => 'Delivered'];
        $order = $this->orderRepository->find($id);



        $deliveryman = $userRepository->getDeliverymen();

        return view('admin.orders.edit', compact('order', 'list_status', 'deliveryman'));
    }

    public function update(Request $request, $id) {
        $inputs = $request->all();
        $this->orderRepository->update($inputs, $id);

        return redirect()->route('admin.orders.index');
    }
}