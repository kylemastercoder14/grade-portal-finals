<?php
spl_autoload_register(function ($class_name) {
    $class_map = [
        'dbconfig' => 'classes/dbconfig.class.php',
        'model' => 'classes/model.class.php',
        'view' => 'classes/view.class.php',
        'import' => 'classes/import.class.php',
        'control' => 'classes/control.class.php',
        'action' => 'classes/action.class.php',
        
        // Add more classes to autoload here if needed
    ];

    if (array_key_exists(strtolower($class_name), $class_map)) {
        require_once $class_map[strtolower($class_name)];
    }
});