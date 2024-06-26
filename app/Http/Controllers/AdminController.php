<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AdminController extends Controller
{


    public function AdminDashboard(){
        return view("admin.index");
    }



    //Metoda Za Logout Admina
     public function destroy(Request $request)
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    } // End Method 

    //Metoda Za Prikaz Pogleda Sa Podacima Trenutno Ulogovanog Admina
    public function Profile(){

        $id = Auth::user()->id;
        $adminData = User::find($id);

        return view('admin.admin_profile_view',compact('adminData'));

    }// End Method 

    //Metoda Za Prikaz Pogleda Za Izmenu Podataka Admina
    public function EditProfile(){
        $id = Auth::user()->id;
        $editData = User::find($id);

        return view('admin.admin_profile_edit',compact('editData'));
    }

    //Metoda Za Izmenu Podataka Admina
    public function StoreProfile(Request $request){

        
        //Uzimamo Trenutnog Logovanog Admina/Usera
        $id = Auth::user()->id;
        $data = User::find($id);
        //Uzimamo Podatke Sa Forme I ubacujemo u bazu
        $data->name = $request->name;
        $data->surname = $request->surname;
        $data->email = $request->email;
        
        //commit komanda za promenu baze
        $data->save();


        // Notifikacija Na Uspesnom Zavrsenju Funkcije Koriscenjnem toester skriptom
        $notification = array(
            'message' => 'Admin Podaci Uspesno Izmenjeni',
            'alert-type' => 'success'
        );
        
        return redirect()->route('admin.profile')->with($notification); // Redirect Sa Adekvatnom Porukom
    }

    public function ChangePassword(){
        return view('admin.admin_change_password');
    }

    public function UpdatePassword(Request $request) {
        
        $validateData = $request->validate([
            'oldPassword' => 'required',
            'newPassword' => 'required',
            'confirm_passowrd' => 'required|same:newPassword',
        ]);
        $hashedPassword = Auth::user()->password;
        if(Hash::check($request->oldPassword, $hashedPassword)){
            $user = User::find(Auth::id());
            $user->password = bcrypt($request->newPassword);
            $user->save();

            $notification = array(
                'message' => 'Admin Password Uspesno Izmenjen',
                'alert-type' => 'success'
            );
            
            return redirect()->back()->with($notification);
        }
        else{
            $notification = array(
                'message' => 'Stari Password Nije Tacan',
                'alert-type' => 'error'
            );

            return redirect()->back()->with($notification);
        }
        
        
    }


}
 