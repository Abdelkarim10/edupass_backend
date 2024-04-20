<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function register(Request $request)
    {

        $fields = $request->validate([
            'full_name' => ['required', 'string', 'max:255'],
            'email' => [
                'required',
                'string',
                'email',
                'max:255',
                'unique:users,email',
            ],
            'phone_number' => [
                'required',
                'string',
                'max:255',
                'unique:users,phone_number',
            ],
            'password' => ['required', 'string', 'max:255'],
            'grade_id' => ['required', 'integer','exists:grades,id'],
            'role_id' => ['required', 'integer','exists:roles,id'],
            'date_of_birth' => ['required', 'string', 'max:255'],
            'school' => ['required', 'string', 'max:255'],
            'nationality_id' => ['required', 'integer','exists:countries,id'],
            'country_id' => ['required', 'integer','exists:countries,id'],
            'governorate_id' => ['required', 'integer','exists:governorates,id'],
            'district_id' => ['required', 'integer','exists:districts,id'],
            'city_id' => ['required', 'integer','exists:cities,id'],

        ]);


        $user = User::create([
            'full_name' => $fields['full_name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
            'phone_number' => $fields['phone_number'],
            'date_of_birth' => $fields['date_of_birth'],
            'country_id' => $fields['country_id'],
            'governorate_id' => $fields['governorate_id'],
            'district_id' => $fields['district_id'],
            'city_id' => $fields['city_id'],
            'grade_id' => $fields['grade_id'],
            'school' => $fields['school'],
            'nationality_id' => $fields['nationality_id'],
            'role_id' => 2
        ]);

        if ($request->hasFile('profile_pic')) {

            //////
            ///



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

        $token = $user->createToken('myapptoken')->plainTextToken;

        if($user->profile_pic != null){
            $user['profile_pic'] = env('url') . "/public/assets/profile_pics/" . $user->profile_pic;
        }

        $respone = [
            'user' => $user,
            'token' => $token
        ];

        return response($respone, 201);
    }

    public function updateUserProfile(Request $request)
    {
        $userprofile = Auth::user();

        $fields = $request->validate([
            'full_name' => 'required|string|max:255|unique:users,full_name,' . $userprofile->id,
            'email' => 'required|string|email|max:255|unique:users,email,' . $userprofile->id,
            'password' => 'required|string|min:8',
            'phone_number' => 'required|string',
            'grade_id' => 'integer',
            'date_of_birth' => ['required', 'string', 'max:255'],
            'school' => 'required|string',
            'nationality_id' => ['required', 'integer','exists:countries,id'],
            'country_id' => ['required', 'integer','exists:countries,id'],
            'governorate_id' => ['required', 'integer','exists:governorates,id'],
            'district_id' => ['required', 'integer','exists:districts,id'],
            'city_id' => ['required', 'integer','exists:cities,id'],

        ]);

        $user = $userprofile->update([
            'full_name' => $fields['full_name'],
            'email' => $fields['email'],
            'password' => bcrypt($fields['password']),
            'phone_number' => $fields['phone_number'],
            'date_of_birth' => $fields['date_of_birth'],
            'grade_id' => $fields['grade_id'],
            'school' => $fields['school'],
            'nationality_id' => $fields['nationality_id'],
            'country_id' => $fields['country_id'],
            'governorate_id' => $fields['governorate_id'],
            'district_id' => $fields['district_id'],
            'city_id' => $fields['city_id'],
        ]);

        $user = Auth::user();

        if($user->profile_pic != null){
            $user['profile_pic'] = env('url') . "/public/assets/profile_pics/" . $user->profile_pic;
        }

        return $user;
    }

    public function userInfo()
    {
        $user = Auth::user();

        if($user->profile_pic != null){
            $user['profile_pic'] = env('url') . "/public/assets/profile_pics/" . $user->profile_pic;
        }

        // user country, governorate, district, city
        $user['country'] = $user->country;
        $user['governorate'] = $user->governorate;
        $user['district'] = $user->district;
        $user['city'] = $user->city;
        $user['grade'] = $user->grade;
        $user['role'] = $user->role;
        $user['nationality'] = $user->nationality;

        return $user;
    }


    public function login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        // print_r($data);
        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'message' => ['These credentials do not match our records.']
            ], 404);
        }

        if($user->profile_pic != null){
            $user['profile_pic'] = env('url') . "/public/assets/profile_pics/" . $user->profile_pic;
        }

        $token = $user->createToken('my-app-token')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function logout(Request $request)
    {

        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged out'
        ];
    }
}
