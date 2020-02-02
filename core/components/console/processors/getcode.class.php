<?php
require_once __DIR__.'/console.class.php';
class ConsoleGetCodeProcessor extends modConsoleProcessor
{

    public function process()
    {
        $modx = &$this->modx;
        $code = $_SESSION['Console']['code'];
        if (!$code) {
            $code = "<?php\n";
        }

        return $this->success($code);
    }
}

return 'ConsoleGetCodeProcessor';