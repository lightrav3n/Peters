<?php

namespace App\Http\Livewire;

use App\Models\AsociatedProduct;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class ProductConfigurator extends Component
{
    public $product;
    public $related = null;
    public $relatedId;

    protected $queryString = ['relatedId'];

    public function mount(){

    }

    public function render()
    {
//        dd($this->product);
        $config = Session::get('config');
        $notInKeys = [];
        foreach ($config->items as $key=>$value){
            $notInKeys[] = $key;
        }
        $query = AsociatedProduct::query()
            ->where('product_id', $this->product->id)
            ->with('relatedTo')
            ->whereNotIn('related_id',$notInKeys);

//        $query->when($this->relatedId, function ($q){
//            return $q->where('related_id', $this->relatedId);
//        });

        $this->related = $query->get();

        return view('livewire.product-configurator');
    }

    public function selectId($id){
        $this->relatedId = $id;
    }
}
