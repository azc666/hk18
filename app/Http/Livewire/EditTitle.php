<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Title;
use Livewire\Component;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
// use Livewire\WithPagination;
// use Illuminate\Pagination\Paginator;
use LivewireUI\Modal\ModalComponent;
use Illuminate\Support\Facades\Session;

class EditTitle extends ModalComponent
{
    public $search;
    // public $sortField;
    public $sortAsc = true;
    // public $pages = 10;
    protected $queryString = ['search', 'active', 'sortAsc'];

    public $titleId;
    public $Id;
    // public $id;
    public $type;
    public Title $title;
    // public $titles;
    public $active = 1;
    public $fetchbyid;
    public $emit;

    public function mount(Title $title)
    {
        $this->title = $title;
        $titleId = $this->titleId;
    }

    public function update()
    {
        $this->validate();
        $this->title->save();

        // return redirect('titles');
    }

    public function delete()
    {
        $this->title->delete();
        $this->emit('closeModal');

        return redirect('titles');
    }

    public function render(Title $titles)
    {
        return view('livewire.edit-title');
    }

    public function rules(): array
    {
        return [
            // 'title.id' => 'required',
            'title.type' => 'required',
            'title.title' => 'required',
            'title.active' => 'required',
        ];
    }
}
