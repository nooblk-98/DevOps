<?php
namespace Deployer;

require 'recipe/common.php';

// Config

set('repository', 'git@github.com:3CSDesign/freudenberg-php-2023.git');

add('shared_files', []);
add('shared_dirs', []);
add('writable_dirs', []);

// Hosts

host('staging-server')
    ->set('labels',['stage' => 'staging'])
    ->setRemoteUser('freudenberg-php-2023')
    ->setConfigFile('~/.ssh/config')
    ->set('keep_releases', 1)
    ->setIdentityFile('~/.ssh/id_rsa')
    ->set('branch', 'staging')
    ->set('forward_agent',false)
    ->set('ssh_multiplexing',true)
    ->set('deploy_path', '~/source')
    ->setSshArguments(['-o UserKnownHostsFile=/dev/null','-o StrictHostKeyChecking=no']);

host('prod-server-1')
    ->set('labels',['stage' => 'production'])
    ->setRemoteUser('freudenberg-php-2023')
    ->setConfigFile('~/.ssh/config')
    ->set('keep_releases', 1)
    ->set('branch', 'main')
    ->setIdentityFile('~/.ssh/id_rsa1')
    ->set('forward_agent',false)
    ->set('ssh_multiplexing',true)
    ->set('deploy_path', '~/source')
    ->setSshArguments(['-o UserKnownHostsFile=/dev/null','-o StrictHostKeyChecking=no']);

// Tasks
  
/**
 *  Remove SSH StrictHostKeyChecking for github
 */
task('set_known_hosts', function(){
    run('eval `ssh -o StrictHostKeyChecking=no git@github.com`');
});

/**
 * Create Public Symlinks
 */
task('create_pub_symlink', function(){
    if (!has('previous_release')) {
        run('rm -rf ~/app');
        run('ln -s ~/source/current ~/app');
    }
});


/**
 * Start Docker Compose
 */

task('start_compose', function(){
    run('sudo /priv-app/freudenberg-php-2023/docker-run');
});

// Plays

task(
    'deploy', [
        'deploy:unlock',
        'deploy:prepare',
        'deploy:clear_paths',
        'deploy:symlink',
        'deploy:unlock',
        'deploy:cleanup',
        'deploy:success'
    ]
);

// Hooks
after('deploy:failed', 'deploy:unlock');

before('deploy:update_code', 'set_known_hosts');

after('deploy:symlink', 'create_pub_symlink');

before('deploy:cleanup', 'start_compose');