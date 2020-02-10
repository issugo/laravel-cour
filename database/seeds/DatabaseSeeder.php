<?php

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
        foreach(App\User::all() as $user) {
            $user->update(['avatar' => 'default-avatar.jpg']);
        }
        /*$this->call(SkillsTableSeeder::class);
        $skills = App\Skill::all();
        factory(App\User::class, 50)->create()->each(function($u) use ($skills) {
          $skillSet = $skills->random(rand(1,4));
          foreach($skillSet as $skill) {
              $u->skills()->attach($skill->id, ['level' => rand(1,5)]);
          }
        });
        $this->call(RoleTableSeeder::class);*/
    }
}
