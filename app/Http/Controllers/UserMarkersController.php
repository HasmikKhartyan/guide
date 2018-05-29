<?php

namespace App\Http\Controllers;

use App\UserMarker;
use Illuminate\Http\Request;
use App\User;
use App\Marker;
use Illuminate\Support\Facades\DB;

class UserMarkersController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    public function index(User $user)
    {
        $userMarkers = User::find($user->id)->markers;
        return $userMarkers;
    }
    public function store(Request $request,User $user)
    {
        return DB::transaction(function() use($request,$user) {
            $validator = \Validator::make($request->all(),
                [
                'name' => 'unique:markers',
                ]);
            if ($validator->fails()) {
                $marker = DB::table('markers')->where('name', '=', $request->input('name'))->first();
//                return response()->json(['errors'=>$validator->errors()], 400);
            }else {
                $marker = Marker::create($request->all());
            }
            $userMarker = ['user_id'=>$user->id,'marker_id'=>$marker->id,'visited'=>0];
            UserMarker::create($userMarker);
            return response()->json($marker, 201);
        });
    }

    public function delete(Marker $marker)
    {
        Marker::find($marker->id)->delete();

        return response()->json(null, 204);
    }
    public function unvisit(Request $request,User $user,Marker $marker){
        DB::table('user_markers')->where('user_id', $user->id)
            ->where('marker_id', $marker->id)->update($request->all());
        return response()->json(null, 204);
    }
}
