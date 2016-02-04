<?php

class Helper_Route extends Helper
{
    /*
     * Loads data, like JS, CSS, images, etc...
    */
    public static function loadData($data)
    {
        return parent::removeLibraryString(parent::getWebsiteRoot()) . $data;
    }

    /*
     * Creates a proper link to be used throughout the application.
    */
    public static function loadRoute($link)
    {
        if (empty($link))
        {
            return parent::getWebsiteRoot();
        }

        return parent::getWebsiteRoot() . 'index.php?' . $link;
    }
}