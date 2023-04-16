<?php

namespace App\Http\Livewire;

use Carbon\Carbon;
use App\Models\Title;
use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\WithPagination;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Session;
use Illuminate\Pagination\AbstractPaginator;
use Illuminate\Pagination\LengthAwarePaginator;

class Titles extends Component
{
    use WithPagination;


    public $search;
    public $sortField;
    public $sortAsc = true;
    public $pages = 10;
    protected $queryString = ['search', 'active', 'sortAsc'];

    public $modalFormVisible = false;
    public $modelId;
    public $type;
    public $title;
    public $active = 1;
    // public $checkbox;
    // public $activeCheckbox = 1;
    public $modalConfirmDeleteVisible = false;

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
        $this->resetPage();
    }

    public function create(Title $title)
    {
        $this->validate();

        Title::create($this->modelData());
        $this->modalFormVisible = false;
        $this->resetVars();
    }

    public function read()
    {
        return $this->createShowModal();
    }

    public function update()
    {
        $this->validate();
        Title::find($this->modelId)->update($this->modelData());
        $this->modalFormVisible = false;
    }

    public function delete()
    {
        // $this->loadModel();
        // $data = Title::find($this->modelId);
        // $data2 = Title::find($this->modelId);
// dd(session('modelId'));
        Title::destroy(session('modelId'));

        $this->modalConfirmDeleteVisible = false;
        $this->modalFormVisible = false;
        $this->resetPage();
        Session::put('modelId', '');

    }

    public function createShowModal()
    {
        // dd('hola');
        $this->resetValidation();
        $this->resetVars();
        $this->modalFormVisible = true;
        $this->checkbox = true;
    }

    public function updateShowModal($id)
    {
        //
        $this->resetValidation();
        $this->resetVars();
        $this->modelId = $id;
        Session::put('modelId', $id);
        $this->modalFormVisible = true;
        $this->loadModel();
        // dd('hola');
    }

    public function deleteShowModal($id)
    {
        // $this->resetValidation();
        // $this->resetVars();
        // $this->modelId = $id;
        $this->modelId = session('modelId');
        // dd($this->modelId);
        $this->modalConfirmDeleteVisible = true;
        // $this->loadModel();

    }

    Public function loadModel()
    {
        $data = Title::find($this->modelId);
        $this->type = $data->type;
        $this->title = $data->title;
        // if ($data->active === 1) {
        //     $this->checkbox = 1;
        // } else {
        //     $this->active = false;
        //     $this->checkbox = 0;
        // }
        $this->active = $data->active;

        // dd('hola');
    }

    public function modelData()
    {
        return [
            'type' => $this->type,
            'title' => $this->title,
            'active' => $this->active,
        ];

    }

    public function sortBy($field)
    {
        if ($this->sortField === $field) {
            $this->sortAsc = !$this->sortAsc;
        } else {
            $this->sortAsc = true;
        }

        $this->sortField = $field;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function updatedPages()
    {
        // if (1+1 === 0) {
            switch ($this->pages) {
                case '10':
                    $this->pages = 10;
                    break;
                case '25':
                    $this->pages = 25;
                    break;
                case '50';
                    $this->pages = 50;
                    break;
                default:
                    $this->pages = 10;
                    break;
            }

        // }

    }

    public function resetVars()
    {
        $this->modelId = null;
        $this->type = null;
        $this->title = null;
        $this->active = 1;
        // $this->checkbox = 1;
    }

    public function render(Title $title)
    {
            return view('livewire.titles', [
                'data' => $this->modelData(),
                'titles' => Title::where(function ($query) {
                    $query->where('type', 'like', '%' . $this->search . '%')
                        ->orWhere('title', 'like', '%' . $this->search . '%');
                })->where('active', $this->active)
                    // ->orWhere('active', false)
                    ->when($this->sortField, function ($query) {
                        $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
                    })->paginate($this->pages),
                    // ->through(function($titles, $pages) {
                    //     $titles['active'] = $titles->active;
                    //     })
            ]);
    }

    public function paginationView()
    {
        return 'livewire.custom-pagination-links-view';
    }

}
