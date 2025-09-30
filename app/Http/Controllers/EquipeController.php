<?php

namespace App\Http\Controllers;

use App\Models\Equipe;
use Illuminate\Http\Request;
use App\Services\EquipeService;

class EquipeController extends Controller {
    public function listEquipes() {
        $service = new EquipeService();
        $equipes = $service->getListEquipes();
        return view('listEquipes', compact('equipes'));
    }
    public function addEquipe() {
        $equipe =  new Equipe();
        return view('formEquipe', compact('equipe'));
    }

    public function validEquipe(Request $request) {
        $id = $request->input('id');
        $service = new EquipeService();
        if ($id) {
            $equipe = $service->getEquipe($id);
        } else {
            $equipe = new Equipe();
        }
        $equipe->code = $request->input("code");
        $equipe->libelle = $request->input("libelle");
        $equipe->secteur = $request->input("secteur");

        $service->saveEquipe($equipe);

        return view('home');
    }

    public function editEquipe($id) {
        $service = new EquipeService();
        $equipe = $service->getEquipe($id);

        return view('formEquipe', compact('equipe'));
    }
}
