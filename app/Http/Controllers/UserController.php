<?php

namespace App\Http\Controllers;


use App\Models\GameScore;
use App\Models\User;
use Illuminate\Http\Request;
use App\Traits\ApiResponser;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use App\Services\FileService;
use App\Http\Requests\Users\UpdateRequest;
class UserController extends Controller
{
    use ApiResponser;
    protected $fileService;

    public function __construct(FileService $fileService) {
        $this->fileService = $fileService;
    }

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

        $userId = $user->id;

        $gamescore = GameScore::create(
            [
                'user_id' => $userId,
                'score' => '0'
            ]
        );

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

        $user = DB::table('users')
        ->leftJoin('game_scores', 'users.id', '=', 'game_scores.user_id')
        ->select('game_scores.score', 'users.id', 'users.name', 'users.avatar')
        ->orderBy('game_scores.score', 'desc')
        ->orderBy('game_scores.created_at', 'desc')
        ->get();

        $array = json_decode($user, true);
        usort($array, fn($a, $b) => $a['score'] < $b['score']);
        $data = array_intersect_key($array, array_unique(array_column($array, 'id')));
       
        return _success($data, __('message.show_success'), HTTP_SUCCESS);
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
    public function update(UpdateRequest $request, $id)
    {
        //
        $user = User::find($id);

        if (isset($request->avatar)) {
            $file = $request->avatar;
            $filePath = 'public/user/' . $user->id . '/avatar';
            $fileUrl =  $this->fileService->uploadFileToS3($file, $filePath);
            $user->avatar =  $fileUrl;
            $user->save();
        } 
        if (isset($request->name)) {
            $user->name = $request->name;
        }

        return _success($user->avatar, __('message.updated_success'), HTTP_CREATED);
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
