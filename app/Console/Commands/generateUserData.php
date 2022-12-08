<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Blog;

class generateUserData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ohdear:delete-old-unverified-blogs';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Creates test user data and insert into the database.';
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
        $this->info('Deleting old unverified blogs...');

        $count = Blog::query()
            ->where('status','=','0')
            ->where('created_at', '<=', now()->subDays(30))
            ->delete();

        $this->comment("Deleted {$count} unverified blogs.");

        $this->info('All done!');
    }
}
