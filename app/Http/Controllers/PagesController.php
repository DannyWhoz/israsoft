<?php

namespace App\Http\Controllers;

use App\Models\Game;
use App\Models\Player;
use App\Models\Team;
use App\Models\User;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PagesController extends Controller
{
    public function index() {
        $games = DB::table('games')->get();
        return view('index', compact('games'));
    }

    public function archive() {
        $teams = DB::table('teams')->get();
        $games = DB::table('games')->where('finished', '=', 1)->get();
        return view('archive', compact('games'));
    }

    public function game($id) {
        $first_cord = Game::find($id)->first_cord;
        $second_cord = Game::find($id)->second_cord;
        $game = Game::find($id);
        $teams = Db::table('teams')->get('name');
        $teams_count = DB::table('teams')->count();
        return view('game', compact('first_cord', 'second_cord', 'game', 'teams', 'teams_count'));
    }

    public function store_players(Request $request, $id) {
        $request->validate([
            'name' => ['required', 'string', 'max:20'],
            'surname' => ['required', 'string', 'max:20'],
            'callsign' => ['required', 'string', 'max:20'],
            'email' => ['required', 'email:rfc,dns'],
            'phone' => ['required', 'max:20'],
            'team' => ['required'],
        ]);
        $player = new Player([
            'created_at' => now(),
            'game_id' => $id,
            'name' => $request->name,
            'surname' => $request->surname,
            'callsign' => $request->callsign,
            'email' => $request->email,
            'phone' => $request->phone,
            'team_id' =>  $request->team,
        ]);
        $player->save();
        return redirect()->route('game', $id)->with(['success' => 'You are registered for the game']);
    }

    public function save_email(Request $request) {
        $request->validate([
            'email' => ['required', 'email:rfc,dns']
        ]);

        if(DB::table('emails')->where('email', '=', $request->email)->exists()) {
            return redirect()->back()->with(
                ['error' => 'You have already subscribed to the newsletter!']
            );
        } else {
            DB::table('emails')->insert(['email' => $request->email, 'created_at' => now(), 'updated_at' => now()]);
            return redirect()->back()->with(
                ['success' => 'You have successfully subscribed to the newsletter!']
            );
        }
    }
}
