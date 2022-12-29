<?php

namespace App\View\Components;

use App\Repositories\SeoMetaRepository;
use Illuminate\Support\Facades\Route;
use Illuminate\View\Component;

class App extends Component
{

    public function render()
    {

        return view('layouts.app');
    }
}
