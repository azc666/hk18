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

class EditTitle extends ModalComponent
{
    public $search;
    public $sortField;
    public $sortAsc = true;
    // public $pages = 10;
    protected $queryString = ['search', 'active', 'sortAsc'];

    public $titleId;
    public $type;
    public $title;
    public $active = 1;
    public $fetchbyid;

    public function rules()
    {
        return [
            'type' => 'required',
            'title' => 'required',
            'active' => 'required',
        ];
    }

    public function mount(Title $title)
    {

    }

    // public function create(Title $title)
    // {
    //     $this->validate();

    //     Title::create($this->modelData());

    //     $this->closeModal();

    // }

    public function modelData()
    {
        return [
            'type' => $this->type,
            'title' => $this->title,
            'active' => $this->active,
        ];
    }

        Public function loadModel()
    {
        $data = Title::find($this->fetchbyid);
        // dd($data);
        $this->type = $data->type;
        $this->title = $data->title;
        $this->active = $data->active;
    }

    public function fetchbyid() {
        $this->titleId = Title::orderby('id','asc')
            ->select('*')
            ->where('id', $this->titleId)
            ->get();
            // dd($this->titleId);
    }

    public function updateShowModal($id)
    {

        $this->modelId = $id;
        Session::put('modelId', $id);
        // $this->modalFormVisible = true;
        $this->fetchbyid();
    }

    public function update()
    {
        // dd($this->modelId);
        $this->validate();
        Title::find($this->titleId)->update($this->modelData());
        // $this->modalFormVisible = false;
    }

    public function render(Title $title, Request $request)
    {
        $titleId = $this->titleId;
        $titleId = Title::orderby('id','asc')
            ->select('*')
            ->where('id', $titleId)
            ->get();
// dd('hola');
        // $titleId = $this->titleId;
        // dd($titleId);
        return view('livewire.edit-title', compact('titleId'));
        // [
        //         'data' => $this->modelData(),
        //         'modelId' => $this->modelId,
        //         'titles' => Title::where(function ($query) {
        //             $query->where('type', 'like', '%' . $this->search . '%')
        //                 ->orWhere('title', 'like', '%' . $this->search . '%');
        //         })->where('active', $this->active)
        //     ]);
    }
}
