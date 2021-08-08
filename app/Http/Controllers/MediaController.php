<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\MainSlider;
use App\Models\Post;
use Illuminate\Http\Request;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class MediaController extends Controller
{
    public function setEventMainImage(Event $event, Media $media)
    {
        $media->update(['order_column' => 0]);

        $images = $event->media()->where('id', '!=', $media->id)->get();

        foreach ($images as $i => $img) {
            $img->update(['order_column' => $i + 2]);
        }

        return redirect()->route('admin.events.edit', ['event' => $event])->withSuccess('Media order updated.');
    }

    public function setPostMainImage(Post $post, Media $media)
    {
        $media->update(['order_column' => 0]);

        $images = $post->media()->where('id', '!=', $media->id)->get();

        foreach ($images as $i => $img) {
            $img->update(['order_column' => $i + 2]);
        }

        return redirect()->route('admin.posts.edit', ['post' => $post])->withSuccess('Media order updated.');
    }

    public function delete(Media $media)
    {
        $media->delete();

        return back()->withSuccess('Media deleted.');
    }

    public function setMainSliderMainImage(MainSlider $mainSlider, Media $media)
    {
        $media->update(['order_column' => 0]);

        $images = $mainSlider->media()->where('id', '!=', $media->id)->get();

        foreach ($images as $i => $img) {
            $img->update(['order_column' => $i + 2]);
        }

        return redirect()->route('admin.main_slider.edit', ['main_slider' => $mainSlider])->withSuccess('Media order updated.');
    }
}
