@extends('layouts.app')


@section('content')
    <section id="basic-datatable">
        <div class="row justify-content-center">
            <div class="col-md-2">
            </div>
            <div class="col-md-9">
                
                @if (session()->has('statut'))
                        <div class="alert alert-success" role="alert" align="center">
                            {{session()->get('statut')}}
                        </div>
                        @endif
                <div class="card">
                    <div class="card-header" align="center"></h1><strong>{{ ('LISTE DES FOURNISSEURS') }}</strong></h1></div>
                    <div class="card-body">
                    <table class = "table table-striped table-bordered" id="example">
                        <div class="dt-buttons btn-group">
                            <div class="float-md-left d-block mb-1">
                                <a href="{{ route('Fournisseurs.Fournisseurs.create') }}" class="btn btn-primary">Ajouter</a>
                            </div>
                        </div>
                    <thead>
                        <tr>
                        <th scope = "col"> # </th>
                        <th scope = "col"> Nom </th>
                        <th scope = "col"> Email </th>
                        <th scope = "col"> Adresse </th>
                        <th scope = "col"> Contact </th>
                        <th scope = "col"> Actions </th>
                    </thead>
                    <tfoot>
                    <th scope = "col"> # </th>
                        <th scope = "col"> Nom </th>
                        <th scope = "col"> Email </th>
                        <th scope = "col"> Adresse </th>
                        <th scope = "col"> Contact </th>
                        <th scope = "col"> Actions </th> 
                    </tfoot>
                    <tbody>
                        
                    @foreach ($fournisseurs as $fournisseur)
                    <tr>
                    <td scope = "row"> {{$fournisseur->id}} </td>
                    <td> {{$fournisseur->name}} </td>
                    <td> {{$fournisseur->email}}</td>
                    <td> {{$fournisseur->adresse}} </td>
                    <td> {{$fournisseur->contact}} </td>
                    
                    <td>
                        <a href="{{ route('Fournisseurs.Fournisseurs.show',$fournisseur->id) }}" class="btn btn-primary"><strong>Commander</strong></a>
                        <a href="{{ route('Fournisseurs.Fournisseurs.edit', $fournisseur->id) }}"><button class = "btn btn-success" title="Editer"><i class="fa fa-pencil"></i></button></a>
                    <form action="{{ route('Fournisseurs.Fournisseurs.destroy', $fournisseur->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" title="supprimer"><i class="feather icon-trash" aria-hidden="true"></i></button>
                    </form>
                    </div>
                    </td>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>

</section>
@endsection
