<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $member = \App\Member::toplevel()->first();

        $tree = $this->getTree($member);

        return view('home',compact('tree'));
    }

    protected function getTree($member)
    {
        $array = [
            'local_name'=>$member->local_name??'',
            'name'=>$member->name,
            'children'=>$this->getMembers($member->children)
        ];

        if($member->spouse->count()) {
            $array['spouse'] = $member->spouse->pluck('name')->implode(', ');
            $array['spouse_local_name'] = $member->spouse->pluck('local_name')->implode(', ');
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
}