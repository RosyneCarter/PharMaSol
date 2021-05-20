<?php

namespace App\Http\Livewire;

use App\commande;
use App\statut;
use Livewire\Component;
use Illuminate\Support\Facades\DB;

class AlertId extends Component
{
    public $statuts;
    public $commandes;
    public $commandeId;
    public $selectedStatut = null;

    public function mount($commande){
        $this->commandes = commande::all();
        $this->statuts = statut::all();
        $this->commandeId = $commande->id;
    }
    public function render()
    {
        return view('livewire.alert-id');
    }
    public function updatedSelectedStatut(){
        $commande = commande::find($this->commandeId);
        $commande->statut_id = $this->selectedStatut;
        $commande->save();
        $this->render();
    }
}
