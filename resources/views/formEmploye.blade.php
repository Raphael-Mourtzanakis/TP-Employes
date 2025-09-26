@extends('layouts.master')

@section('content')
    <form method="POST" action="{{ url('/validerEmploye') }}">
        {{ csrf_field() }}

        <h1>@if ($employe->numEmp) Fiche @else Ajout @endif d'un employé</h1>
        <div class="col-md-12 card card-body bg-light">
            @if ($employe->numEmp) <input type="hidden" name="id" value="{{$employe->numEmp}}"> @endif
            <div class="form-group">
                <label class="col-md-3">Civilité :</label>
                <div class="col-md-6">
                    <p>
                        <input type="radio" name="civil" value="Mme" required @if ($employe->civilite == "Mme") checked @endif> Madame<br>
                        <input type="radio" name="civil" value="M" required @if ($employe->civilite == "M") checked @endif> Monsieur
                    </p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3">Nom: </label>
                <div class="col-md-6">
                    <input type="text" name="nom" value="{{$employe->nom}}" class="form-control" required></div>
            </div>
            <div class="form-group">
                <label class="col-md-3">Prénom : </label>
                <div class="col-md-6">
                    <input type="text" name="prenom" value="{{$employe->prenom}}" class="form-control" required></div>
            </div>
            <div class="form-group">
                <label class="col-md-3">Mot de passe : </label>
                <div class="col-md-6">
                    <input type="password" name="mdp" value="" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3">Profil: Vous êtes</label>
                <div class="col-md-6">
                    <select class="form-select" name="profil">
                        <option value="parti" @if ($employe->profil == "parti") selected @endif >Un particulier</option>
                        <option value="profe" @if ($employe->profil != "parti" && $employe->profil != "insti") selected @endif>Un professionnel</option>
                        <option value="insti" @if ($employe->profil == "insti") selected @endif>Un institutionnel</option>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6">Quel type de présentation recherchez-vous ?</label>
                <div class="col-md-6">
                    <p>
                        <input type="checkbox" name="interet" value="location" @if ($employe->interet == "location") checked @endif/> Location de mobilier<br>
                        <input type="checkbox" name="interet" value="achat" @if ($employe->interet == "achat") checked @endif/> Achat de mobilier
                    </p>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-6">Message</label>
                <div class="col-md-6">
                    <p><textarea name="msg" placeholder="Écrivez votre message ici" rows="4" cols="40" maxlength="100">{{$employe->message}}</textarea></p>
                </div>
            </div>
            <div class="form-group">
                <div class="col-md-12 col-md-offset-3">
                    <button type="submit" class="btn btn-primary">
                        @if ($employe->numEmp) Modifier @else Valider @endif
                    </button>
                    <button type="button" class="btn btn-secondary"
                            @if ($employe->numEmp) onclick="if (confirm ('Annuler la saisie ?')) window.location='{{ url('/listerEmployes') }}';">
                            @else onclick="if (confirm ('Annuler la saisie ?')) window.location='{{ url('/') }}';">
                            @endif
                        Annuler
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection
