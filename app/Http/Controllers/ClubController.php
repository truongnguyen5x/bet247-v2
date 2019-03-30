<?php
namespace App\Http\Controllers;

use App\Club;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ClubController extends Controller
{
    public function getAdd()
    {
        return view('admin/club/add');
    }
    public function postAdd(Request $request)
    {
        $this->validate($request, [
            'club_name' => 'required|max:190',
            'club_sign' => 'required|min:2|max:8',
        ], [
            'club_name.required' => 'Bạn cần nhập tên đội bóng',
            'club_name.max'      => 'Độ dài tên đội bóng phải ít hơn 190 kí tự',
            'club_sign.required' => 'Bạn cần nhập tên viết tắt đội bóng',
            'club_sign.min'      => 'Độ dài tên viết tắt phải từ 2-8 kí tự',
            'club_sign.max'      => 'Độ dài tên viết tắt phải từ 2-8 kí tự',
        ]);
        $fc            = new Club;
        $fc->club_name = $request->club_name;
        $fc->club_sign = $request->club_sign;
        if ($request->hasFile('anh')) {        
            $extension = $request->anh->getClientOriginalName();
            $fileName  = str_random(5) . $extension;
            while (file_exists('image/clubs/' . $fileName)) {
                $fileName = str_random(5) . $extension;
            }
            $request->anh->move('image/clubs/', $fileName);
            $fc->club_image = 'image/clubs/' . $fileName;
        } else {
            $fc->club_image = "";
        }
        $fc->save();
        return redirect('admin/club/list')->with('notify', 'Thêm đội bóng thành công.');
    }
    public function getList()
    {
        $all = Club::all();
        return view('admin/club/list', ['all' => $all]);
    }
    public function getEdit($id)
    {
        $club = Club::find($id);
        return view('admin/club/edit', ['club' => $club]);
    }
    public function postEdit(Request $request, $id)
    {
        $this->validate($request, [
            'club_name' => 'required|max:190',
            'club_sign' => 'required|min:2|max:8',
        ], [
            'club_name.required' => 'Bạn cần nhập tên đội bóng',
            'club_name.max'      => 'Độ dài tên đội bóng phải ít hơn 190 kí tự',
            'club_sign.required' => 'Bạn cần nhập tên viết tắt đội bóng',
            'club_sign.min'      => 'Độ dài tên viết tắt phải từ 2-8 kí tự',
            'club_sign.max'      => 'Độ dài tên viết tắt phải từ 2-8 kí tự',
        ]);
        $club            = Club::find($id);
        $club->club_name = $request->club_name;
        $club->club_sign = $request->club_sign;
        if ($request->hasFile('anh')) {
            $extension = $request->anh->getClientOriginalName();
            $fileName  = str_random(5) . $extension;
            while (file_exists('image/clubs/' . $fileName)) {
                $fileName = str_random(5) . $extension;
            }
            $request->anh->move('image/clubs/', $fileName);
            $club->club_image = 'image/clubs/' . $fileName;
        }
        $club->save();
        return redirect('admin/club/list')->with('notify', 'Sửa đội bóng thành công');
    }

    public function postDel(Request $request, $id)
    {
        $var = Club::find($id);
        $var->delete();
        return redirect('admin/club/list')->with('notify', 'Bạn đã xoá thành công!');
    }
}
