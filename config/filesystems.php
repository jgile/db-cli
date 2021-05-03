<?php

return [
    'default' => 'local',
    'disks' => [
        'local' => [
            'driver' => 'local',
            'root' => getcwd(),
        ],
        'snapshots' => [
            'driver' => 'local',
            'root' => '.backups'
        ],
    ],
];
