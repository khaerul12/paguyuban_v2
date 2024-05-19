<?php

namespace App\Livewire;

use App\Models\Biodata;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;


class BiodataList extends Component
{
    use WithPagination;

    #[Url()]
    public $search = '';

    #[On('search')]
    public function updateSearch($search){
        $this->search = $search;
//        dd($search);
    }

   #[Computed()]
    public function bios(){
        return Biodata::where([
            ['full_name','like',"%{$this->search}%"],
             ['head_kk','=', null],
            ])
            // ->orWhereHas('address', function ($query){
            //     $query->whereHas('city', function ($query){
            //         $query->where('name','like',"%{$this->search}%");
            //     });

            
            // })
        ->paginate(5);
    }

    public function render()
    {
        return view('livewire.biodata-list');
    }


}
