<?php

namespace CodeDelivery\Http\Controllers;

use CodeDelivery\Http\Requests\AdminCategoryRequest;
use CodeDelivery\Http\Requests\AdminCupomRequest;
use CodeDelivery\Repositories\CupomRepository;
use CodeDelivery\Http\Requests;

class CupomsController extends Controller
{

    private $cupomRepository;

    public function __construct(CupomRepository $cupomRepository)
    {
        $this->cupomRepository = $cupomRepository;
    }

    public function index()
    {
        $cupoms = $this->cupomRepository->paginate(5);

        return view('admin.cupoms.index', compact('cupoms'));
    }

    public function create()
    {
        return view('admin.cupoms.create');
    }

    public function store(AdminCupomRequest $request)
    {
        $input = $request->all();
        $this->cupomRepository->create($input);

        return redirect()->route('admin.cupoms.index');
    }
    
}
