<?php

namespace App\Http\Controllers;

use File;
use Storage;
use App\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('member.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
        return redirect()->route('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\People  $people
     * @return \Illuminate\Http\Response
     */
    public function show(Member $member)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\People  $people
     * @return \Illuminate\Http\Response
     */
    public function edit(Member $member)
    {
        // dd($member);
        // $member = \App\Member::toplevel()->first();

        // $tree = $this->getTree($member);

        return view('member.edit',compact('member'));
    }

    protected function getTree($member)
    {
        $array = [
            'id'=>$member->id,
            'name'=>$member->name,
            'children'=>$this->getMembers($member->children)
        ];

        if($member->spouse->count()) {
            $array['spouse'] = $member->spouse->pluck('name')->implode(', ');
        }

        return $array;
    }

    protected function getMembers($members)
    {
        $array = [];
        foreach ($members as $key => $member) {
            array_push($array, $this->getTree($member));
        }

        return $array;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\People  $people
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Member $member)
    {
        $member->fill($request->all());
        $member->save();

        if($request->relation_spouse) {
            $relation_spouse = collect($request->relation_spouse)->mapWithKeys(function ($row) {
                return [$row => ['spouse'=>1]];
            });
            $member->spouse()->sync($relation_spouse);
        } else {
            $member->spouse()->detach();
        }

        if($request->relation_children) {
            $relation_children = collect($request->relation_children)->mapWithKeys(function ($row) {
                return [$row => ['spouse'=>0]];
            });
            $member->children()->sync($relation_children);
        } else {
            $member->children()->detach();
        }
        
        if($request->file) {
            $filename = snake_case($member->name, $delimiter = '_').".".$request->file->getClientOriginalExtension();
            Storage::put('public/'.$filename,File::get($request->file));    
            $member->file = 'storage/'.$filename;
            $member->save();
        }
        

        flash()->success('Success!');
        return redirect()->route('member.edit',$member->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\People  $people
     * @return \Illuminate\Http\Response
     */
    public function destroy(Member $member)
    {
        //
    }
}
