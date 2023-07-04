<?php

namespace App\View\Components;

use Closure;
use App\Models\Category;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class CategoryDropdown extends Component
{
    public function render(): View|Closure|string
    {
        return view('components.category-dropdown',[
            'currentCategory' => Category::where('name',request('category'))->first(),
            'categories' => Category::distinct()->get()
        ]);
    }
}
