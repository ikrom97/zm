<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;
use stdClass;

class QuotesController extends Controller
{
  public function selected($slug)
  {
    $data = new stdClass();
    $data->quote = Quote::where('slug', $slug)->first();

    return view('pages.quotes.selected');
  }
}
