<?php

namespace App\Traits;

trait WithSorting {
  public $perPage = 10;
  public $search = '';
  public $sort = 'id';
  public $sortOrder = 'asc';

  protected $queryStringWithSorting = [
    'search' => ['except' => ''],
    'perPage',
    'sort',
    'sortOrder',
  ];

  public function SetClicked($head) {
    if ($head == $this->sort) {
      $this->sortOrder == 'asc' ? ($this->sortOrder = 'desc') : ($this->sortOrder = 'asc');
    } else {
      $this->sortOrder = 'asc';
    }
    $this->sort = $head;
  }

  public function updatingSearch() {
    $this->resetPage();
  }
}
