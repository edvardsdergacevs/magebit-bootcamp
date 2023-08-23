<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class AnimalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return View
     */
    public function index(Request $request): View
    {
        $query = $request['query'];

        if ($request['reset'] === 1) {
            $result = Animal::all()->sortBy('name');

            return view('index', ['animals' => $result]);
        }

        if ($query) {
            $result = Animal::where('name', 'LIKE', '%' . $query . '%')
                ->orWhere('description', 'LIKE', '%' . $query . '%')
                ->get();
        } else {
           $result = Animal::all()->sortBy('name');
        }

        return view('index', ['animals' => $result]);
    }
}
