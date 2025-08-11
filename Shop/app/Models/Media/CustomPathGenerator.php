<?php

namespace App\Models\Media; // Promeni namespace ako ti odgovara drugačije

use Spatie\MediaLibrary\MediaCollections\Models\Media;
use Spatie\MediaLibrary\Support\PathGenerator\PathGenerator; // Uveri se da je ova use izjava tačna

class CustomPathGenerator implements PathGenerator
{
    /*
     * Get the path for the given media, relative to the root storage path.
     */
    public function getPath(Media $media): string
    {
        // Primer: categories/1/ (za kategorije) ili products/123/ (za proizvode)
        // gde je 1 ili 123 ID modela na koji je slika zakačena (Category ili Product)
        return $this->getBasePath($media) . '/';
    }

    /*
     * Get the path for conversions of the given media, relative to the root storage path.
     */
    public function getPathForConversions(Media $media): string
    {
        // Konverzije će ići u podfolder 'conversions' unutar osnovnog foldera
        return $this->getBasePath($media) . '/conversions/';
    }

    /*
     * Get the path for responsive images of the given media, relative to the root storage path.
     */
    public function getPathForResponsiveImages(Media $media): string
    {
        // Responsivne slike će ići u podfolder 'responsive-images'
        return $this->getBasePath($media) . '/responsive-images/';
    }

    /*
     * Helper metoda za dobijanje osnovne putanje.
     * Ovde je logika za nazivanje foldera.
     */
    protected function getBasePath(Media $media): string
    {
        // $media->model_type će biti 'App\Models\Category' ili 'App\Models\Product'
        // $media->model_id će biti ID kategorije ili proizvoda
        // $media->collection_name će biti 'category_images' ili 'product_images'

        // Logika: [naziv_modela_malim_slovima]/[ID_modela]
        // Npr: categories/1/ ili products/123/

        $modelName = strtolower(class_basename($media->model_type)); // categories ili products
        $modelId = $media->model_id;

        return "{$modelName}/{$modelId}";

        // Alternativna logika:
        // Ako želiš da foldere zoveš po 'collection_name' (npr. 'category_images', 'product_images')
        // return $media->collection_name . '/' . $media->model_id;

        // Ako želiš da koristis slug umesto ID-ja (ovo je malo kompleksnije za implementaciju
        // jer slug nije direktno dostupan iz Media modela bez dodatnog query-ja)
        // return $modelName . '/' . $media->model->slug; // Ovo će zahtevati da je model loadovan, opreznije sa ovim!
    }
}