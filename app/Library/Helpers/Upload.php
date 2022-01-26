<?php

use App\Models\Media;
use Illuminate\Support\Facades\File as FileFacade;
use Illuminate\Http\File;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use ProtoneMedia\LaravelFFMpeg\Support\FFMpeg;

/**
 * Upload local image to storage
 *
 * @param string $folder
 * @param string $image
 * @return App\Models\Media
 */
function uploadSeedImage($folder, $image)
{
    $dim = getimagesize($image);
    $arr = explode('/', $image);
    $name = end($arr);
    $contents = new File($image);
    $extension = FileFacade::extension($image);
    $size = FileFacade::size($image);
    $width = $dim[0];
    $height = $dim[1];

    $filename = Storage::putFile($folder, $contents);
    $url = Storage::url($filename);

    return Media::create([
        'original_name' => $name,
        'saved_name' => $filename,
        'url' => $url,
        'size' => $size,
        'extension' => $extension,
        'type' => 'image',
        'width' => $width,
        'height' => $height,
    ]);
}

/**
 * Upload client image to storage
 *
 * @param string $folder
 * @param UploadedFile $image
 * @return App\Models\Media
 */
function uploadImage($folder, UploadedFile $image)
{
    $dim = getimagesize($image);
    $name = $image->getClientOriginalName();
    $extension = $image->extension();
    $size = $image->getSize();
    $width = (isset($dim[0])) ? $dim[0] : 100;
    $height = (isset($dim[1])) ? $dim[1] : 100;

    $filename = Storage::putFile($folder, $image);
    $url = Storage::url($filename);

    return Media::create([
        'original_name' => $name,
        'saved_name' => $filename,
        'url' => $url,
        'size' => $size,
        'extension' => $extension,
        'type' => 'image',
        'width' => $width,
        'height' => $height,
    ]);
}

function uploadCv($folder, UploadedFile $image)
{
    $dim = fileSize($image);
    $name = $image->getClientOriginalName();
    $extension = $image->extension();
    $size = $image->getSize();
    $width = (isset($dim[0])) ? $dim[0] : 100;
    $height = (isset($dim[1])) ? $dim[1] : 100;

    $filename = Storage::putFile($folder, $image);
    $url = Storage::url($filename);

    return Media::create([
        'original_name' => $name,
        'saved_name' => $filename,
        'url' => $url,
        'size' => $size,
        'extension' => $extension,
        'type' => 'file',
        'width' => $width,
        'height' => $height,
    ]);
}

function uploadImageDiscussion($folder, UploadedFile $image)
{
    $dim = getimagesize($image);
    $name = $image->getClientOriginalName();
    $extension = $image->extension();
    $size = $image->getSize();
    $width = (isset($dim[0])) ? $dim[0] : 100;
    $height = (isset($dim[1])) ? $dim[1] : 100;

    $filename = Storage::putFile($folder, $image);
    $url = Storage::url($filename);

    return Media::create([
        'original_name' => $name,
        'saved_name' => $filename,
        'url' => $url,
        'size' => $size,
        'extension' => $extension,
        'type' => 'image',
        'width' => $width,
        'height' => $height,
    ]);
}

/**
 * Upload client video to storage
 *
 * @param string $folder
 * @param UploadedFile $video
 * @return App\Models\Media
 */
function uploadVideo($folder, UploadedFile $video)
{
    $stream = FFMpeg::fromDisk('local_root')->open($video->getRealPath());

    $duration = $stream->getDurationInSeconds();
    $dim = $stream->getVideoStream()->getDimensions();

    $name = $video->getClientOriginalName();
    $extension = $video->extension();
    $size = $video->getSize();
    $width = $dim->getWidth();
    $height = $dim->getHeight();

    $filename = Storage::putFile($folder, $video);
    $url = Storage::url($filename);

    return Media::create([
        'original_name' => $name,
        'saved_name' => $filename,
        'url' => $url,
        'size' => $size,
        'extension' => $extension,
        'type' => 'video',
        'duration' => $duration,
        'width' => $width,
        'height' => $height,
    ]);
}

function deleteFile($media)
{
    if ($media && Storage::exists($media->saved_name)) {
        //Storage::delete($media->saved_name);
        $media->delete();
    }
}

function replaceImage($folder, $media, UploadedFile $new_image)
{
    deleteFile($media);

    return uploadImage($folder, $new_image);
}

function replaceVideo($folder, $media, UploadedFile $new_image)
{
    deleteFile($media);

    return uploadVideo($folder, $new_image);
}
