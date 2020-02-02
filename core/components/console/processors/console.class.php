<?php
use MODX\Revolution\Processors\Processor;

abstract class modConsoleProcessor extends Processor
{
    var $permission = 'console';

    function checkPermissions()
    {
        if (!$this->modx->hasPermission($this->permission)) {
            return false;
        }

        return true;
    }
}

return 'modConsoleProcessor';