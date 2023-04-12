<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Order;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class OrdersTest2 extends Component
{
    use WithPagination;

    public $search;
    // public $searchResults = [];
    public $sortField;
    public $sortAsc = true;
    protected $queryString = ['search', 'sortAsc', 'sortField'];
    public $pages = 10;

    public function updatedPages()
    {
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

    public function render(Order $order, User $user)
    {
        $user = User::all();
        $order = Order::all();
        $search = $this->search;
        return view('livewire.orders-test2', [
            // 'orders' => Order::where('created_at', '>=', date('Y-m-d').' 00:00:00')
            // ->orWhere('created_at', '>=', date('Y-m-d') . ' 00:00:00')
            'orders' => Order::where(function ($query) {
                $query->where('created_at', 'like', '%' . $this->search . '%')
                    ->orWhere('name', 'like', '%' . $this->search . '%')
                    ->orWhere('order_array', 'like', '%' . $this->search . '%')
                    ->orWhere('confirmation', 'like', '%' . $this->search . '%')
                    ->orWhereHas('user', function ($query) {
                        $query->where('loc_num', 'like', '%' . $this->search . '%');
                        });
                })
                ->when($this->sortField, function ($query) {
                    $query->orderBy($this->sortField, $this->sortAsc ? 'asc' : 'desc');
                })
                ->paginate($this->pages)
        ], compact('order', 'user'));

    }

    public function paginationView()
    {
        return 'livewire.custom-pagination-links-view';
    }
}