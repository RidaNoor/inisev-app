## Installation Guide
Run following commands in same order as given:
Note: Make sure you've docker installed and running
1. cp .env.example .env
2. Add gmail smtp credentials in .env file
3. ./vendor/bin/sail up -d
5. For laravel migrations run following commands:
    `./vendor/bin/sail artisan migrate`
6. For seeds, run the following command:
    `./vendor/bin/sail artisan db:seed`
7. To run the queue locally, run the following command
    `./vendor/bin/sail artisan queue:work`
8. To run the send email command for users to notify for new posts, run the following command
    `./vendor/bin/sail artisan subscribers:send-email`
    