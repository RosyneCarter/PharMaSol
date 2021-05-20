@extends('layouts.app')


@section('content')

<div>
    
</div>
</div>
    <section id="basic-datatable">
        <div class="row justify-content-center">
            <div class="col-md-2">
            </div>
            <div class="col-md-9">
                <div class="card">
                    <div class="card-header"></h1><strong style="margin-left: 400px">{{ ('PRODUITS') }}</strong></h1>
                        &nbsp;&nbsp;<button data-toggle="modal" data-target="#exampleModal" class = "far fa-bell" title="Alerte" style="margin-left: 900px"></button>
                    </div>
                    <div class="card-body">
                        <div class="dt-buttons btn-group">
                            @can('manage-user')
                            <div class="float-md-left d-block mb-1">
                                <a href="{{route('/text.create')}}" class="btn btn-primary">Ajouter</a>
                            </div>
                            @endcan
                            <div style="margin-left: 700px">
                                <a href="{{route('enregistrements.enregistrements.index')}}" class="btn btn-primary">Enregistrer Une Vente</a>
                            </div>
                        </div>
                        <br><br>
                        <table id="example" class="table-striped table-bordered" style="font-size: 17px;" >
                            <thead>
                                <tr>
                                    <th scope = "col" style="font-size: 17"> # </th>
                                    <th scope = "col"  style="font-size: 17">Nom_Commercial</th>
                                    <th scope = "col"> Emplacement </th>
                                    <th scope = "col"> Prix </th>
                                    <th scope = "col"> Categorie </th>
                                    <th scope = "col"> Type </th>
                                    <th scope = "col">Dosage</th>
                                    <th scope = "col">Forme</th>
                                    @can('manage-user')
                                    <th scope = "col"> Quantité </th>
                                    @endcan
                                    <th scope = "col">Date-Exp</th>
                                    @can('manage-user')
                                    <th scope = "col"> Actions </th>
                                    @endcan
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($produits as $produit)
                                <tr>
                                    <td scope = "row"> {{$produit->id}} </td>
                                    
                                    <td> {{$produit->Nom_Commercial}} </td>
                                    <td> {{$produit->Emplacement}} </td>
                                    <td> {{implode(',', $produit->prix()->pluck('prix')->toArray())}} </td>
                                    <td> {{$produit->categorie->categorie}} </td>
                                    <td> {{$produit->type->type}} </td>
                                    <td> {{$produit->Dosage}} </td>
                                    <td> {{$produit->forme->forme}} </td>
                                    @can('manage-user')
                                        <td style="color: {{ $produit->Quantité < 10 ? 'red' : ''}}"> {{$produit->Quantité}} </td>
                                    
                                    @endcan
                                    <td> {{$produit->date_Exp}} </td>
                                    @can('manage-user')
                                    <td>
                                    <a href = "{{ route('/text.edit', $produit->id) }}"><button class = "btn btn-success" title="Editer"><i class="fa fa-pencil"></i></button></a>
                                    <form action="{{ route('/text.destroy', $produit->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" title="supprimer"><i class="feather icon-trash" aria-hidden="true"></i></button>
                                    </form>    
                                    </div>
                                    @endcan
                                    </td>
                                    @endforeach
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Alerte ! ! </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div style="text-align: center; background-color:#c72e08; color:white;" id="alerte">
                    <p>{{$message}}</p>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
  </div>

    </section>
  @endsection