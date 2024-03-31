<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use App\Models\Post;
use App\Models\Subscription;
use App\Models\Configuration;
use App\Jobs\SendEmailJob;

class NotifySubscribers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'subscribers:send-email';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email for latest posts to the subscribers for respected websites';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $job_ran_at =  date('Y-m-d H:i:s');
        $job_configuration = Configuration::where('key', 'last_job_run')->get();
        $last_job_run = $job_configuration[0]->value;
       
       // Get the latest posts to send email to subscribers respected to the website they've subscribed 
        $latest_posts = Post::where('created_at', '>', $last_job_run)->get();
        foreach($latest_posts as $post) {
            foreach($post->websites as $website) {
                // Loop through each subscriber to get the email
                $subscribers_email_list = [];
                foreach($website->subscribers as $subscriber) {
                    $email_data = [
                        'email' => $subscriber['email'],
                        'title' => $post->title,
                        'description' => $post->description,
                    ];

                    // Add to queue to send email
                    dispatch(new SendEmailJob($email_data));
                }
            }
        }

        // Update last_job_run on job finish
        Configuration::where('key', 'last_job_run')->update(['value' => $job_ran_at]);
    }
}
