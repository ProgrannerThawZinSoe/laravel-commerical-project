<?php

namespace App\Http\Controllers;

use App\Contributor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class ContributorController extends Controller
{
    public function index(){
        $contributor = Contributor::latest()->get();
        return view('contributor.index',[
           'contributors' => $contributor,
        ]);
    }

    public function create(){
        return view('contributor.create');
    }

    public function store(Request $request){
        $validator = validator(request()->all(),[
            'name' => ['required', 'string', 'min:3','unique:contributors'],
            'phone' => ['required', 'string', 'min:7','unique:contributors'],
            'password' => ['required', 'string', 'min:8'],
            'address' => ['required'],
        ]);

        if($validator->fails()){
            return back()->with('toast', ['icon' => 'error', 'title' => ' contributor is failed Check again.']);
        }

        $contributor = new Contributor();
        $contributor->name = $request->name;
        $contributor->password = Hash::make($request->password);
        $contributor->phone = $request->phone;
        $contributor->address = $request->address;
        $contributor->role = "Contributor";
        $contributor->save();

        return redirect('/dashboard/contributor')->with('toast', ['icon' => 'success', 'title' => 'New contributor is created.']);
    }

    public function edit($id){
        echo $id;
    }

    public function destory($id){
        echo $id;
    }
}
