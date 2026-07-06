<?php

declare(strict_types=1);

use Rector\Config\RectorConfig;
use Rector\Php85\Rector\Class_\SleepToSerializeRector;
use Rector\Php85\Rector\Class_\WakeupToUnserializeRector;
use Rector\Php85\Rector\ClassMethod\NullDebugInfoReturnRector;
use Rector\Php85\Rector\FuncCall\ArrayKeyExistsNullToEmptyStringRector;
use Rector\Php85\Rector\FuncCall\ChrArgModuloRector;
use Rector\Php85\Rector\FuncCall\OrdSingleByteRector;
use Rector\Php85\Rector\FuncCall\RemoveFinfoBufferContextArgRector;
use Rector\Php85\Rector\ShellExec\ShellExecFunctionCallOverBackticksRector;
use Rector\Php81\Rector\MethodCall\RemoveReflectionSetAccessibleCallsRector;
use Rector\Php85\Rector\Switch_\ColonAfterSwitchCaseRector;
use Rector\ValueObject\PhpVersion;

return RectorConfig::configure()
    ->withPaths([
        __DIR__ . '/bin',
        __DIR__ . '/config',
        __DIR__ . '/src',
        __DIR__ . '/tests',
        __DIR__ . '/public',
    ])

    // Force Rector to reason as PHP 8.5.
    ->withPhpVersion(PhpVersion::PHP_85)

    // Only targeted PHP 8.5 compatibility/deprecation fixes.
    ->withRules([
        RemoveReflectionSetAccessibleCallsRector::class,
        ArrayKeyExistsNullToEmptyStringRector::class,
        ChrArgModuloRector::class,
        OrdSingleByteRector::class,
        RemoveFinfoBufferContextArgRector::class,
        ColonAfterSwitchCaseRector::class,
        ShellExecFunctionCallOverBackticksRector::class,
        NullDebugInfoReturnRector::class,
        SleepToSerializeRector::class,
        WakeupToUnserializeRector::class,
    ]);
