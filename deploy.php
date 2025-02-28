<?php
namespace Deployer;

require 'recipe/laravel.php';

// Config

set('repository', 'https://github.com/Korbe/fcg-vih-webapp.git');
set('composer', '/home/u599789838/bin/composer');
set('http_user', 'u599789838'); 
set('branch', 'develop');

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

    task('deploy:transfer_node_modules', function () {
        // Record the start time
        $startTime = microtime(true);
    
        $localPath = __DIR__ . '/node_modules';
        $remotePath = get('release_path') . '/node_modules';
        
        // SCP command to transfer the node_modules directory
        $scpCommand = "scp -r -P 65002 {$localPath} u599789838@153.92.220.242:{$remotePath}";
        
        writeln("Running command: " . $scpCommand);
    
        // Execute the SCP command
        system($scpCommand, $returnVar);
    
        // Record the end time
        $endTime = microtime(true);
    
        // Calculate the duration in seconds
        $durationInSeconds = $endTime - $startTime;
    
        // Convert the duration into minutes and seconds
        $minutes = floor($durationInSeconds / 60);
        $seconds = round($durationInSeconds % 60);
    
        // Log the duration in minutes and seconds
        writeln("SCP transfer took {$minutes} minutes and {$seconds} seconds.");
    
        // If the SCP command failed, throw an exception
        if ($returnVar !== 0) {
            throw new \RuntimeException("SCP failed with exit code {$returnVar}");
        }
    });


    // task('deploy:transfer_node_modules', function () {
    //     $localPath = __DIR__ . '/node_modules';
    //     $remotePath = "{{release_path}}/node_modules"; // Zielpfad auf dem Remote-Server
    
    //     // Verwenden der Git Bash oder WSL (falls installiert) auf dem lokalen Windows-Rechner
    //     // Achte darauf, den richtigen Pfad zu verwenden, der zum Git Bash-Programm oder WSL führt
    
    //     $bashCommand = "C:/Program Files/Git/bin/bash.exe -c 'rsync -avz --progress -e \"ssh -p 65002\" {$localPath} u599789838@153.92.220.242:{$remotePath}'";
    //     writeln("Running command: " . $bashCommand);
    
    //     // Befehl ausführen und den Rückgabewert überprüfen
    //     system($bashCommand, $returnVar);
    
    //     if ($returnVar !== 0) {
    //         throw new \RuntimeException("rsync failed with exit code {$returnVar}");
    //     }
    // });
    
    
    


// task('deploy:create_remote_directory', function () {
//     $remotePath = get('release_path') . '/node_modules';
//     $sshCommand = "ssh -p 65002 u599789838@153.92.220.242 'mkdir -p {$remotePath}'";

//     writeln("Running command: " . $sshCommand);

//     // Führe den Befehl lokal aus
//     system($sshCommand, $returnVar);

//     if ($returnVar !== 0) {
//         throw new \RuntimeException("Failed to create remote directory. Exit code: {$returnVar}");
//     }

//     writeln("Directory created successfully on remote server.");
// });





// task('deploy:transfer_node_modules', function () {
//     $localPath = __DIR__ . '/node_modules';  // Lokaler Pfad
//     $remotePath = get('release_path') . '/node_modules';  // Remote-Pfad unter Verwendung des release_path

//     // Sicherstellen, dass der Release-Pfad existiert
//     run('mkdir -p ' . get('release_path') . '/node_modules');

//     // Verwende tar, um die Dateien zu archivieren und dann auf den Remote-Server zu übertragen
//     $tarCommand = "tar -czf - {$localPath} | ssh -p 65002 u599789838@153.92.220.242 'tar --no-symlinks -xzf - -C {$remotePath}'";

//     writeln("Running command: " . $tarCommand);

//     system($tarCommand, $returnVar);

//     if ($returnVar !== 0) {
//         throw new \RuntimeException("Tar transfer failed with exit code {$returnVar}");
//     }
// });




// task('deploy:transfer_vendor', function () {
//     upload('vendor', '{{release_path}}/vendor');
// });








task('composer-install', function () {
    cd('{{release_path}}');
    run('/home/u599789838/bin/composer install');
});

// task('npm-install', function () {
//     cd('{{release_path}}');
//     run('npm install');
// });

// task('build', function () {
//     cd('{{release_path}}');
//     run('npm run build');
//     });
    


// Hooks
//after('deploy:update_code', 'deploy:transfer_node_modules');
//after('deploy:update_code', 'composer-install');
//after('npm-install', 'build');

//after('deploy:setup', 'deploy:unlock');

after('deploy:failed', 'deploy:unlock');
