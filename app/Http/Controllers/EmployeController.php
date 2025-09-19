<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EmployeController extends Controller {
    public function listEmployes() {
        $employes = [];
        return view('listEmployes', compact('employes'));
    }
}
