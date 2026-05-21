<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\User;
use App\Models\Event;

class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = Comment::with(['user', 'event'])->get();
        $users = User::all();
        $events = Event::all();
        return view('comments.index', compact('comments', 'users', 'events'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    /*public function store(Request $request)
    {
        $comment = new Comment();
        $comment->user_id = $request->user_id;
        $comment->event_id = $request->event_id;
        $comment->comment = $request->comment;
        $comment->save();
        return view('events.byCategory', compact('events', 'category'));
    }*/

    public function store(Request $request)
    {
        $request->validate([
            'comment' => 'required|string|max:500',
            'event_id' => 'required|exists:events,id',
            'user_id' => 'required|exists:users,id'
        ]);

        Comment::create([
            'comment' => $request->comment,
            'event_id' => $request->event_id,
            'user_id' => $request->user_id,
        ]);

        return back()->with('success', 'Comentario publicado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $comment = Comment::find($id);
        $user = User::find($comment->user_id);
        $event = Event::find($comment->event_id);

        return view('comments.edit', compact('comment', 'user', 'event'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $comment = Comment::find($id);
        $comment->comment = $request->comment;
        $comment->save();
        return redirect()->route('comments.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $comment = Comment::find($id);
        $comment->delete();
        return redirect()->route('comments.index');
    }
}
