<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    $posts = [
      [
        'image' => 'images/posts/photo-1.jpg',
        'title' => 'Природа',
        'thumbImage' => 'images/posts/thumbs/photo-1.jpg',
        'alternativeText' => 'Река',
      ], [
        'image' => 'images/posts/photo-2.jpg',
        'title' => 'Искусство',
        'thumbImage' => 'images/posts/thumbs/photo-2.jpg',
        'alternativeText' => 'Кисточки',
      ], [
        'image' => 'images/posts/photo-3.jpg',
        'title' => 'Душевный покой',
        'thumbImage' => 'images/posts/thumbs/photo-3.jpg',
        'alternativeText' => 'Камни стоят друг на друге с идеальным балансом',
      ], [
        'image' => 'images/posts/photo-4.jpg',
        'title' => 'Дружба',
        'thumbImage' => 'images/posts/thumbs/photo-4.jpg',
        'alternativeText' => 'Два ребенка держатся за руки',
      ], [
        'image' => 'images/posts/photo-5.jpg',
        'title' => 'Душевный покой',
        'thumbImage' => 'images/posts/thumbs/photo-5.jpg',
        'alternativeText' => 'Камни стоят друг на друге с идеальным балансом',
      ], [
        'image' => 'images/posts/photo-6.jpg',
        'title' => 'Промышленность',
        'thumbImage' => 'images/posts/thumbs/photo-6.jpg',
        'alternativeText' => 'Городок по среди гор',
      ], [
        'image' => 'images/posts/photo-7.jpg',
        'title' => 'Чистота',
        'thumbImage' => 'images/posts/thumbs/photo-7.jpg',
        'alternativeText' => 'Капля воды на листе',
      ], [
        'image' => 'images/posts/photo-8.jpg',
        'title' => 'Растение',
        'thumbImage' => 'images/posts/thumbs/photo-8.jpg',
        'alternativeText' => 'Растение',
      ], [
        'image' => 'images/posts/photo-9.jpg',
        'title' => 'Космос',
        'thumbImage' => 'images/posts/thumbs/photo-9.jpg',
        'alternativeText' => 'Космос',
      ], [
        'image' => 'images/posts/photo-10.jpg',
        'title' => 'Мир',
        'thumbImage' => 'images/posts/thumbs/photo-10.jpg',
        'alternativeText' => 'Голубь летает',
      ],
    ];

    foreach ($posts as $post) {
      Post::create([
        'title' => $post['title'],
        'image' => $post['image'],
        'thumb_image' => $post['thumbImage'],
        'alternative_text' => $post['alternativeText'],
      ]);
    }
  }
}
