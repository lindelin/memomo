<?php

namespace App\Http\Controllers;

use App\Memo;
use Illuminate\Http\Request;

class MemoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $memos = request()->user()->memos()->latest('updated_at')->paginate(10);

        return view('templates.memos.index')->with(compact('memos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('templates.memos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|string|max:30',
            'contents' => 'required|string',
        ]);

        $memo = new Memo();
        $memo->title = $request->input('title');
        $memo->contents = $request->input('contents');
        $memo->user_id = $request->user()->id;
        $memo->save();

        return redirect()->route('home')->with('status', 'Create memo successfully!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Memo $memo
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Auth\Access\AuthorizationException
     */
    public function show(Memo $memo)
    {
        $this->authorize('canAccess', [$memo]);
        return view('templates.memos.show')->with(compact('memo'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Memo  $memo
     * @return \Illuminate\Http\Response
     */
    public function edit(Memo $memo)
    {
        return view('templates.memos.edit')->with(compact('memo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \App\Memo $memo
     * @return \Illuminate\Http\Response
     * @throws \Illuminate\Validation\ValidationException
     */
    public function update(Request $request, Memo $memo)
    {
        $this->validate($request, [
            'title' => 'required|string|max:30',
            'contents' => 'required|string',
        ]);

        $memo->title = $request->input('title');
        $memo->contents = $request->input('contents');
        $memo->update();

        return redirect()->route('memos.show', compact('memo'))->with('status', 'Update memo successfully!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Memo $memo
     * @return \Illuminate\Http\Response
     * @throws \Exception
     */
    public function destroy(Memo $memo)
    {
        $memo->delete();

        return redirect()->route('home')->with('status', 'Delete memo successfully!');
    }
}
