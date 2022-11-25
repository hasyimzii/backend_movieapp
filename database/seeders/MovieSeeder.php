<?php

namespace Database\Seeders;

use App\Models\Movie;
use Illuminate\Database\Seeder;

class MovieSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $movie = [
            [
                'title' => 'The Godfather',
                'director' => 'Francis Ford Coppola',
                'year' => '1972',
                'rating' => 9.2,
                'runtime' => '2h 55m',
                'age' => '18+',
                'genre' => 'Crime, Drama',
                'description' => 'The aging patriarch of an organized crime dynasty in postwar New York City transfers control of his clandestine empire to his reluctant youngest son.',
                'url' => 'https://youtu.be/UaVTIH8mujA',
                'image' => 'uploads\movie\godfather.jpg',
            ],
            [
                'title' => 'Spirited Away',
                'director' => 'Hayao Miyazaki',
                'year' => '2001',
                'rating' => 8.6,
                'runtime' => '2h 5m',
                'age' => '13+',
                'genre' => 'Fantasy, Adventure',
                'description' => 'During her family\'s move to the suburbs, a sullen 10-year-old girl wanders into a world ruled by gods, witches, and spirits, and where humans are changed into beasts.',
                'url' => 'https://youtu.be/ByXuk9QqQkk',
                'image' => 'uploads\movie\spirited.jpg',
            ],
            [
                'title' => 'Whiplash',
                'director' => 'Damien Chazelle',
                'year' => '2014',
                'rating' => 8.5,
                'runtime' => '1h 46m',
                'age' => '16+',
                'genre' => 'Drama, Music',
                'description' => 'A promising young drummer enrolls at a cut-throat music conservatory where his dreams of greatness are mentored by an instructor who will stop at nothing to realize a student\'s potential.',
                'url' => 'https://youtu.be/7d_jQycdQGo',
                'image' => 'uploads\movie\whiplash.jpg',
            ],
        ];
        foreach ($movie as $item) {
            Movie::create($item);
        }
    }
}
