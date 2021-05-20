<select class="form-control" id="multiselect" name="statut" required wire:model="selectedStatut">
    @foreach($statuts as $statut)
        <option value="{{$statut->id}}">{{$statut->nom}}</option>
    @endforeach
</select>

