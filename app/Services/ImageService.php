<?php

namespace App\Services;

use Intervention\Image\Facades\Image;
use Str;

class ImageService
{
	public object $newImage;
	public object $image;
	public string $imageName;
	public string $directory;
	
	public function __construct(object $newImage, string $directory)
	{
		$this->newImage  = $newImage;
		$this->directory = public_path($directory);
		$this->imageName = Str::uuid() . '.' . $newImage->getClientOriginalExtension();
		
		$this->openImage();
	}
	
	public function openImage(): void
	{
		$this->image = Image::make($this->newImage);
	}
	
	public function resizeImage(int $with, int $height): void
	{
		$this->image->resize($with, $height);
	}
	
	public function saveImage(): void
	{
		$this->image->save("{$this->directory}/{$this->imageName}");
	}
}