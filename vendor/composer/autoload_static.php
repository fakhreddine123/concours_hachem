<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit764858be7d6ac2b59a5c22b30840e145
{
    public static $prefixLengthsPsr4 = array (
        'A' => 
        array (
            'App\\' => 4,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'App\\' => 
        array (
            0 => __DIR__ . '/../..' . '/class',
        ),
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit764858be7d6ac2b59a5c22b30840e145::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit764858be7d6ac2b59a5c22b30840e145::$prefixDirsPsr4;

        }, null, ClassLoader::class);
    }
}
