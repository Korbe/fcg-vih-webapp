<?php
namespace Deployer;

require 'recipe/laravel.php';

// Config

set('repository', 'https://github.com/Korbe/fcg-vih-webapp.git');
set('composer', '/home/u599789838/bin/composer');
set('http_user', 'u599789838'); 

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

task('artisan:migrate')->disable();

// Hosts

host('153.92.220.242')
    ->set('ssh_multiplexing', false)
    ->set('port', 65002)
    ->set('remote_user', 'u599789838')
    ->set('deploy_path', '/home/u599789838/domains/fcg-villach.at/deployment');
    
task('composer-install', function () {
    cd('{{release_path}}');
    run('/home/u599789838/bin/composer install');
});

task('deploy:symlink', function () {
    run('ln -sfn {{deploy_path}}/../storage/app/public {{release_path}}/public/storage');
});

// Hooks
after('deploy:update_code', 'composer-install');
after('composer-install', 'deploy:symlink');

//after('deploy:setup', 'deploy:unlock');
after('deploy:failed', 'deploy:unlock');
