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
      return response([
        'message' => 'Не удалось найти данные',
        'error' => $th,
      ]);
    }
  }

  public function store(Request $request)
  {
    try {
      $tag = Tag::where('title', $request->title)->first();
      if ($tag) {
        return response(['message' => 'Тег уже существует'], 400);
      }
      $tag = Tag::create(['title' => $request->title]);

      return response([
        'tag' => $tag,
        'message' => 'Тег успешно добавлен',
      ], 200);
    } catch (\Throwable $th) {
      return $th;
    }
  }

  public function update(Request $request, Tag $tag)
  {
    $tag = Tag::find(request('id'));
    $tag->title = request('title');

    try {
      $tag->update();

      return response([
        'tag' => $tag,
        'message' => 'Тег успешно сохранен',
      ], 200);
    } catch (\Throwable $th) {
      return $th;
    }
  }

  public function destroy(Tag $tag)
  {
    try {
      $tag->quotes()->detach();
      $tag->delete();

      return response(['message' => 'Тег успешно удален'], 200);
    } catch (\Throwable $th) {
      return $th;
    }
  }

  public function multidelete(Request $request)
  {
    try {
      foreach ((array) request('ids') as $id) {
        $tag = Tag::find($id);
        $tag->quotes()->detach();
        $tag->delete();
      }

      return response(['message' => 'Теги успешно удалены'], 200);
    } catch (\Throwable $th) {
      return $th;
    }
  }
}
