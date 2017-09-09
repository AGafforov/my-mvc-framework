<?php

namespace app\helpers;

use app\libraries\upload\upload;

/**
 * Class ImageHelper
 *
 * @package app\helpers
 */
class ImageHelper
{
    const UPLOAD_DIR = "app/content/img/";
    const ALLOWED_TYPES = ['jpg', 'gif', 'png'];

    /**
     * Checks validation of image extension
     *
     * @param $ext
     *
     * @return bool
     */
    public static function checkImageType($ext)
    {
        return in_array($ext, self::ALLOWED_TYPES);
    }

    /**
     * Uploads image and returns relative path
     *
     * @param $file
     *
     * @return string
     */
    public static function uploadImage($file)
    {
        $image = new Upload($file);
        if ($image->uploaded && self::checkImageType($image->file_src_name_ext)) {
            $image = self::resizeImage($image);

            $image->Process(self::UPLOAD_DIR);

            if ($image->processed) {
                return "/" . self::UPLOAD_DIR . $image->file_src_name;
            }
        }

        return '';
    }

    /**
     * @param upload $image
     *
     * @return upload
     */
    public static function resizeImage(upload $image)
    {
        $image->image_resize = true;
        $image->image_y      = 240;
        $image->image_x      = 320;

        return $image;
    }
}
