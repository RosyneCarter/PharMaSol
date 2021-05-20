<div class="row">
    <div class="col-md-6">
        <label for="password" class="col-md-8 col-form-label">{{ __('Statut') }}</label>
        <select class="form-control" id="multiselect" name="statut" required>
            @foreach($statuts as $statut)
                <option value="">{{$statut->nom}}</option>
            @endforeach
        </select>
    </div>
</div>