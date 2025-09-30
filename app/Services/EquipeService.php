<?php

namespace App\Services;

use App\Models\Equipe;

class EquipeService
{
    public function getListEquipes() {
        $liste = Equipe::query()
            ->select()
            ->orderBy('numEqu')
        ->get();

        return $liste;
    }

    public function getEquipe($id) {
        $equipe = Equipe::query()
            /*
             ->select()
            ->where("numEmp", "=", $id)
        ->get();
            */
            ->find($id);

        return $equipe;
    }

    public function saveEquipe(Equipe $equipe) {
        $equipe->save();
    }
}
