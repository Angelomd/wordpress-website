<?php
//This init class is used to add the extension to the extensions list while you are developing them.
//When the extension is added to the supported list of extensions, this file is no longer needed.

if (!class_exists('PhotoSwipe_Lightbox_FooGallery_Extension_Init')) {
    class PhotoSwipe_Lightbox_FooGallery_Extension_Init
    {

        function __construct()
        {
            add_filter('foogallery_available_extensions', [$this, 'add_to_extensions_list']);
        }

        function add_to_extensions_list($extensions)
        {
            $extensions[] = [
                'slug'        => 'photoswipe',
                'class'       => 'PhotoSwipe_Lightbox_FooGallery_Extension',
                'title'       => __('PhotoSwipe', 'foogallery-photoswipe'),
                'file'        => 'foogallery-photoswipe-extension.php',
                'description' => __(
                    'Implements the great \"PhotoSwipe\"-Lightbox of Dmitry Semenov in FooGallery',
                    'foogallery-photoswipe'
                ),
                'author'      => ' Martin Bergann',
                'author_url'  => 'http://www.knipserey.de',
                'thumbnail'   => PHOTOSWIPE_LIGHTBOX_FOOGALLERY_EXTENSION_URL . '/assets/extension_bg.png',
                'tags'        => [__('lightbox', 'foogallery')],    //use foogallery translations
                'categories'  => [__('Build Your Own', 'foogallery')], //use foogallery translations
                'source'      => 'generated',
            ];

            return $extensions;
        }
    }

    new PhotoSwipe_Lightbox_FooGallery_Extension_Init();
}
