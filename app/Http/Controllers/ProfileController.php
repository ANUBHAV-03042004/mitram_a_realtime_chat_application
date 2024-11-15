<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */
    public function edit(Request $request): View
    {
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        
        $request->validate([
        'name' => ['required', 'string', 'max:255'],
        'username' => ['required', 'string', 'max:255', 'unique:users,username,' . auth()->id()],
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . auth()->id()],
    ]);

    $user = auth()->user();
    $user->update([
        'name' => $request->name,
        'username' => $request->username,
        'email' => $request->email, ]);
   
        if ($user->isDirty('email')) {
            $user->email_verified_at = null;
            $user->sendEmailVerificationNotification();
        }
    
        $user->save();
    
        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current-password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }
    public function addProfile(Request $request)
    {
        $user = User::find(Auth::id());
    
        try {
            $validated = $request->validate([
                // 'image' => 'nullable|image|mimes:jpeg,png|max:2048',
                'gender' => 'required',
                'date_of_birth' => 'required|date',
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return redirect()->back()->withErrors($e->errors())->withInput();
        }
    
        // if ($request->hasFile('image')) {
        //     $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
        //     $request->file('image')->storeAs('public/images', $imageName);
        //     $user->image = $imageName;
        // }
    
        $user->update([
            'gender' => $request->input('gender'),
            'date_of_birth' => $request->input('date_of_birth'),
        ]);
    
        return redirect()->route('profile.edit')->with('status', 'profile-added');
    }
}
