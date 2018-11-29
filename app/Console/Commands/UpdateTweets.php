<?php

namespace App\Console\Commands;

use App\Libraries\MptTweets;
use Illuminate\Console\Command;

class UpdateTweets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'update:tweets';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get tweets from twitter API and save those in our elasticsearch';

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
     * @return mixed
     */
    public function handle()
    {
        $mptTweetsManager = new MptTweets();
        $mptTweetsManager->updateTweets();
    }
}
