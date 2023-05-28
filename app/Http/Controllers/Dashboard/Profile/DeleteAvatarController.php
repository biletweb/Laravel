<?php

namespace App\Http\Controllers\Dashboard\Profile;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DeleteAvatarController extends Controller
{
    public function index()
    {
        if (auth()->user()->avatar) {
            Storage::disk('public')->delete(auth()->user()->avatar);
            session()->flash('message', "Avatar successfully deleted");
        } else {
            session()->flash('error_message', "The avatar has already been deleted");
        }
        $data['avatar'] = null;
        User::query()->where('id', auth()->user()->id)->update($data);
        return redirect()->route('dashboard.profile.avatar');
    }
}
