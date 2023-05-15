<?php

namespace App\Http\Controllers;

use App\Models\Post;
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

  public function selected()
  {
    return view('pages.tags.selected');
  }
}
