<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Location;
use App\Models\Position;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class WorkerController extends Controller
{
    public function index()
    {
        $workers = User::role('worker')->where('status', 'accepted')->paginate(10);
        return view('admin.pages.workers.index', compact('workers'));
    }
    public function registrations()
    {
        $workers = User::role('worker')->where('status', 'pending')->paginate(10);
        return view('admin.pages.workers.registrations', compact('workers'));
    }
    public function create()
    {
        $positions = Position::get();
        $locations = Location::get();
        return view('admin.pages.workers.create', compact('positions', 'locations'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
            'position' => 'required|exists:positions,id',
            'location' => 'required|exists:locations,id',
            'price' => 'required',
            'image' => 'required|mimes:png,jpg,jpeg|max:2048',
        ]);
        $validatedData['password'] = Hash::make($request->password);
        $validatedData['status'] = 'accepted';
        $validatedData['position_id'] = $validatedData['position'];
        $validatedData['location_id'] = $validatedData['location'];

        $image = $request->file('image');
        $nameGem = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
        $image->move(public_path('uploads/worker-images'), $nameGem);
        $imagePath = 'uploads/worker-images/' . $nameGem;
        $validatedData['image'] = $imagePath;

        $user = User::create($validatedData);
        $user->assignRole('worker');
        return redirect()->route('admin.workers.index')->with('success', 'Worker created successfully.');
        // return redirect()->back()->with('success', 'Worker created successfully.');
    }
    public function edit(User $worker)
    {
        $positions = Position::get();
        $locations = Location::get();
        // dd($worker);
        return view('admin.pages.workers.edit', compact('worker', 'positions', 'locations'));
    }
    public function update($user, Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|min:3',
            'email' => 'required|email|unique:users,email,' . $user,
            'password' => 'nullable|confirmed',
            'position' => 'required|exists:positions,id',
            'location' => 'required|exists:locations,id',
            'price' => 'required',
            'image' => 'nullable|mimes:png,jpg,jpeg|max:2048',
        ]);
        $user = User::find($user);
        if ($request->password) {
            $validatedData['password'] = Hash::make($request->password);
        } else {
            $validatedData['password'] = $user->password;
        }
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $nameGem = hexdec(uniqid()) . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('uploads/worker-images'), $nameGem);
            $imagePath = 'uploads/worker-images/' . $nameGem;
            $validatedData['image'] = $imagePath;

            if (file_exists(public_path($user->image))) {
                unlink(public_path($user->image));
            }
        } else {
            $validatedData['image'] = $user->image;
        }


        $validatedData['position_id'] = $validatedData['position'];
        $validatedData['location_id'] = $validatedData['location'];
        $user->update($validatedData);

        return redirect()->route('admin.workers.index')->with('success', 'Worker updated successfully.');
    }

    public function status(Request $request)
    {
        try {
            User::find($request->id)->update([
                'status' => 'accepted'
            ]);
            return response()->json([
                'error' => false,
                'message' => 'Status updated successfully'
            ]);
        } catch (\Throwable $th) {
            return response()->json([
                'error' => true,
                'message' => $th->getMessage()
            ]);
        }
    }
    public function destroy(User $worker, Request $request)
    {
        // dd($worker);
        $worker->delete();
        return redirect()->back()->with('success', 'Worker deleted successfully.');
    }
}
