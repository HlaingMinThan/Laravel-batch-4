<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;

class SubscriptionController extends Controller
{
    public function toggle(Blog $blog)
    {
        if ($blog->isSubscribedBy(auth()->user())) {
            //subscribe -> unsubscribe -> delete the data
            $blog->subscribedUsers()->detach(auth()->id()); // blog->id,auth->id
        } else {
            //not subscribe -> subscribe  -> store the data
            $blog->subscribedUsers()->attach(auth()->id()); // blog->id,auth->id
        }

        return back();
    }
}
