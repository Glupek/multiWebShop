<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class AdminController extends Controller
{
    function index()
    {
        return view('dashboards.admins.index');
    }

    function profile()
    {
        return view('dashboards.admins.profile');
    }

    function settings()
    {
        return view('dashboards.admins.settings');
    }

    function updateInfo(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . Auth::user()->id,
            'adress' => 'required'
        ]);
        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            $query = User::find(Auth::user()->id)->update([
                'name' => $request->name,
                'email' => $request->email,
                'adress' => $request->adress,
            ]);

            if (!$query) {
                return response()->json(['status' => 0, 'msg' => 'Er is iets fout gelopen.']);
            } else {
                return response()->json(['status' => 1, 'msg' => 'Uw profiel is aangepast.']);
            }
        }
    }

    function updatePicture(Request $request)
    {
        $path = 'users/images/';
        $file = $request->file('admin_image');
        $new_name = 'UIMG_' . date('Ymd') . uniqid() . '.jpg';

        $upload = $file->move(public_path($path), $new_name);

        if (!$upload) {
            return response()->json(['status' => 0, 'msg' => 'Ai te lelijk , afbeelding uploaden mislukt']);
        } else {
            $oldPicture = User::find(Auth::user()->id)->getAttributes()['picture'];
            if ($oldPicture != '') {
                if (\File::exists(\public_path($path . $oldPicture))) {
                    \File::delete(\public_path($path . $oldPicture));
                }
            }

            $update = User::find(Auth::user()->id)->update(['picture' => $new_name]);

            if (!$upload) {
                return response()->json(['status' => 0, 'msg' => 'Ai te lelijk , afbeelding uploaden in database mislukt']);
            } else {
                return response()->json(['status' => 1, 'msg' => 'Profiel foto geupdate']);
            }
        }
    }

    function changePassword(Request $request)
    {
        $validator = \Validator::make($request->all(), [
            'oldpassword' => [
                'required', function ($attribute, $value, $fail) {
                    if (!\Hash::check($value, Auth::user()->password)) {
                        return $fail(__('fout paswoord'));
                    }
                },
                'min:8',
                'max:30'
            ],
            'newpassword' => 'required|min:8|max:30',
            'cnewpassword' => 'required|same:newpassword'
        ], [
            'oldpassword.required' => 'Voer uw huidig paswoord in .',
            'newpassword.required' => 'Voer uw nieuw paswoord in .NU!!!',
            'newpassword.min' => 'Nieuw paswoord moet minstens 8 dingskes bevatten',
            'newpassword.max' => 'Het is geen brief max 30 charizards',
            'cnewpassword.required' => 'Doe dat nieuw nog is.',
            'cnewpassword.same' => 'Dude nieuw en bevestig moeten het zelfde zijn'
        ]);
        if (!$validator->passes()) {
            return response()->json(['status' => 0, 'error' => $validator->errors()->toArray()]);
        } else {
            $update = User::find(Auth::user()->id)->update(['password' => \Hash::make($request->newpassword)]);
            if (!$update) {
                return response()->json(['status' => 0, 'msg' => 'Er ging iets fout ,paswoord is niet aan bd toegevoegd']);
            } else {
                return response()->json(['status' => 1, 'msg' => 'Ja die zit er in ']);
            }
        }
    }
}
