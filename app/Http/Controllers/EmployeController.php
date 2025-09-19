<?php

namespace App\Http\Controllers;

use App\Models\Employe;
use Illuminate\Http\Request;
use App\Services\EmployeService;

class EmployeController extends Controller {
    public function listEmployes() {
        $service = new EmployeService();
        $employes = $service->getListEmployes();
        return view('listEmployes', compact('employes'));
    }
}
