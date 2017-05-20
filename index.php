<?php
function __autoload($className)
{
    $path = "modules/core/{$className}.inc.php";
    if (is_file($path))
        include($path);
    else
    {
        $parts = explode("_", $className);
        if (count($parts) == 2)
        {
            $folderName = strtolower($parts[0]);
            $fileName = strtolower($parts[1]);
            $path = "modules/{$folderName}/{$fileName}.inc.php";
            if (is_file($path))
                include($path);
        }
    }
}

  Core::Init();
  Core::Run();
  Core::Done();
