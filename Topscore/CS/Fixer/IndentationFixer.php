<?php

namespace Topscore\CS\Fixer;

use Symfony\CS\Fixer as Symfony;

class IndentationFixer extends Symfony/IndentationFixer
{
    public function fix(\SplFileInfo $file, $content)
    {
        // [Structure] Indentation is done by steps of four spaces (tabs are never allowed)
        return preg_replace_callback('/^([ \t]+)/m', function ($matches) use ($content) {
            return str_replace("\t", '  ', $matches[0]);
        }, $content);
    }

    public function getName()
    {
        return 'topscore_indentation';
    }

    public function getDescription()
    {
        return 'Code must use 2 spaces for indenting, not tabs.';
    }
}
