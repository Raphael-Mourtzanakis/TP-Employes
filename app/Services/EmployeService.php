<?php

namespace App\Services;

use App\Models\Employe;

class EmployeService
{
    public function getListEmployes() {
        $liste = Employe::query()
            ->select()
            ->orderBy('nom')
        ->get();

        return $liste;
    }

    public function getEmploye($id) {
        $employe = Employe::query()
            ->select()
            ->where("numEmp", "=", $id)
        ->get();

        return $employe;
    }

    public function saveEmploye(Employe $employe) {
        $employe->save();
    }
}
