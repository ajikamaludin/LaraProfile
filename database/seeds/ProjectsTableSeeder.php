<?php

use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $projects = factory(App\Models\Project::class, 5)->create()->each(function($post){
            $post->images()->save(factory(App\Models\ProjectImage::class)->create(['id_project' => $post->id]));
            $post->images()->save(factory(App\Models\ProjectImage::class)->create(['id_project' => $post->id]));
            $post->images()->save(factory(App\Models\ProjectImage::class)->create(['id_project' => $post->id]));
            $post->images()->save(factory(App\Models\ProjectImage::class)->create(['id_project' => $post->id]));
            $post->images()->save(factory(App\Models\ProjectImage::class)->create(['id_project' => $post->id]));
            $post->images()->save(factory(App\Models\ProjectImage::class)->create(['id_project' => $post->id]));
        });
    }
}
