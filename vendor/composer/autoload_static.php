<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitbb62ad063083a9509e5eca54393f6992
{
    public static $prefixLengthsPsr4 = array (
        'F' => 
        array (
            'Firebase\\JWT\\' => 13,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Firebase\\JWT\\' => 
        array (
            0 => __DIR__ . '/..' . '/firebase/php-jwt/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInitbb62ad063083a9509e5eca54393f6992::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInitbb62ad063083a9509e5eca54393f6992::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInitbb62ad063083a9509e5eca54393f6992::$classMap;

        }, null, ClassLoader::class);
    }
}
