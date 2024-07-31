<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TweetController extends Controller
{
    public function index()
    {
        $tweets = \App\Models\Tweet::with('user')->latest()->get();

        return response()->json([
            'status' => 'success',
            'message' => 'Tweets fetched successfully',
            'data' => $tweets,
        ]);
    }


    public function store(Request $request)
    {
        $request->validate([
            'content' => 'required|string|max:255',
        ]);

        $tweet = auth()->user()->tweets()->create([
            'content' => $request->get('content'),
        ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Tweet created successfully',
            'data' => $tweet->load('user'),
        ], 201);
    }

    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
