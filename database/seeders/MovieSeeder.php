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
            ],
            [
                'title' => 'Toy Story',
                'director' => 'John Lasseter',
                'year' => '1995',
                'rating' => 8.3,
                'runtime' => '1h 21m',
                'age' => '7+',
                'genre' => 'Adventure, Comedy',
                'description' => 'A cowboy doll is profoundly threatened and jealous when a new spaceman action figure supplants him as top toy in a boy\'s bedroom.',
                'url' => 'https://youtu.be/v-PjgYDrg70',
            ],
        ];
        $image = [
            'https://m.media-amazon.com/images/M/MV5BM2MyNjYxNmUtYTAwNi00MTYxLWJmNWYtYzZlODY3ZTk3OTFlXkEyXkFqcGdeQXVyNzkwMjQ5NzM@._V1_FMjpg_UX1000_.jpg',
            'https://m.media-amazon.com/images/M/MV5BMjlmZmI5MDctNDE2YS00YWE0LWE5ZWItZDBhYWQ0NTcxNWRhXkEyXkFqcGdeQXVyMTMxODk2OTU@._V1_FMjpg_UX1000_.jpg',
            'https://m.media-amazon.com/images/M/MV5BOTA5NDZlZGUtMjAxOS00YTRkLTkwYmMtYWQ0NWEwZDZiNjEzXkEyXkFqcGdeQXVyMTMxODk2OTU@._V1_FMjpg_UX1000_.jpg',
            'https://m.media-amazon.com/images/M/MV5BMDU2ZWJlMjktMTRhMy00ZTA5LWEzNDgtYmNmZTEwZTViZWJkXkEyXkFqcGdeQXVyNDQ2OTk4MzI@._V1_.jpg'
        ];

        for ($i = 0; $i < 4; $i++) {
            $model = Movie::create($movie[$i]);
            $model->addMediaFromUrl($image[$i])->toMediaCollection();
        }
    }
}
