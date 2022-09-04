<?php

namespace App\View\Components;

use Illuminate\View\Component;

class dashboardLayout extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        $sidebar = [
            'Dashboard' => ['/dashboard','heroicon-s-home'],
            'Users' => ['/dashboard/users','heroicon-s-user'],
            'Transactions' => ['/dashboard/transactions','heroicon-s-shopping-bag'],
            'Nurses' => ['/dashboard/nurses','heroicon-s-user-group']
        ];
        return view('components.dashboard-layout',compact('sidebar'));
    }
}