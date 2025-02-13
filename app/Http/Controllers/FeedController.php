<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class FeedController extends Controller
{
    public function index()
    {
        $feeds=Feed::paginate(5);
        return view('pages.feed.index',compact('feeds'));
    }

    public function create()
    {

        return view('pages.feed.create');
    }

    public function update(Request $request,Feed $feed)
    {
        $validated_request=$request->validate([
            'title' =>'required | string | max:100',
            'description' =>'required | string | max:300',
        ]);
        $feed->update($validated_request);
        return redirect()->route('feeds');

        // $feed->update($this->validateRequest($request));
        // return redirect()->route('feeds')->with('success','Feed updated successfully');
    }

    public function store(Request $request)
    {
        $validated_request=$request->validate([
            'title' =>'required | string | max:100 | min:3',
            'description' =>'required | string | max:300',
        ]);

        $user = Auth::user();
        $validated_request['user_id'] = $user->id;

        Feed::create($validated_request);
       // return redirect()->route('feeds');
        return redirect()->route('feeds')->with('success','Feed created successfully');
        // $feed->update($this->validateRequest($request));
        // return redirect()->route('feeds')->with('success','Feed created successfully');
    }


    public function show( Feed $feed)
    {

        Gate::authorize('update',$feed);

        return view('pages.feed.show',compact('feed'));
    }


}
