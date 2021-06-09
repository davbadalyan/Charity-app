<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MediaController extends Controller
{
    public function delete(Media $media)
    {
        $media->delete();

        return back()->withSuccess('Media deleted.');
    }
}
