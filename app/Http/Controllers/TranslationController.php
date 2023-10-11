<?php

namespace App\Http\Controllers;

use App\Http\Requests\Request;
use App\Models\Translation;
use DragonCode\PrettyArray\Services\Formatter;
use Illuminate\Support\Facades\Validator;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileDoesNotExist;
use Spatie\MediaLibrary\MediaCollections\Exceptions\FileIsTooBig;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class TranslationController extends Controller
{
    public function index(Request $request, string $lang = 'en')
    {
        return view('translation/index', [
            'lang' => $lang,
            ...$this->readJsonFile(locale: $lang)
        ]);
    }

    public function update(Request $request, string $lang = 'en')
    {
        $this->validate($request, [
            'values' => 'required|array',
        ]);

        $locale = $lang;

        $page_path = resource_path('lang/' . $locale . '.json');

        $page_data = json_decode(file_get_contents($page_path), true);

        $page_data = array_merge($page_data, $request->values);

        return $this->saveJsonFile($locale);
    }

    public function deleteImage($media)
    {

        /** @var Translation $translations*/
        $media = Media::query()->where('id', $media)->firstOrFail();

        $media->delete();

        return redirect()->back();
    }

    /**
     * @throws FileDoesNotExist
     * @throws FileIsTooBig
     */
    public function addMedia($lang, $collection = 'slider')
    {
        $this->validate(\request(), [
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        /** @var Translation $translations*/
        $translations = Translation::query()->where('locale', $lang)->firstOrFail();

        $translations->addMediaFromRequest('file')
            ->toMediaCollection($collection);

        return redirect()->back();
    }

    public function readJsonFile($locale)
    {
        $page_path = resource_path('lang/' . $locale . '.json');

        $page_data = array_merge(
            json_decode(file_get_contents(resource_path('lang/en.json')), true),
            json_decode(file_get_contents($page_path), true),
        );

        $slider = [];
        $hero_image = null;
        /** @var Translation $translations*/
        $translations = Translation::query()->where('locale', $locale)->firstOrFail();

        $hero_image = $translations->getMedia('hero')->last();
        $slider = $translations->getMedia('slider');

        return [
            'translations' => $page_data,
            'slider' => $slider,
            'hero_image' => $hero_image
        ];
    }

    public function saveJsonFile($locale)
    {
        $this->validate(\request(), [
            'values' => 'required|array',
        ]);

        $page_path = resource_path('lang/' . $locale . '.json');

        $page_data = request()->values;

        try {
            $this->storeAsJsonFile($page_data, $page_path);
            return redirect()->route('translations', ['lang' => $locale]);
        } catch (\Exception $e) {
            return redirect()->route('translations', ['lang' => $locale])
                ->withErrors(['error' => 'Something went wrong!'])
                ->withInput();
        }
    }

    private function storeAsJsonFile($page_data, $page_path): void
    {
        $service = Formatter::make();

        $service->asJson();

        $formatted = $service->raw($page_data);

        // Write in the file
        $fp = fopen($page_path, 'w');

        fwrite($fp, $formatted);

        fclose($fp);
    }
}
