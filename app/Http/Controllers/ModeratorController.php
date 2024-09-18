<?php

namespace App\Http\Controllers;

use App\Models\User;
use Carbon\Carbon;
use Hash;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;

class ModeratorController extends Controller
{
    public function getAllModerators()
    {
        $moderatori = User::latest()->where("role", 'moderator')->get();

        return view('admin.moderator.all_moderators', compact('moderatori'));
    }

    public function editModerator(int $id)
    {
        try {
            $editData = User::where('role', 'moderator')->where('id', $id)->firstOrFail();

            return view('admin.moderator.edit_moderator', compact('editData'));

        } catch (ModelNotFoundException $e) {
            $notification = array(
                'message' => 'Ne postoji moderator sa datim id-jem',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }



    }

    public function updateModerator(Request $request)
    {

        $user_id = $request->id;
        $email = $request->email;

        $emailExists = User::where('email', $email)->where('id', '!=', $user_id)->exists();

        if ($emailExists) {
            $notification = array(
                'message' => 'Email adresa je već zauzeta od strane drugog korisnika',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }
        User::findOrFail($user_id)->update([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $email,
            'updated_at' => Carbon::now(),
        ]);

        $notification = array(
            'message' => 'Moderator je uspešno izmenjen',
            'alert-type' => 'success'
        );

        return redirect()->route('all.moderator')->with($notification);
    }

    public function deleteModerator(int $id)
    {
        try {
            User::where('role', 'moderator')->findOrFail($id)->delete();

            $notification = array(
                'message' => 'Moderator Je Uspešno Obrisan',
                'alert-type' => 'success'
            );
        } catch (ModelNotFoundException $e) {
            $notification = array(
                'message' => 'Ne postoji moderator sa datim id-jem',
                'alert-type' => 'error'
            );
        } finally {
            return redirect()->back()->with($notification);
        }
    }

    public function addModerator() {
        return view('admin.moderator.add_moderator');
    }

    public function storeModerator(Request $request) {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'surname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:'.User::class],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'surname' => $request->surname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'moderator',
        ]);

        $notification = array(
            'message' => 'Uspešno dodat novi moderator',
            'alert-type' => 'success',
        );

        return redirect()->back()->with($notification);

    }

}
