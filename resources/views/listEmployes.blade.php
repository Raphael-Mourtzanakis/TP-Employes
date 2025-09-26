@extends('layouts.master')

@section('content')
    <div class="container">
        <h1>Liste des employés</h1>
    </div>

    <table class="table table-bordered table-striped">
        <thead>
        <tr>
            <th>Civilité</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Intérêt</th>
            <th>Profil</th>
            <th>Message</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($employes as $emp)
            <tr>
                <td>{{ $emp->civilite }}</td>
                <td>{{ $emp->nom }}</td>
                <td>{{ $emp->prenom }}</td>
                <td>{{ $emp->interet }}</td>
                <td>{{ $emp->profil }}</td>
                <td>{{ $emp->message }}</td>
                <td><a href="{{url("/editerEmploye/".$emp->numEmp)}}">Afficher</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
@endsection
