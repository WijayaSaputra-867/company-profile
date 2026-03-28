<?php

namespace App\Services;

use App\Models\Portfolio;
use App\Models\PortfolioImage;
use Illuminate\Http\UploadedFile;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PortfolioService
{
    public function getAll(int $perPage = 10): LengthAwarePaginator
    {
        return Portfolio::with(['creator', 'images'])->latest()->paginate($perPage);
    }

    public function create(array $data, array $images = []): Portfolio
    {
        $data['slug'] = Str::slug($data['title']);
        $data['created_by'] = auth()->id();

        $portfolio = Portfolio::create($data);

        foreach ($images as $image) {
            if ($image instanceof UploadedFile) {
                $portfolio->images()->create([
                    'image_path' => $image->store('portfolios', 'public'),
                ]);
            }
        }

        return $portfolio->load('images');
    }

    public function update(Portfolio $portfolio, array $data, array $images = []): Portfolio
    {
        $data['slug'] = Str::slug($data['title']);
        $portfolio->update($data);

        foreach ($images as $image) {
            if ($image instanceof UploadedFile) {
                $portfolio->images()->create([
                    'image_path' => $image->store('portfolios', 'public'),
                ]);
            }
        }

        return $portfolio->fresh(['images']);
    }

    public function delete(Portfolio $portfolio): void
    {
        foreach ($portfolio->images as $image) {
            Storage::disk('public')->delete($image->image_path);
        }
        $portfolio->delete();
    }

    public function deleteImage(PortfolioImage $image): void
    {
        Storage::disk('public')->delete($image->image_path);
        $image->delete();
    }
}
