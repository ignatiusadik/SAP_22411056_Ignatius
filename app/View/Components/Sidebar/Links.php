<?php

namespace App\View\Components\Sidebar;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;
use Illuminate\Support\Str;

class Links extends Component
{
    public string $title, $route, $icon, $active;

    public function __construct($title, $route, $icon)
    {
        $this->title = $title;
        $this->route = $route;
        $this->icon = $icon;

        $basePath = $this->generatePath($route);
        $this->active = request()->routeIs($basePath) ? 'active bg-primary text-white' : '';
    }

    public function generatePath($route)
    {
        if (Str::contains($route, '.')) {
            return Str::beforeLast($route, '.') . '.*';
        }

        return $route;
    }

    public function render(): View|Closure|string
    {
        return view('components.sidebar.links');
    }
}
