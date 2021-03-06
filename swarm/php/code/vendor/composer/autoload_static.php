<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit367d94cea78b30e8897172843fe93abb
{
    public static $prefixLengthsPsr4 = array (
        'P' => 
        array (
            'PFinal\\Database\\' => 16,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'PFinal\\Database\\' => 
        array (
            0 => __DIR__ . '/..' . '/pfinal/database/src',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit367d94cea78b30e8897172843fe93abb::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit367d94cea78b30e8897172843fe93abb::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
