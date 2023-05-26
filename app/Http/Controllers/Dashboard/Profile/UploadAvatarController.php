<?php

namespace App\Http\Controllers\Dashboard\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadAvatarController extends Controller
{
    public function index(Request $request){
        $data = $request->validate([
            'avatar' => 'required|file|max:500|dimensions:max_width=300,max_height=300'
        ]);
        if (auth()->user()->avatar) {
            Storage::disk('public')->delete(auth()->user()->avatar);
        }
        $data['avatar'] = Storage::disk('public')->put('disc/img/profile/avatar', $data['avatar']);
        User::query()->where('id', auth()->user()->id)->update($data);

        session()->flash('message', "Avatar successfully uploaded");

        return redirect()->route('dashboard.profile.avatar');
    }
}
