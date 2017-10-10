<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\User;
use App\Province;
use DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

   public function index()
   {
       $province = Province::pluck('province_name', 'id');
       $selectedProvince = User::first()->province_id;

       return view('add_info', compact('province', 'selectedProvince'));
   }

   public function index1()
   {
       $user = User::orderBy('id', 'desc')->paginate(10);
       $province = DB::table('provinces')
                  ->join('users', 'users.province_id' , '=', 'provinces.id')
                  ->select('provinces.province_name')
                  ->get();

       return view('list')->withUser($user)->withProvince($province);
   }

   public function store(Request $request)
    {

       $province = Province::pluck('province_name', 'id');
       $selectedProvince = User::first()->province_id;

      $user = new User();
      $user->name = $request->name;
      $user->province_id = $selectedProvince;
      $user->telephone = $request->telephone;
      $user->postalcode = $request->postalcode;
      $user->salary = $request->salary;
      $user->save();
      return view('store');
      //return redirect()->route('show', $user->id);
     }


   public function show($id)

    {
              $user = User::findOrFail($id);
              $province = DB::table('provinces')
                  ->where('$id'. '='. '$user->id' )
                  ->join('users', 'users.province_id' , '=', 'provinces.id')
                  ->select('provinces.province_name')
                  ->get();
      return view("show")->withUser($user)->withProvince($province);
    }


   public function edit($id)
    {
      $user = User::where('id', $id)->first();
      $province = Province::pluck('province_name', 'id');
      $selectedProvince = User::first()->province_id;
      return view("edit" , compact('province', 'selectedProvince'))->withUser($user);
    }


    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'name' => 'bail|required|min:2',
        'province' => 'required',
     'telephone' => 'required|regex:/^\(?([0-9]{3})\)?[-. ]?([0-9]{3})[-. ]?([0-9]{4})$/',
        'postalcode' => 'required|regex:/^[ABCEGHJKLMNPRSTVXY]\d[A-Z] *\d[A-Z]\d$/',
        'salary' => 'required|regex:/^\d{1,2}(?:,?\d{0,3}(?:\.(?:\d{1-2})?)?)?$/',

      ]);

      $user = User::findOrFail($id);
      $user->name = $request->name;
      $user->province = $request->province;
      $user->telephone = $request->telephone;
      $user->postalcode = $request->postalcode;
      $user->salary = $request->salary;
      $user->save();
      //return redirect()->route('show/{id}', $id);


    }

}
