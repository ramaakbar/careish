<?php

namespace App\View\Components;

use Illuminate\View\Component;

class UserLayout extends Component {
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct() {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render() {
        $sidebar = [
            'Transaction List' => ['/user/transaction-list', 'heroicon-o-shopping-bag'],
            'Profile Setting' => ['/user/profile-setting', 'heroicon-o-user'],
            'Favorites' => ['/user/favorites', 'heroicon-o-bookmark'],
            'Reviews' => ['/user/reviews', 'heroicon-o-star']
        ];
        return view('components.user-layout', compact('sidebar'));
    }
}
