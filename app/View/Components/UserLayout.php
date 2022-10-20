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
            'Transaction List' => ['/user/transaction-list', 'heroicon-o-shopping-bag', 'user/transaction-list'],
            'Profile Setting' => ['/user/profile-setting', 'heroicon-o-user', 'user/profile-setting'],
            'Favorites' => ['/user/favorites', 'heroicon-o-bookmark', 'user/favorites'],
            'Reviews' => ['/user/reviews', 'heroicon-o-star', 'user/reviews']
        ];
        return view('components.user-layout', compact('sidebar'));
    }
}
