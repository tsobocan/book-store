<?php

    namespace Database\Seeders;

    use App\Models\User;
    use App\Models\BookOption;
    use App\Models\Models\Book;
    use App\Models\Models\Author;
    use Illuminate\Database\Seeder;

    class DatabaseSeeder extends Seeder
    {
        public function run()
        {
            $user = User::factory()->create();
            $user->assignRole('Admin');

            Author::factory()->count(5)->has(Book::factory()->count(5)->has(BookOption::factory()->count(3)), 'books')
                ->create();

        }
    }
