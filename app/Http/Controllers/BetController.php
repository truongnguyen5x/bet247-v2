<?php
namespace App\Http\Controllers;

use App\Bet;
use App\Http\Controllers\Controller;
use App\Match;
use App\User;
use Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BetController extends Controller
{
    //lấy tất cả các phiếu cược
    public function getListAdmin()
    {
        $all = Bet::all()->where('state', '=', 1);
        return view('admin/bet', ['list' => $all]);
    }

    //lấy các trận đấu được public và các category, tiêu đề
    public function getMatch()
    {
        $matches      = Match::all()->where('is_public', '=', true);
        $date_label   = array();
        $league_label = array();
        foreach ($matches as $match) {
            $day = Carbon::parse($match->start_time)->format('Y-m-d');
            if (!in_array($day, $date_label) && $day > date('Y-m-d')) {
                array_push($date_label, $day);
            }

            if (!in_array($match->league, $league_label)) {
                array_push($league_label, $match->league);
            }

        }
        return view('home', [
            'matches' => $matches,
            'tieude'  => 'Tất cả trận đấu',
            'dates'   => $date_label,
            'leagues' => $league_label,
        ]);

    }

    //xử lí việc user chọn 1 category
    public function getCategory($a, $b = null)
    {
        $matches      = Match::all()->where('is_public', '=', true);
        $date_label   = array();
        $league_label = array();
        foreach ($matches as $match) {
            $day = Carbon::parse($match->start_time)->format('Y-m-d');
            if (!in_array($day, $date_label) && $day > date('Y-m-d')) {
                array_push($date_label, $day);
            }

            if (!in_array($match->league, $league_label)) {
                array_push($league_label, $match->league);
            }

        }
        if ($a == 'live') {
            $matches = Match::all()->where('is_public', '=', true)->where('end_time', '>', date("Y-m-d H:i:s"))->where('start_time', '<', date("Y-m-d H:i:s"));
            return view('home', [
                'matches' => $matches,
                'tieude'  => 'Các trận đang trực tiếp bây giờ',
                'dates'   => $date_label,
                'leagues' => $league_label,
            ]);
        }
        if ($a == 'today') {
            $result  = array();
            $matches = Match::all()->where('is_public', '=', true);
            foreach ($matches as $match) {
                if (Carbon::parse($match->start_time)->format('Y-m-d') == date('Y-m-d')) {
                    array_push($result, $match);
                }

            }
            return view('home', [
                'matches' => $result,
                'tieude'  => 'Các trận diễn ra hôm nay',
                'dates'   => $date_label,
                'leagues' => $league_label,
            ]);
        }
        if ($a == 'comingup') {
            $result1  = array();
            $new_date = date('Y-m-d', strtotime($b));
            foreach ($matches as $key => $value) {
                if ($new_date == date('Y-m-d', strtotime($value->start_time))) {
                    array_push($result1, $value);
                }

            }
            return view('home', [
                'matches' => $result1,
                'tieude'  => 'Các trận diễn ra vào ngày ' . date('d-m-Y', strtotime($b)),
                'dates'   => $date_label,
                'leagues' => $league_label,
            ]);
        }
        if ($a == 'league') {
            $result2 = array();
            foreach ($matches as $key => $value) {
                if ($value->league == $b) {
                    array_push($result2, $value);
                }

            }
            return view('home', [
                'matches' => $result2,
                'tieude'  => 'Các trận thuộc giải ' . $b,
                'dates'   => $date_label,
                'leagues' => $league_label,
            ]);
        }
    }

    //thêm 1 vé cược tạm thời
    public function getAddBet($id, $outcome)
    {
        $match = Match::find($id);
        if (date('Y-m-d H:i:s') < $match->time_close_bet) {
            $check = true;
            $user  = Auth::user();
            $list  = $match->getAllBet;
            foreach ($list as $key => $value) {
                if ($value->user_id == $user->id && $value->outcome == $outcome) {
                    $check = false;
                }

            }
            if ($check) {
                $bet           = new Bet;
                $bet->match_id = $id;
                $bet->user_id  = $user->id;
                $bet->outcome  = (string) $outcome;
                $bet->save();
                $count = count($user->getAllBet->where('state', '=', 0));
                return back()->with('notify', "Bạn có $count vé chưa cược");
            }
            return back()->with('notify', 'Bạn chỉ được chọn mỗi cửa một lần');
        }
        return back()->with('notify', 'Đã quá thời gian để đặt cược');
    }
    //đặt cược
    public function postAddBet(Request $request, $id)
    {
        $bet   = Bet::find($id);
        $match = $bet->getMatch;
        if (date('Y-m-d H:i:s') < $match->time_close_bet) {
            $user = Auth::user();
            if ($user->coin > $request->coin && $request->coin > 100) {
                $bet->coin  = $request->coin;
                $bet->state = true;
                $user->coin = $user->coin - $bet->coin;
                $ad         = User::all()->where('username', '=', 'admin')->first();

                $ad->coin = $ad->coin + $bet->coin;
                $bet->save();
                $ad->save();
                $user->save();
                return back()->with('notify', 'Bạn đặt cược thành công');
            }
            return back()->with('notify', 'Số tiền bạn cược cần nhỏ hơn ví của bạn và tối thiểu là 100APC$');
        }
        return back()->with('notify', 'Đã quá thời gian để đặt cược');
    }

    //xoá 1 vé cược tạm thời
    public function getDelBet($id)
    {
        $bet = Bet::find($id);
        if ($bet->state == 0) {
            $bet->delete();
        }
        return back();
    }

    //xoá tất cả vé cược tạm thời
    public function getDelAllBet()
    {
        $user = Auth::user();
        $bets = $user->getAllBet->where('state', '=', 0);
        foreach ($bets as $key => $value) {
            $value->delete();
        }
        return back()->with('notify', 'Xoá thành công các vé tạm');
    }
}
