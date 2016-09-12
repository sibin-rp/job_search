<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class InternshipFieldSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    //
    $fields_lists = ['Chartered Accountancy', 'Animation', 'Fashion Design', 'Graphic Design', 'Merchandise Design',
      'Aerospace Engineering', 'Biotechnology Engineering', 'Chemical Engineering', 'Electronic Engineering',
      'Energy Engineering', 'Engineering Design', 'Engineering Chemistry', 'Game Development', 'Image Processing',
      'Material Science', 'Mechanical Engineering', 'Metallurgy Engineering', 'Ocean Engineering', 'Naval Architecture',
      'Mobile App Development', 'Petroleum Engineering', 'Software Development', 'Programming', 'Software Testing',
      'Web Development', 'Digital Marketing', 'Finance', 'General Management', 'Human Resource', 'Business Research',
      'Marketing', 'Operations', 'Sales', 'Strategy', 'Supply Chain Management', 'Cinematography', 'Content Writing',
      'Film Making', 'Journalism', 'Social Media Marketing', 'Photography', 'Video Making/Editing',
      'Public Relation', 'Research & Development', 'Lecturing', 'Tutoring', 'Acting', 'Architecture', 'Agriculture',
      'Food Engineering', 'Radio Jockey', 'Company Secretary', 'Anchoring', 'Law', 'Humanities', 'Interior Design',
      'Event Management', 'Hotel Management', 'Modeling', 'Singing', 'Medicine', 'Data Science', 'Pharmaceutical',
      'Psychology', 'Travel & Tourism', 'UI/UX Design', 'Volunteering', 'Voice Anchoring', 'Dance', 'Reporting', 'Statics'
    ];

    foreach ($fields_lists as $field){
      DB::table('internship_fields')->insert(
        ['name' => $field,'information' => 'Sample Information']
      );
    }
  }
}
