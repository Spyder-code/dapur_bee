<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class TransactionCreate extends Component
{
    public $is_now, $carts, $search, $search_list, $total, $total_text, $ids, $received, $payout, $payout_text;
    public function mount()
    {
        $this->is_now = true;
        $this->carts = [];
        $this->search = null;
        $this->search_list = [];
        $this->total = 0;
        $this->total_text = 0;
        $this->received = 0;
        $this->payout = 0;
        $this->payout_text = 0;
        $this->ids = null;
    }

    public function render()
    {
        return view('livewire.transaction-create');
    }

    public function searching()
    {
        if(strlen($this->search)>1){
            $this->search_list = Product::where('name','like','%'.$this->search.'%')->get();
        }else{
            $this->search_list = [];
        }

    }

    public function changeIsNow($val)
    {
        if($val==1){
            $this->is_now = true;
        }else{
            $this->is_now = false;
        }
    }

    public function addCart($id)
    {
        $product = Product::find($id);
        $data = array();
        $data['id'] = $product->id;
        $data['image'] = $product->image;
        $data['price'] = $product->price;
        $data['name'] = $product->name;
        $data['jumlah'] = 1;
        $data['total'] = $product->price;

        array_push($this->carts,$data);
        $c = collect($this->carts);
        $this->ids = $c->pluck('id');
        $this->total = $c->sum('total');
        $this->total_text = number_format($this->total);
        $this->search_list = [];
        $this->search = null;
    }

    public function addJumlah($id)
    {
        $this->carts[$id]['jumlah'] += 1;
        $this->carts[$id]['total'] = $this->carts[$id]['jumlah'] * $this->carts[$id]['price'];
        $c = collect($this->carts);
        $this->total = $c->sum('total');
        $this->total_text = number_format($this->total);
    }

    public function subJumlah($id)
    {
        if($this->carts[$id]['jumlah']>1){
            $this->carts[$id]['jumlah'] -= 1;
            $this->carts[$id]['total'] = $this->carts[$id]['jumlah'] * $this->carts[$id]['price'];
            $c = collect($this->carts);
            $this->total = $c->sum('total');
            $this->total_text = number_format($this->total);
        }
    }

    public function deleteCart($id)
    {
        unset($this->carts[$id]);
        $c = collect($this->carts);
        $this->ids = $c->pluck('id');
        $this->total = $c->sum('total');
        $this->total_text = number_format($this->total);
    }

    public function rec()
    {
        $this->payout = (int)$this->received - (int)$this->total;
        $this->payout_text = number_format($this->payout);
    }
}
