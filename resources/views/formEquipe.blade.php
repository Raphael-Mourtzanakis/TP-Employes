@extends('layouts.master')

@section('content')
    <form method="POST" action="{{ url('/validerEquipe') }}">
        {{ csrf_field() }}

        <h1>@if ($equipe->numEqu) Fiche @else Ajout @endif d'une équipe</h1>
        <div class="col-md-12 card card-body bg-light">
            @if ($equipe->numEqu) <input type="hidden" name="id" value="{{$equipe->numEqu}}"> @endif
            <div class="form-group">
                <label class="col-md-3">Code : </label>
                <div class="col-md-6">
                    <input type="text" name="code" value="{{$equipe->code}}" class="form-control" maxlength="5" required></div>
            </div>
            <div class="form-group">
                <label class="col-md-3">Libellé : </label>
                <div class="col-md-6">
                    <input type="text" name="libelle" value="{{$equipe->libelle}}" class="form-control" maxlength="20" placeholder="Entrez un libellé ici..." required></div>
            </div>
            <div class="form-group">
                <label class="col-md-3">Secteur : Vous êtes en</label>
                <div class="col-md-6">
                    <select class="form-select" name="secteur">
                        <option value="admin" @if ($equipe->secteur == "admin") selected @endif >Administration</option>
                        <option value="vente" @if ($equipe->secteur != "admin" && $equipe->secteur != "prod") selected @endif>Vente</option>
                        <option value="prod" @if ($equipe->secteur == "prod") selected @endif>Production</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-md-12 col-md-offset-3">
                    <button type="submit" class="btn btn-primary">
                        @if ($equipe->numEqu) Modifier @else Valider @endif
                    </button>
                    <button type="button" class="btn btn-secondary"
                            @if ($equipe->numEqu) onclick="if (confirm ('Annuler la saisie ?')) window.location='{{ url('/listerEquipes') }}';">
                            @else onclick="if (confirm ('Annuler la saisie ?')) window.location='{{ url('/') }}';">
                            @endif
                        Annuler
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection
