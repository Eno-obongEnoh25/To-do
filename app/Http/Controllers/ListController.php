<?php

namespace App\Http\Controllers;


use App\Models\User;
use App\Models\Newlist;
use Illuminate\Http\Request;

class ListController extends Controller
{

     public function __construct()
    {
        $this->middleware(['auth']);
    }


        // Return view: Dashboard(list)
    public function show()
    {
       $newlist = Newlist::where('user_id', auth()->id())->paginate(5);
        return view('list', [
        'newlist' => $newlist
        ]);
    }


        // Create Dashboard
    public function created(Request $request)
    {
        $this->validate($request, [
            'task' => 'required',
            'description' => 'required|max:300',
            'due' => 'required'
        ]);


        // Store dashboard data in database
        $newlist = Newlist::create([
           'task' => $request->task,
           'description' => $request->description,
           'due' => $request->due,
           'user_id' => $request->user()->id
        ]);


       return back()->with('success', 'Succesful');
    }


        // Edit dashboard data
    public function edit(Newlist $newlist)
    {
        return view('update', [
             'newlist' => $newlist
        ]);
    }

        // Update Dashoard data
    public function update(Request $request, Newlist $newlist)
    {
        $this->validate($request, [

        'task' => 'required',
        'description' => 'required|max:300',
        'due' => 'required'

        ]);

        $newlist->task = $request->task;
        $newlist->description = $request->description;
        $newlist->due = $request->due;
        $newlist->save();

        return redirect()->route('list');

    }


        // Delete Dashboard data
    public function destroy(Newlist $newlist)
    {
        $newlist->delete();
        return back();
    }
}
