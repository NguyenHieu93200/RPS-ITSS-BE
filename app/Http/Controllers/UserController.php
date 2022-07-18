<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class UserController extends Controller
{
    use ApiResponser;

    public function register(Request $request): \Illuminate\Http\JsonResponse
    {
        $attr = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email:rfc,dns|unique:users,email',
            'password' => 'required|string|min:6|confirmed'
        ]);

        $user = User::create([
            'name' => $attr['name'],
            'password' => bcrypt($attr['password']),
            'email' => $attr['email'],
            'email_verified_at' => Carbon::now(),
            'role' => 2
        ]);

        return $this->success([
            'token' => $user->createToken('auth_token')->plainTextToken
        ], 'Account successfully created');
    }

    public function login(Request $request): \Illuminate\Http\JsonResponse
    {
        $attr = $request->validate([
            'email' => 'required|string|email|',
            'password' => 'required|string|min:6'
        ]);

        if (!Auth::attempt($attr)) {
            return $this->error('Credentials not match', 401);
        }

        $user = User::where('email', $request['email'])->first();
        $token = $user->createToken('auth_token')->plainTextToken;

        return $this->success([
            'token' => $token,
            'user_id' => $user->id,
            'role' => $user->role,
        ], 'Logged in successfully');
    }

    public function logout(): \Illuminate\Http\JsonResponse
    {
        Auth::user()->tokens()->delete();

        return $this->success([], "Tokens Revoked");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //admin view
        $users = DB::table('users')->select('users.id', 'users.name', 'users.email', 'users.avatar', 'game_scores.score')
                    ->join('game_scores', 'users.id', '=', 'game_scores.user_id')
                    ->get();
        return response()->json(['data' => $users]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id=null)
    {
        //profile
        return $id?User::find($id):User::all();
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
        //
        $user = User::find($id);

        $fields = $request->validate([
            'name' => 'required|string',
            'avatar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $user->name = $fields[name];
        $user->avatar = $fields[avatar];
        $result = $user->save();

        return response()->json([
            'code' => 203,
            'message' => "Update successfully",
            'data' => $user
        ], status: 203);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $result = $user->delete();

        return response()->json([
            'code' => 204,
            'message' => "Data has been deleted"
        ], status: 204);
    }

}
