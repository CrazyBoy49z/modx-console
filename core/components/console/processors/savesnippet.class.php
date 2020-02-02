<?php

use MODX\Revolution\modSnippet;

require_once __DIR__.'/console.class.php';

class ConsoleSaveSnippetProcessor extends modConsoleProcessor
{

    public function process()
    {
        $code = trim($this->getProperty('code', ''));
        $code = preg_replace('/^ *(<\?php|<\?)/mi', '', $code);
        $snippet = trim($this->getProperty('name', ''));
        $overwrite = $this->getProperty('overwrite', false);
        if ($o = $this->modx->getObject(modSnippet::class, array('name' => $snippet))) {
            if ($overwrite) {
                /** @var modProcessorResponse $response */
                $response = $this->modx->runProcessor(
                    '/Element/Snippet/Update',
                    array(
                        'id' => $o->get('id'),
                        'name' => $snippet,
                        'snippet' => $code,
                    )
                );
                if ($response->isError()) {
                    return $this->failure($response->getMessage());
                }
            } else {
                return $this->failure($this->modx->lexicon('console_err_snippet_ae'));
            }
        } else {
            /** @var modProcessorResponse $response */
            $response = $this->modx->runProcessor(
                '/Element/Snippet/Create',
                array('name' => $snippet, 'snippet' => $code)
            );
            if ($response->isError()) {
                return $this->failure($response->getMessage());
            }
        }

        return $this->success();
    }
}

return 'ConsoleSaveSnippetProcessor';