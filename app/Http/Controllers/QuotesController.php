<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use App\Models\Tag;
use Illuminate\Http\Request;
use stdClass;

class QuotesController extends Controller
{
  public function selected($slug)
  {
    $data = new stdClass();
    $data->quote = Quote::where('slug', $slug)->first();
    $data->tags = Tag::orderBy('title', 'asc')->get();

    return view('pages.quotes.selected', compact('data'));
  }
}
