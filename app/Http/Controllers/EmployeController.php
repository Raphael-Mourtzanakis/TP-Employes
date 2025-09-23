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
    public function addEmploye() {
        return view('formEmploye');
    }

    public function validEmploye(Request $request) {
        $employe = new Employe();
        $employe->civilite = $request->input("civil");
        $employe->prenom = $request->input("prenom");
        $employe->nom = $request->input("nom");
        $employe->pwd = password_hash($request->input("mdp"), PASSWORD_DEFAULT);
        $employe->profil = $request->input("profil");
        $employe->interet = $request->input("interet");
        $employe->message = $request->input("msg");

        $service = new EmployeService();
        $service->saveEmploye($employe);

        return view('home');
    }
}
