<?php

namespace App\Http\Livewire;

use App\Models\User;
use App\Models\Order;
use Livewire\Component;
use Illuminate\Support\Arr;
use Livewire\WithPagination;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Facades\Auth;
use App\Http\Livewire\ShowConfirmation;
use Illuminate\Support\Facades\Session;
use Gloudemans\Shoppingcart\Facades\Cart;

class Orders extends Component
{
	use WithPagination;

	public $search;
	// public $searchResults = [];
	public $sortField;
	public $sortAsc = false;
	protected $queryString = ['search', 'sortAsc', 'sortField'];
	public $pages = 10;
	public $confirmation;
	public $orderId;
	public $created_at;
	public $cart;
	public $arrayPosition;
	public $rowId;
	public $arrayCount;
	public $detail;
	public $orderArray;
	public $pos;
	public $arrayPos;
	// public $user;
	// public $facilityDataRows;
	// public $orders;

	public function mount(Order $order)
	{
		// $order = Order::orderBy('created_at', 'asc')->get();
		// Order::select('name')->orderBy('created_at', 'desc')->get();
	}

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

	public function submit($orderId)
	{
		$order = Order::find($orderId);
		$confirmation = $order->confirmation;
		$confirmation = Session::put('confirmation', $confirmation);
		$created_at = $order->created_at;
		$created_at = Session::put('created_at', $created_at);
		$name = $order->name;
		$name = Session::put('name', $name);
		$username = $order->user->username;
		$username = Session::put('username', $username);
		$contact_s = $order->contact_s;
		$contact_s = Session::put('contact_s', $contact_s);
		$address_s = $order->address_s;
		$address_s = Session::put('address_s', $address_s);

		$theCart = new HtmlString($order->cart);
		$theCart = Session::put('theCart', $theCart);

		$cart = $this->cart;
		$cart = \Gloudemans\Shoppingcart\Facades\Cart::content()->count();

		// dd(unserialize($order->order_array));

		$this->orderArray = unserialize($order->order_array);
		// dd($order_array[count($order_array)-1]['order_type_o']);
		// dd(count($this->orderArray));
		// dd(unserialize($order->order_array));
		// return view('get-confirmation', compact('created_at', 'confirmation'));
		return redirect()->to('show-confirmation', compact('created_at'));
		// return action([ShowConfirmation::class], 'showConfirmation', ['order' => $order]);
		// dd($this->orderArray);
	}

	public function render(Order $order, User $user)
	{
		// $order = Order::select('order_array')->get();
		// $orderArray = unserialize($order);
		// $name_o = Arr::get(unserialize($order), '0.name_o');


		// $user = User::all();
		// $this->user = User::select('id');
		// $order = Order::all();
		$search = $this->search;
		// $orders = Order::where('user_id', Auth::user()->id);
		// $orders = Order::select('*')->where('user_id', Auth::user()->id)->get();
		// $orders = Order::get();
				$order = Order::orderBy('created_at', 'asc')->get();

		if (Auth::user()->admin !== 1) {
			return view(
				'livewire.orders',
				[
					'orders' => Order::where(function ($query) {
						$query->where('created_at', 'like', '%' . $this->search . '%')
							->orWhere('name', 'like', '%' . $this->search . '%')
							->orWhere('order_array', 'like', '%' . $this->search . '%')
							->orWhere('confirmation', 'like', '%' . $this->search . '%')
							->orWhereHas('user', function ($query) {
								$query->where('loc_num', 'like', '%' . $this->search . '%');
							});
					})->where('user_id', Auth::user()->id)
						->when($this->sortField, function ($query) {
							$query->orderBy($this->sortField, $this->sortAsc ? 'desc' : 'asc');
						})
						->paginate($this->pages)
				],
				compact('order', 'user')
			);
		} else {
			return view(
				'livewire.orders',
				[
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
							$query->orderBy($this->sortField, $this->sortAsc ? 'desc' : 'asc');
						})->orderBy('updated_at', 'desc')
						->paginate($this->pages)
				],
				compact('order', 'user')
			);
		}
	}

	public function paginationView()
	{
		return 'livewire.custom-pagination-links-view';
	}
}
