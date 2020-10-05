<?php

namespace Deployer;

require 'recipe/common.php';

// Project name
set('application', 'php-hello-world');

// Project repository
set('repository', 'git@github.com:llbbl/php-hello-world.git');

host('php-hello-world')
    ->hostname('34.218.232.136')
    ->user('forge')
    ->port('22')
    ->identityFile('~/.ssh/id_ed25519')
    ->forwardAgent(true)
    ->multiplexing(true)
    ->addSshOption('UserKnownHostsFile', '/dev/null')
    ->addSshOption('StrictHostKeyChecking', 'no')
    ->set('deploy_path', '~/{{application}}');


add('shared_dirs', []);

set('writable_mode', 'chmod');

// Writable dirs by web server
add('writable_dirs', []);
set('allow_anonymous_stats', false);


/**
 * Main task
 */
task('deploy', [
    'deploy:info',
    'deploy:prepare',
    'deploy:lock',
    'deploy:release',
    'deploy:update_code',
    'deploy:shared',
    'deploy:vendors',
    'deploy:writable',
    'deploy:symlink',
    'deploy:unlock',
    'cleanup',
])->desc('Deploy your project');

after('deploy', 'success');
