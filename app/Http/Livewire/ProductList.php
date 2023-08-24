<?php

namespace App\Http\Livewire;

use App\Models\Product;
use App\Models\ProductCategories;
use Livewire\Component;

class ProductList extends Component
{
    public $perPage;
    public $search = '';
    public $slugId;

    public function mount($slugId){
        $this->perPage = 6;
        $this->slugId = $slugId;
    }

    public function render()
    {
        $query = Product::query()->where('visibility', '1')->where('category_id', $this->slugId)
            ->with(['category', 'descriptions']);

        $products = $query->ProductSearch('product_name', $this->search)->paginate($this->perPage);

        return view('livewire.product-list', compact('products'));
    }

    public function loadMore(){
        $this->perPage += 6;
    }

    public function search($term){
        $this->search = $term;
    }
}
