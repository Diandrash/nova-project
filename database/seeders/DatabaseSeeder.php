<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;\
use App\Models\User;
use App\Models\Role;
use App\Models\Course;
use App\Models\Enrollment;
use App\Models\Assignment;
use App\Models\Submission;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        User::factory(5)->create();
        Course::factory(5)->create();

        // Role::factory(3)->create();

        User::factory()->create([
            'fullname' => 'Bu Atik',
            'role_id' => 2,
            'email' => 'atik@gmail.com',
            'password' => '123456',
            'instance' => 'SMKN 2 Klaten'
        ]);

        User::factory()->create([
            'fullname' => 'Shadeva',
            'role_id' => 1,
            'email' => 'shadevaf@gmail.com',
            'password' => '123456',
            'instance' => 'SMKN 2 Klaten'
        ]);
        
        Role::factory()->create([
            'name' => 'Student',
        ]);

        Role::factory()->create([
            'name' => 'Teacher',
        ]);

        Role::factory()->create([
            'name' => 'Admin',
        ]);

        Enrollment::factory()->create([
            'course_id' => 1,
            'user_id' => 1
        ]);

        Course::factory()->create([
            'course_code' => 566767,
            'instructor_id' => 6,
            'name' => 'SAAS XI SIJA B',
            'description' => 'opsional'
        ]);

        Course::factory()->create([
            'course_code' => 878151,
            'instructor_id' => 6,
            'name' => 'PKK XI SIJA B',
            'description' => 'opsional'
        ]);
        
        Enrollment::factory()->create([
            'course_id' => 6,
            'user_id' => 1
        ]);

        Enrollment::factory()->create([
            'course_id' => 6,
            'user_id' => 2
        ]);

        Assignment::factory()->create([
            'course_id' => 1, // Ganti dengan ID course yang sesuai
            'title' => 'Tugas 2',
            'description' => 'Ini adalah deskripsi tugas 2.',
            'deadline' => now()->addDays(10),
            'files' => 'tugas2.docx',
        ]);

        Assignment::factory()->create([
            'course_id' => 2, // Ganti dengan ID course yang sesuai
            'title' => 'Tugas 2',
            'description' => 'Ini adalah deskripsi tugas 2.',
            'deadline' => now()->addDays(10),
            'files' => 'tugas2.docx',
        ]);

        Submission::factory()->create([
            'assignment_id' => 1,
            'user_id' => 1,
            'submission_text' => '',
            'submitted_files' => '',
            'status' => 0, // Ubah sesuai dengan status yang diinginkan (misalnya true jika sudah selesai)

        ]);

        


        // DB::table('roles')->insert([
        //     'name' => Str::random(10),
        // ]);

        // DB::table('users')->insert([
        //     'fullname' => Str::random(10),
        //     'role_id' => 1,
        //     'email' => Str::random(10).'@gmail.com',
        //     'instance' => Str::random(10),
        //     'password' => Hash::make('password'),
        // ]);
    }
}
