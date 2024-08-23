<?php

namespace App\Http\Controllers;

use App\Models\Space;
use Illuminate\Http\Request;

class SpaceController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $this->authorize('viewAny', Space::class);
        $spaces = Space::query();
        $spaces->when(request('search'), function ($query){
            $query->where(function($query){
                $query->where('address', 'like', '%'.request('search'). '%' )->orWhere
                ('city', 'like', '%'.request('search'). '%')->orWhere('postcode', 'like', '%'.request('search').'%');
            });
        })->when(request('category'), function($query){
            $query->where('category', request('category'));
        })->when(request('ev'), function($query){
            $query->where('ev', request('ev'));
        });

        

        return view('space.index', ['spaces' => $spaces->withAvg('reviews', 'rating')->withCount('reviews')->paginate(50)]);
    }

    
    public function show(string $id)
    {
       
        return view('space.show', ['space' => Space::with('reviews')->withAvg('reviews', 'rating')->withCount('reviews')
    ->findOrFail($id)]);
    }

   
    
}
