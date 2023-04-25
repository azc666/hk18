<?php

namespace App\Http\Livewire;

use LivewireUI\Modal\ModalComponent;
use Carbon\Carbon;
use App\Models\Title;
use Livewire\Component;
use Illuminate\Http\Request;
// use Livewire\WithPagination;
// use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Session;

class CreateTitle extends ModalComponent
{
    // public $search;
    // public $sortField;
    // public $sortAsc = true;
    // public $pages = 10;
    // protected $queryString = ['search', 'active', 'sortAsc'];

    public $modelId;
    public $type;
    public $title;
    public $active = 1;

    public function rules()
    {
        return [
            'type' => 'required',
            'title' => 'required',
            'active' => 'required',
        ];
    }

    public function mount()
    {
        // $this->resetPage();
    }

    public function create(Title $title)
    {
        $this->validate();

        Title::create($this->modelData());

        $this->closeModal();
        // $this->resetVars();
    }

    public function modelData()
    {
        return [
            'type' => $this->type,
            'title' => $this->title,
            'active' => $this->active,
        ];

    }

    public function render()
    {
        return view('livewire.create-title');
    }
}
