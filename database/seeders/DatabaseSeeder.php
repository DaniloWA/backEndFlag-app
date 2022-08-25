<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            DepartmentSeeder::class,
            TeacherSeeder::class,
            CourseSeeder::class,
            SubjectSeeder::class,
            TeacherSubjectSeeder::class,
            CourseSubjectSeeder::class,
            StudentSeeder::class,
            StudentLogSeeder::class,
            SubjectLogSeeder::class,
        ]);
    }
}
