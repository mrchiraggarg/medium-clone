<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class ClapController extends Controller
{
    public function clap(Post $post)
    {
        $post->claps()->create([
            'user_id' => auth()->id(),
        ]);

        return back();
    }
}
