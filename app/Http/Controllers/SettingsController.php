<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Setting;

class SettingsController extends Controller
{
    
    public function index()
    {
        $rewardThreshold = config('settings.reward_threshold');

        return view('settings.index', compact('rewardThreshold'));
    }
    

    public function update(Request $request)
    {
        $request->validate([
            'reward_threshold' => 'required|integer|min:1',
        ]);

        DB::table('settings')->updateOrInsert(
            ['key' => 'reward_threshold'],
            ['value' => $request->reward_threshold]
        );

        return redirect()->route('settings.index')->with('success', 'Settings updated successfully!');
    }
}
