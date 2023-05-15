<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Quote;
use App\Models\Tag;
use Illuminate\Http\Request;
use stdClass;

class TagsController extends Controller
{
  public function index()
  {
    $data = new stdClass();
    $data->posts = Post::latest()->get();
    $data->tags = Tag::orderBy('title', 'asc')->get();

    return view('pages.tags.index', compact('data'));
  }

  public function selected($slug)
  {
    $data = new stdClass();
    $data->tags = Tag::orderBy('title', 'asc')->get();
    $data->selectedTag = Tag::where('slug', $slug)->first();
    $tagId = [$data->selectedTag->id];
    $data->quotes = Quote::whereHas('tags', function ($q) use ($tagId) {
      $q->whereIn('id', $tagId);
    })->paginate(10);

    return view('pages.tags.selected', compact('data'));
  }
}
