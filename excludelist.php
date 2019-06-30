<?php
/*
Question : I have an array of file names:

$files = [
    '/usr/share/nginx/wordpress/wp-content/themes/index.php',
    '/usr/share/nginx/wordpress/wp-content/themes/mytheme.php',
    '/usr/share/nginx/wordpress/wp-content/plugins/myplugin.php',
    '/usr/share/nginx/wordpress/wp-content/plugins/akismet.php',
    '/usr/share/nginx/wordpress/wp-content/uploads/november.jpg',
];
Below is a mixed list of specific file names, as well as file paths, that should be excluded. For example, ALL files under a file path should be excluded, but if the value is an actual file name, only that specific file should be excluded.

$exclude = [
    '/usr/share/nginx/wordpress/wp-content/uploads',
    '/usr/share/nginx/wordpress/wp-content/plugins/myplugin.php',
];
For example, you'll want to exclude the uploads directory (and all files in it), but ONLY the myplugin.php file.

Devise a method for applying the exclusion list against the file list WITHOUT nested foreach() loops.
*/


function removeFromList($files, $exclude){
    // merge and sort arrays so folder name we want to exclude will be previous
    // item than file name we want to exclude
    $arr = array_merge($files, $exclude);
    sort($arr);

    $unsetArr = []; // array indexes which we will remove from list later
    for ($i = 0; $i < count($arr); $i++) {
        if (strpos($arr[$i], $arr[$i - 1]) !== false) {
            $unsetArr[] = $i;
            $unsetArr[] = $i - 1;
        }
    }

    // now our index numbers are in $unsetArr. Let's remove these items from our array
    for ($i = 0; $i < count($unsetArr); $i++) {
        unset($arr[$unsetArr[$i]]);
    }

    return $arr;
}

$files = [
    '/usr/share/nginx/wordpress/wp-content/themes/index.php',
    '/usr/share/nginx/wordpress/wp-content/themes/mytheme.php',
    '/usr/share/nginx/wordpress/wp-content/plugins/myplugin.php',
    '/usr/share/nginx/wordpress/wp-content/plugins/akismet.php',
    '/usr/share/nginx/wordpress/wp-content/uploads/november.jpg',
];

$exclude = [
    '/usr/share/nginx/wordpress/wp-content/uploads',
    '/usr/share/nginx/wordpress/wp-content/plugins/myplugin.php',
];

$newArr = removeFromList($files, $exclude);
print_r($newArr);