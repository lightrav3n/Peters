<?php

namespace App\Http\Livewire;

use App\Models\News;
use App\Models\NewsCategories;
use Livewire\Component;

class NewsList extends Component
{
    public $perPage;
    public $search = '';
    public $category;

    protected $queryString = ['search', 'category'];

    public function mount(){
        $this->perPage = 6;
    }
    public function render()
    {
        $query = News::query()->with('category')->where('visibility', '1')->where('language', session()->get('language'));

        $query->when($this->category, function ($q){
            return $q->where('category_id', $this->category);
        });

        $news = $query->NewsSearch('description', $this->search)->orderBy('publish_date', 'desc')->paginate($this->perPage);

        $categories = NewsCategories::query()->orderBy('order', 'asc')->get();

        return view('livewire.news-list', compact('news', 'categories'));
    }

    public function loadMore(){
        $this->perPage += 6;
    }
    public function category($id){
        $this->category = $id;
    }
    public function search($term){
        $this->search = $term;
    }
}
