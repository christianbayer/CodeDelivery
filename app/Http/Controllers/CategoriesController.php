<?php

namespace CodeDelivery\Http\Controllers;

use Illuminate\Http\Request;

use CodeDelivery\Http\Requests;

class CategoriesController extends Controller
{
    public function index(){
        $nome = 'Christian';
        return view('admin.categories.index', compact('nome'));
    }
}
