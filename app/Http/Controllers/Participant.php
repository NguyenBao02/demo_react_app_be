<?php

namespace App\Http\Controllers;

use App\Http\Requests\PariticipantPostRequest;
use App\Models\Participant as ModelsParticipant;
use Illuminate\Http\Request;

class Participant extends Controller
{
    public function store(PariticipantPostRequest $request)
    {
        ModelsParticipant::create([
            "email"         => $request->email,
            "password"      => bcrypt($request->password),
            "username"      => $request->username,
            "role"          => $request->role,
            "image"         => $request->image
        ]);

        return response()->json([
            "status"    => 1,
            "message"   => "Tạo mới thành công"
        ]);
    }
}
