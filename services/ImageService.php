<?php

class ImageService
{
    public static function saveUploadedImageAsSquareJpeg(string $tmpPath,string $destination,int $size): void
    {
        $mimeType = self::getImageMimeType($tmpPath);
        $image = self::createImageFromMimeType($tmpPath, $mimeType);
        $squareImage = self::cropAndResizeToSquare($image, $size);
        self::saveAsJpeg($squareImage, $destination);
        imagedestroy($image);
        imagedestroy($squareImage);
    }

    private static function getImageMimeType(string $tmpPath): string
    {
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mimeType = finfo_file($finfo, $tmpPath);
        finfo_close($finfo);
        $allowedMimeTypes = ['image/jpeg', 'image/png'];
        if (!in_array($mimeType, $allowedMimeTypes)) {
            throw new Exception("Le fichier téléchargé n'est pas une image valide.");
        }
        return $mimeType;
    }

    private static function createImageFromMimeType(string $tmpPath, string $mimeType): GdImage
    {
        switch ($mimeType) {
            case 'image/jpeg':
                $image = imagecreatefromjpeg($tmpPath);
                break;
            case 'image/png':
                $image = imagecreatefrompng($tmpPath);
                break;
            default:
                throw new Exception("Le type MIME de l'image n'est pas supporté.");
        }
        if (!$image) {
        throw new Exception("Impossible de lire l'image.");
    }
        return $image;
    }

    private static function cropAndResizeToSquare(GdImage $image, int $size): GdImage
    {
        $width = imagesx($image);
        $height = imagesy($image);
        $minDimension = min($width, $height);
        $srcX = (int)(($width - $minDimension) / 2);
        $srcY = (int)(($height - $minDimension) / 2);
        $squareImage = imagecreatetruecolor($size, $size);
        imagecopyresampled($squareImage, $image, 0, 0, $srcX, $srcY, $size, $size, $minDimension, $minDimension);
        return $squareImage;
    }

    private static function saveAsJpeg(GdImage $image, string $destination): void
    {
        if (!imagejpeg($image, $destination, 90)) {
            throw new Exception("Impossible de sauvegarder l'image.");
        }
    }
}