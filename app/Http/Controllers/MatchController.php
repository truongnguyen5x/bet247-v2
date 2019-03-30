<?php

namespace App\Http\Controllers;

use App\Club;
use App\Http\Controllers\Controller;
use App\Match;
use App\Rules\after_now;
use App\User;
use Illuminate\Http\Request;

class MatchController extends Controller
{
    //thêm trận
    public function getAdd()
    {
        $a = Club::all();
        return view('admin/match/add', ['clubs' => $a]);
    }
    //thêm trận
    public function postAdd(Request $request)
    {
        $request->validate([
            'league'         => 'required',
            'round'          => 'required',
            'team_home'      => 'required',
            'team_away'      => 'required|different:team_home',
            'end_time'       => 'required|date|after:start_time',
            'start_time'     => 'required|date',
            'time_close_bet' => ['required', 'date', 'before:start_time', new after_now],
            'odds_win'       => 'required|numeric|min:0',
            'odds_draw'      => 'required|numeric|min:0',
            'odds_lose'      => 'required|numeric|min:0',
        ], [
            'league.required'         => 'Bạn cần nhập tên giải đấu',
            'round.required'          => 'Bạn cần nhập vòng đấu',
            'team_away.different'     => 'Hai đội bóng cần phải khác nhau',
            'end_time.after'          => 'Thời gian kết thúc trận đấu cần sau thời điểm bắt đầu',
            'end_time.required'       => 'Bạn cần chọn thời gian',
            'date'                    => 'Bạn càn chọn thời gian',
            'start_time.required'     => 'Bạn cần chọn thời gian',
            'time_close_bet.required' => 'Bạn cần chọn thời gian',
            'time_close_bet.before'   => 'Thời gian dừng nhận cược phải trước lúc trận đấu bắt đầu',
            'required'                => 'Bạn cần nhập trường này',
            'numeric'                 => 'Bạn cần nhập số',
            'min'                     => 'Giá trị tối thiểu phải lớn hơn 0',
        ]);
        $a = new Match;
        if ($request->is_public == 'public') {
            $a->is_public = true;
        } else {
            $a->is_public = false;
        }

        $a->league         = $request->league;
        $a->round          = $request->round;
        $a->team_home_id   = $request->team_home;
        $a->team_away_id   = $request->team_away;
        $a->start_time     = $request->start_time;
        $a->end_time       = $request->end_time;
        $a->time_close_bet = $request->time_close_bet;
        $a->odds_win       = $request->odds_win;
        $a->odds_draw      = $request->odds_draw;
        $a->odds_lose      = $request->odds_lose;
        $a->save();
        return redirect('admin/match/add')->with('notify', 'Thêm trận đấu thành công');
    }

    public function getList()
    {
        $matches = Match::all();
        return view('admin/match/list', ['matches' => $matches]);
    }
    public function getEdit($id)
    {
        $a = Club::all();
        $b = Match::find($id);
        return view('admin/match/edit', ['clubs' => $a, 'match' => $b]);
    }
    public function postEdit(Request $request, $id)
    {
        $a = Match::find($id);
        $request->validate([
            'round'          => 'required',
            'team_home'      => 'required',
            'team_away'      => 'required|different:team_home',
            'end_time'       => 'required|date|after:start_time',
            'time_close_bet' => ['required', 'date', 'before:end_time', new after_now],
            'odds_win'       => 'required|numeric|min:0',
            'odds_draw'      => 'required|numeric|min:0',
            'odds_lose'      => 'required|numeric|min:0',
        ], [
            'round.required'          => 'Bạn cần nhập vòng đấu',
            'team_away.different'     => 'Hai đội bóng cần phải khác nhau',
            'end_time.after'          => 'Thời gian kết thúc trận đấu cần sau thời điểm bắt đầu',
            'end_time.required'       => 'Bạn cần chọn thời gian',
            'date'                    => 'Bạn càn chọn thời gian',
            'time_close_bet.required' => 'Bạn cần chọn thời gian',
            'time_close_bet.before'   => 'Thời gian dừng nhận cược phải trước lúc trận đấu kết thúc',
            'numeric'                 => 'Bạn cần nhập số',
            'min'                     => 'Giá trị tối thiểu phải lớn hơn 0',
            'required'                => 'Bạn cần điền trường này',
        ]);
        if ($a->is_public == false) {
            if ($request->is_public == 'public') {
                $a->is_public = true;
            } else {
                $a->is_public = false;
            }

            $a->round          = $request->round;
            $a->team_home_id   = $request->team_home;
            $a->team_away_id   = $request->team_away;
            $a->end_time       = $request->end_time;
            $a->time_close_bet = $request->time_close_bet;
            $a->odds_win       = $request->odds_win;
            $a->odds_draw      = $request->odds_draw;
            $a->odds_lose      = $request->odds_lose;
            $a->save();
            return redirect('admin/match/edit/' . $id)->with('notify', 'Sửa trận đấu thành công');
        }
        echo 'Không có nội dung này';

    }
    //xoá
    public function postDel(Request $request, $id)
    {
        $a = Match::find($id);
        $a->delete();
        return redirect('admin/match/list')->with('notify', 'Bạn đã xoá trận đấu thành công');
    }

    //cập nhật thông tin
    public function getUpdate($id)
    {
        $a = Match::find($id);
        return view('admin/match/update', ['match' => $a]);
    }
    public function postUpdate(Request $request, $id)
    {
        $request->validate([
            'home_score' => 'required|numeric|min:0',
            'away_score' => 'required|numeric|min:0',
        ], [
            'required' => 'Bạn cần nhập số bàn thắng',
            'numeric'  => 'Bạn cần nhập số bàn thắng',
            'min'      => 'Số bàn thắng cần lớn hơn 0',
        ]);
        $match = Match::find($id);
        if ($match->is_done == false && $match->end_time < date('Y-m-d H:i:s')) {
            $match->home_score = $request->home_score;
            $match->away_score = $request->away_score;
            if ($request->home_score > $request->away_score) {
                $outcome = '1';
                $odd     = $match->odds_win;
            } elseif ($request->home_score == $request->away_score) {
                $outcome = 'x';
                $odd     = $match->odds_draw;
            } else {
                $outcome = '2';
                $odd     = $match->odds_lose;
            }
            $match->is_done = true;
            $notify         = "";
            $bets           = $match->getBet;
            foreach ($bets as $bet) {
                if ($bet->outcome == $outcome) {
                    $money = ($bet->coin) * (1 + $odd);
                    $user  = $bet->getUser;
                    $ad    = User::all()->where('username', '=', 'admin')->first();
                    $notify .= "Admin bị mất $money, ví từ $ad->coin xuống còn " . ((string) (($ad->coin) - $money));
                    $ad->coin = $ad->coin - $money;
                    $notify .= " Alt+ coin.   ";
                    $notify .= "Người chơi id " . $user->id . " nhận đc $money. Ví từ $user->coin lên " . ((string) (($user->coin) + $money));
                    $money += $user->coin;
                    $user->coin = $money;
                    $user->save();
                    $match->save();
                    $ad->save();
                    $notify .= " Altplus Coin.    ";
                }
            }
            return redirect('admin/match/detail/' . $id)->with('notify', $notify);
        } else {
            echo 'Không có nội dung này';
        }

    }

    //chi tiết
    public function getDetail($id)
    {
        $a = Match::find($id);
        return view('match', ['match' => $a]);
    }
    public function getDetailAdmin($id)
    {
        $match = Match::find($id);
        $coin1 = 0;
        $coin2 = 0;
        $coin3 = 0;
        foreach ($match->getBetHome as $value) {
            $coin1 += $value->coin;
        }
        foreach ($match->getBetDraw as $value) {
            $coin2 += $value->coin;
        }
        foreach ($match->getBetAway as $value) {
            $coin3 += $value->coin;
        }
        return view('admin/match/detail', ['match' => $match, 'coin1' => $coin1, 'coin2' => $coin2, 'coin3' => $coin3]);
    }
}
