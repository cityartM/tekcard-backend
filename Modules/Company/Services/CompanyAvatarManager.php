<?php

namespace Modules\Company\Services;

use Illuminate\Filesystem\FilesystemManager;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;
use Modules\Company\Models\Company;
use Illuminate\Filesystem\Filesystem;
use Intervention\Image\ImageManager;

class CompanyAvatarManager
{
    const AVATAR_WIDTH = 125;

    const AVATAR_HEIGHT = 125;

    /**
     * @var Company
     */
    protected $company;

    /**
     * @var Filesystem
     */
    private $fs;

    /**
     * @var ImageManager
     */
    private $imageManager;

    /**
     * @var string Storage disk used for keeping photos.
     */
    protected $disk = 'public';

    public function __construct(FilesystemManager $fs, ImageManager $imageManager)
    {
        $this->fs = $fs->disk($this->disk);
        $this->imageManager = $imageManager;
    }

    /**
     * Upload and crop company avatar to predefined width and height.
     *
     * @param UploadedFile $file
     * @param array|null $cropPoints
     * @return string Avatar file name.
     */
    public function uploadAndCropAvatar(UploadedFile $file, array $cropPoints = null)
    {
        try {
            return $this->cropAndResizeImage($file, $cropPoints);
        } catch (\Exception $e) {
            logger("Cannot upload and crop image. " . $e->getMessage());
            return null;
        }
    }

    /**
     * Check if company has uploaded avatar photo.
     * If he is using some external url for avatar, then
     * it is assumed that avatar is not uploaded manually.
     *
     * @param Company $company
     * @return bool
     */
    private function companyHasUploadedAvatar(Company $company)
    {
        return $company->avatar && ! Str::contains($company->avatar, ['http', 'gravatar']);
    }

    /**
     * Get destination directory where avatar should be uploaded.
     *
     * @return string
     */
    private function getDestinationDirectory()
    {
        return '/upload/companies';
    }

    /**
     * @param Company $company
     */
    public function deleteAvatarIfUploaded(Company $company)
    {
        if (! $this->companyHasUploadedAvatar($company)) {
            return;
        }

        $path = sprintf(
            "%s/%s",
            $this->getDestinationDirectory(),
            $company->avatar
        );

        $this->fs->delete($path);
    }

    /**
     * Crop image from provided selected points and
     * resize it to predefined width and height.
     *
     * @param UploadedFile $file
     * @param array|null $points
     * @return string
     */
    private function cropAndResizeImage(UploadedFile $file, array $points = null)
    {

        $image = $this->imageManager->make($file);

        if ($points) {

            // Calculate delta between two points on X axis. This
            // value will be used as width and height for cropped image.
            $size = floor($points['x2'] - $points['x1']);

            $image->crop($size, $size, (int) $points['x1'], (int) $points['y1'])
                ->resize(self::AVATAR_WIDTH, self::AVATAR_HEIGHT);
        } else {
            // If crop points are not provided, we will just crop
            // provided image to specified width and height.
            //$image->crop(self::AVATAR_WIDTH, self::AVATAR_HEIGHT);
            $image->resize(self::AVATAR_WIDTH, self::AVATAR_HEIGHT);
        }

        $fileName = $file->hashName($this->getDestinationDirectory());
       // dd($fileName);
        $this->fs->put(
            $fileName,
            $image->stream(null, 100)->__toString(),
            'public'
        );

        return basename($fileName);
    }
}
