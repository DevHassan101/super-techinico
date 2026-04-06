<?php

namespace App\Http\Controllers\worker;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Position;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WorkerController extends Controller
{
    public function profile() {
        $positions = Position::get();
        $locations = Location::get();
        return view('workers.pages.profile.index', compact('positions','locations'));
    }

    public function updateProfile(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3',
            'position' => 'required|exists:positions,id',
            'location' => 'required|exists:locations,id',
            'price' => 'required',
            'languages' => 'required|array|min:1',
            'languages.*' => 'string',
            'bio' => 'required',
        ]);

        
    
        $validatedData['position_id'] = $validatedData['position'];
        $validatedData['location_id'] = $validatedData['location'];
        $user = Auth::user();
        $user->update($validatedData);
    
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
    
}
