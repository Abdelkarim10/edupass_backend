<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Course;
use App\Models\Grade;
use App\Models\Role;
use App\Models\User;
use Database\Seeders\Chat;
use Illuminate\Http\Request;
use tidy;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($role_id)
    {
        $users = User::where("role_id", $role_id)->get();

        for ($i = 0; $i < count($users); $i++) {
            $users[$i]['grade'] = $users[$i]->grade;
            $users[$i]['role'] = $users[$i]->role;
            $users[$i]['chat'] = $users[$i]->chat;
        }

        return view('users.index', [
            "users" => $users,
            "roles" => Role::all(),
            "assistant"=> $role_id == 1,
            "nationalities" => Country::all()

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function assistantCreate()
    {

        return view('users.create', [
            "grades" => Grade::all(),
            "roles" => Role::all(),
            "role_id" => 1,
            "nationalities" => Country::all()
        ]);
    }

    public function studentCreate()
    {

        return view('users.create', [

            "grades" => Grade::all(),
            "roles" => Role::all(),
            "role_id" => 2,
            "nationalities" => Country::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if($request->country_id == 'null'){
            $request->country_id = null;
        }
        if($request->governorate_id == 'null'){
            $request->governorate_id = null;
        }
        if($request->district_id == 'null'){
            $request->district_id = null;
        }
        if($request->city_id == 'null'){
            $request->city_id = null;
        }
        if($request->nationality_id == 'null'){
            $request->nationality_id = null;
        }




        $requestData = $request->all();

        $user =  User::create($requestData);

        if ($request->hasFile('profile_pic')) {

            //////

            $image = $request->file('profile_pic');


            $imageName = time() . $user->full_name .  '.' . $image->extension();


            $destinationPath = public_path('/assets/profile_pics/');


            $image->move($destinationPath, $imageName);

            //////

            // $file = $request->file('profile_pic');
            // $file_name = time() . $file->getClientOriginalName();
            // $destinationPath = public_path('/assets/profile_pics');
            // $file->move($destinationPath, $file_name);

            $user->update([
                "profile_pic" => $imageName
            ]);
        }

        if ($user->role_id == 1) {

            $courses = [];

            foreach ($request->input("courses") as $key => $course) {

                array_push($courses, $key);
            }
            $user->courses()->sync($courses);
        }



        return redirect('all-users/' . $user->role_id)->with('flash_message', 'User Added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', [
            'user' => $user,
        ]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        return view('users.edit', [
            'user' => $user,
            'grades' => Grade::all(),
            'roles' => Role::all(),
            "nationalities" => Country::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        // dd($request->input("courses"));

        $user = User::find($id);

        $input = $request->all();

        $user->update($input);

        if ($request->hasFile('profile_pic')) {

            //////

            $image = $request->file('profile_pic');


            $imageName = time() . $user->full_name .  '.' . $image->extension();


            $destinationPath = public_path('/assets/profile_pics/');


            $image->move($destinationPath, $imageName);

            //////

            // $file = $request->file('profile_pic');
            // $file_name = time() . $file->getClientOriginalName();
            // $destinationPath = public_path('/assets/profile_pics');
            // $file->move($destinationPath, $file_name);

            $user->update([
                "profile_pic" => $imageName
            ]);
        }



        if ($user->role_id == 1) {

            $courses = [];

            foreach ($request->input("courses") as $key => $course) {

                array_push($courses, $key);
            }
            $user->courses()->sync($courses);
        }



        return redirect('all-users/' . $user->role_id)->with('flash_message', 'User Updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);
        return redirect('users')->with('flash_message', 'User deleted!');
    }
}
