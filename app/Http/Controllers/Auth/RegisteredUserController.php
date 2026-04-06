<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Position;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        $positions = Position::get();
        $locations = Location::get();
        return view('auth.register', compact('locations', 'positions'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */

    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:' . User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        if ($request->role === 'worker') {
            $request->validate([
                'position' => 'required|exists:positions,id',
                'location' => 'required|exists:locations,id',
                'price' => 'required|numeric',
                'image' => 'required|mimes:png,jpg,jpeg|max:2048',
            ]);
        }

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $nameGem = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/worker-images'), $nameGem);
            $imagePath = 'uploads/worker-images/' . $nameGem;
            $user->image = $imagePath;
        }

        if ($request->role === 'worker') {
            $user->assignRole('worker');
            $user->price = $request->price;
            $user->position_id = $request->position;
            $user->location_id = $request->location;
            $user->status = 'pending';
        } else {
            $user->assignRole('user');
        }
        $user->save();

        event(new Registered($user));
        Auth::login($user);

        switch ($user->getRoleNames()->first()) {
            case 'admin':
                return redirect('admin/registration-requests');
            case 'worker':
                return redirect('workers/appointments');
            default:
                return redirect('/');
        }
    }
}
