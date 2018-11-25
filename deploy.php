<?php
namespace Deployer;

require 'recipe/laravel.php';

// Project name
set('application', 'my_project');

// Project repository
set('repository', 'git@gitlab.com:ajikamaludin/lara-profile.git');

// [Optional] Allocate tty for git clone. Default value is false.
set('git_tty', true); 

// Shared files/dirs between deploys 
add('shared_files', []);
add('shared_dirs', []);

// Writable dirs by web server 
add('writable_dirs', []);
set('allow_anonymous_stats', false);

// Hosts

host('one.ajikamaludin.id')
    ->set('deploy_path', '/var/www/one');    
    
// Tasks
task('build', function () {
    run('cd {{release_path}} && build');
});

task('migrate:seed', function(){
    run('cd {{release_path}} && /usr/bin/php artisan migrate:fresh --seed');
});
task('composer', function(){
    run('cd {{release_path}} && composer install');
});
task('mkdir', function(){
    run('cd {{release_path}} && mkdir public/storage/{posts,profile,slide,upload}');
});
task('rmdir', function(){
    run('cd {{release_path}} && rm -rf public/storage/{posts,profile,slide,upload}');
});
// [Optional] if deploy fails automatically unlock.
after('deploy:failed', 'deploy:unlock');

// Migrate database before symlink new release.

before('deploy:symlink', 'artisan:migrate');
after('deploy', 'composer');
after('deploy', 'rmdir');
after('deploy', 'mkdir');
after('deploy', 'migrate:seed');

