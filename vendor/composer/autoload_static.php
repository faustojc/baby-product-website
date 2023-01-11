<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit1b6f0cde4dac5d7a53144c2f5b235e9f
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Server\\' => 7,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Server\\' => 
        array (
            0 => __DIR__ . '/../..' . '/src',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
        'Server\\data\\Database' => __DIR__ . '/../..' . '/src/data/Database.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit1b6f0cde4dac5d7a53144c2f5b235e9f::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit1b6f0cde4dac5d7a53144c2f5b235e9f::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit1b6f0cde4dac5d7a53144c2f5b235e9f::$classMap;

        }, null, ClassLoader::class);
    }
}
