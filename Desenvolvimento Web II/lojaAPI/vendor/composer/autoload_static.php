<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInit8c05d3a51da3321e35d17cd5c4795502
{
    public static $prefixLengthsPsr4 = array (
        'S' => 
        array (
            'Stripe\\' => 7,
        ),
        'M' => 
        array (
            'MercadoPago\\' => 12,
        ),
    );

    public static $prefixDirsPsr4 = array (
        'Stripe\\' => 
        array (
            0 => __DIR__ . '/..' . '/stripe/stripe-php/lib',
        ),
        'MercadoPago\\' => 
        array (
            0 => __DIR__ . '/..' . '/mercadopago/dx-php/src/MercadoPago',
        ),
    );

    public static $classMap = array (
        'Composer\\InstalledVersions' => __DIR__ . '/..' . '/composer/InstalledVersions.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->prefixLengthsPsr4 = ComposerStaticInit8c05d3a51da3321e35d17cd5c4795502::$prefixLengthsPsr4;
            $loader->prefixDirsPsr4 = ComposerStaticInit8c05d3a51da3321e35d17cd5c4795502::$prefixDirsPsr4;
            $loader->classMap = ComposerStaticInit8c05d3a51da3321e35d17cd5c4795502::$classMap;

        }, null, ClassLoader::class);
    }
}
