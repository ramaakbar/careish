<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;

class Cities extends Controller
{
    public function getCities(Request $request,$provinces_id=null): Collection
    {
        if($provinces_id == null){
            return City::query()
            ->select('id', 'name')
            ->orderBy('id')
            ->when(
                $request->search,
                fn ($query) => $query
                    ->where('name', 'like', "%{$request->search}%")
            )
            ->when(
                $request->exists('selected'),
                fn ($query) => $query->whereIn('id', $request->input('selected', [])),
            )
            ->get();
        } else {
            return City::query()
            ->select('id', 'name')
            ->orderBy('id')
            ->where('province_id',$provinces_id)
            ->when(
                $request->search,
                fn ($query) => $query
                    ->where('name', 'like', "%{$request->search}%")
            )
            ->when(
                $request->exists('selected'),
                fn ($query) => $query->whereIn('id', $request->input('selected', [])),
            )
            ->get();
        }
        
    }
}
