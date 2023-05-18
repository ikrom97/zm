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

  public function get()
  {
    try {
      return Tag::orderBy('title', 'asc')->get();
    } catch (\Throwable $th) {
      return $th;
    }
  }

  public function store(Request $request)
  {
    try {
      Tag::create(['title' => $request->title]);

      return response(['message' => 'Данные успешно сохранены'], 200);
    } catch (\Throwable $th) {
      return $th;
    }
  }

  public function show($id)
  {
    try {
      return Tag::find($id);
    } catch (\Throwable $th) {
      return $th;
    }
  }

  public function update(Request $request, $id)
  {
    try {
      $tag = Tag::find($id);
      $tag->title = $request->title;
      $tag->update();

      return $tag;
    } catch (\Throwable $th) {
      return $th;
    }
  }

  public function destroy($id)
  {
    try {
      return Tag::find($id)->delete();
    } catch (\Throwable $th) {
      return $th;
    }
  }

  public function multidelete(Request $request)
  {
    try {
      foreach ((array) request('ids') as $id) {
        Tag::find($id)->delete();
      }

      return;
    } catch (\Throwable $th) {
      return $th;
    }
  }
}
