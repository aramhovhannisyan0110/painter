<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageUploadRequest;
use App\Models\Image;
use App\Models\User;
use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return Renderable
     */
    public function index(): Renderable
    {
        return view('home');
    }

    public function galleria(): Renderable
    {
        return view('galleria', [
            "images" => Image::where('user_id', Auth::id())->get()
        ]);
    }

    public function upload(ImageUploadRequest $request, User $user): bool|string
    {
        return $user->uploadImage($request);
    }
}
