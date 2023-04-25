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
    // public $sortField;
    public $sortAsc = true;
    // public $pages = 10;
    protected $queryString = ['search', 'active', 'sortAsc'];

    public $titleId;
    public $Id;
    public $type;
    public $title;
    public $titles;
    public $active = 1;
    public $fetchbyid;

    public function render(Title $titles)
    {
        // $this->titles = Title::all();
        $this->titles = Title::all();
        $id = Title::select('id')->get();
        $modelId = $this->fetchbyid($titles, $id);
        Session::put('modelId', $modelId);
        return view('livewire.edit-title')->with('Title', $titles, 'id', 'modelId');
    }

    public function rules()
    {
        return [
            'type' => 'required',
            'title' => 'required',
            'active' => 'required',
        ];
    }

    public function mount(Title $titles)
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

    public function fetchbyid(Title $title, $id) {
        $this->titleId = Title::orderby('id','asc')
            ->select('*')
            ->where('id', $this->Id)
            ->get();

        $titleId = $this->titleId;
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

    // public function render(Title $title, Request $request)
    // {
    //     $titleId = $this->titleId;
    //     $titleId = Title::orderby('id','asc')
    //         ->select('*')
    //         ->where('id', $titleId)
    //         ->get();

    //     $titles = Title::findOrFail($titleId);
    //     // $post = Post::findOrFail($id);
    //     // $this->id = $id;
    //     $this->title = $titles->title;
    //     $this->type = $titles->type;

    //     return view('livewire.edit-title', compact('titles', 'id', 'title', 'type'));
    // }
}
