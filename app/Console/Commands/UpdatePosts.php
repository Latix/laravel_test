<?php

namespace App\Console\Commands;

use App\Models\Post;
use Illuminate\Console\Command;

class UpdatePosts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'posts:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'This will update posts';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $post = Post::find(1);
        $post->update([
            'title' => "This title was updated on today ".now()
        ]);
        echo "updated ".now()." \n";
    }
}
