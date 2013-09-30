<?php

namespace Eutech\Bundle\GenericBootstrapBundle\Composer;

use Composer\Script\Event;

class ScriptHandler
{
    public static function symlinkAssets(Event $event)
    {
        // Twitter Bootstrap
        $twbsDir = getcwd().'/vendor/twbs/bootstrap';
        $twbsBundleAssetsDir = __DIR__.'/../Resources/public/twbs';

        if (is_dir($twbsDir) && ! is_dir($twbsBundleAssetsDir)) {
            mkdir($twbsBundleAssetsDir);
            symlink($twbsDir.'/dist/css', $twbsBundleAssetsDir.'/css');
            symlink($twbsDir.'/dist/fonts', $twbsBundleAssetsDir.'/fonts');
            symlink($twbsDir.'/dist/js', $twbsBundleAssetsDir.'/js');

            $event->getIO()->write('Symlinking Boostrap assets into EutechGenericBootstrapBundle');
        }

        // jQuery
        $jqueryDir = getcwd().'/vendor/components/jquery';
        $jqueryBundleAssetsDir = __DIR__.'/../Resources/public/jquery';

        if (is_dir($jqueryDir) && ! is_dir($jqueryBundleAssetsDir)) {
            mkdir($jqueryBundleAssetsDir);
            symlink($jqueryDir.'/jquery.min.js', $jqueryBundleAssetsDir.'/jquery.min.js');

            $event->getIO()->write('Symlinking jQuery assets into EutechGenericBootstrapBundle');
        }
    }
}