<?php

namespace App\Http\Controllers;

use App\Http\Requests\PariticipantPostRequest;
use App\Http\Requests\ParticipantUpdateRequest;
use App\Models\Participant as ModelsParticipant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class Participant extends Controller
{
    public function store(PariticipantPostRequest $request)
    {
        try {
            $file = $request->image;
            $fileName = time() . "." . $file->getClientOriginalExtension();

            $file->move(public_path("images"), $fileName);

            ModelsParticipant::create([
                "email"         => $request->email,
                "password"      => bcrypt($request->password),
                "username"      => $request->username,
                "role"          => $request->role,
                "image"         => $fileName
            ]);

            return response()->json([
                "status"    => 1,
                "message"   => "Tạo mới thành công"
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "status"    => 0,
                "message"   => "Lỗi rồiiiiiii"
            ]);
        }
    }

    public function getAll()
    {
        $data = ModelsParticipant::orderBy("id", "desc")->get();

        if ($data) {
            return response()->json([
                "status"    => 1,
                "data"      => $data,
            ]);
        } else {
            return response()->json([
                "status"    => 0,
                "message"   => "Lấy dữ liệu không thành công"
            ]);
        }
    }

    public function update(ParticipantUpdateRequest $request)
    {
        try {
            $user = ModelsParticipant::where("id", $request->id)->first();

            $image_path = public_path("images\\") . $user->image;
            $file = $request->image;
            $fileName = time() . "." . $file->getClientOriginalExtension();

            $file->move(public_path("images"), $fileName);

            File::delete($image_path);

            $user->update([
                "username"      => $request->username,
                "role"          => $request->role,
                "image"         => $fileName
            ]);

            $user->save();

            return response()->json([
                "status"    => 1,
                "message"   => "Cập nhật thành công"
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "status"    => 0,
                "message"   => "Lỗi rồiiiiiii"
            ]);
        }
    }

    public function destroy(Request $request)
    {
        try {
            $user = ModelsParticipant::where("id", $request->id)->first();

            $image_path = public_path("images\\") . $user->image;
            File::delete($image_path);

            $user->delete();

            return response()->json([
                "status"    => 1,
                "message"   => "Xóa thành công"
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "status"    => 0,
                "message"   => "Lỗi rồiiiiiii"
            ]);
        }
    }

    public function paginate($pageNumber, $limitPage)
    {
        try {
            //get all user in participants table and orderBy id desc
            $participants = ModelsParticipant::orderBy("id", "desc")->get();

            $totalRows = $participants->count();
            $totalPage = $totalRows / $limitPage;

            is_int($totalPage) ? $totalPage = $totalPage : $totalPage = intval($totalPage + 1);

            $userInPage = ModelsParticipant::orderBy("id", "desc")
                ->offset($limitPage * ($pageNumber - 1))
                ->limit($limitPage)
                ->get();

            return response()->json([
                "totalRows"    => $totalRows,
                "totalPage"    => $totalPage,
                "user"         => $userInPage
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                "status"    => 0,
                "message"   => "Lỗi rồiiiiiii"
            ]);
        }
    }
}
