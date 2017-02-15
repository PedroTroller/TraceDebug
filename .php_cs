<?php

PedroTroller\CS\Fixer\Contrib\YamlSymfonyServiceFileFixer::addPath('src/PedroTroller/TraceDebug/Resources/config/services.yml');

return Symfony\CS\Config\Config::create()
    ->fixers(array(
        'align_double_arrow',
        'align_equals',
        'concat_with_spaces',
        'line_break_between_statements',
        'no_empty_comment',
        'no_useless_return',
        'ordered_use',
        'php_unit_construct',
        'php_unit_strict',
        'phpdoc_order',
        'phpspec',
        'short_array_syntax',
        'strict_param',
        'yaml_symfony_service_file',
    ))
    ->level(Symfony\CS\FixerInterface::SYMFONY_LEVEL)
    ->addCustomFixer(new PedroTroller\CS\Fixer\Contrib\LineBreakBetweenStatementsFixer())
    ->addCustomFixer(new PedroTroller\CS\Fixer\Contrib\PhpspecFixer())
    ->addCustomFixer(new PedroTroller\CS\Fixer\Contrib\YamlSymfonyServiceFileFixer())
    ->finder(Symfony\CS\Finder\DefaultFinder::create()
        ->in('src')
    )
;
