<?php

namespace App\Http\Controllers;

use CloudConvert\Laravel\Facades\CloudConvert;
use CloudConvert\Models\Job;
use CloudConvert\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Symfony\Component\DomCrawler\Crawler;

class ConvertController extends Controller
{
    /**
     * @throws \Illuminate\Contracts\Filesystem\FileNotFoundException
     */
    public function convert(Request $request) {
//        $file = $request->file('file')->store('uploads', ['disk' => 'public']);
//        $testFile = Storage::disk('public')->get($file);
        $name = \Illuminate\Support\Str::random(32);

        $job = CloudConvert::jobs()->create(
            (new Job())
                ->setTag($name.'job')
                ->addTask(
                    (new Task('import/url', $name))
                        ->set('url', 'https://s555man.storage.yandex.net/rdisk/7e3cccf4ce13db7ea92500d1fb44d26764622fbbc21e4090a11444e3f8969d64/613dbcd5/q8p2Wzs8ZbNnVGWqhtAfA5XLKPsUU5JHMPRqBkf-kWb0Czm6WSKMjr398uOsXJSfgEupVi5RfJDHr8M7QHCYvQ==?uid=996764292&filename=Expertise_Text-%D0%BA%D0%BE%D0%BD%D0%B2%D0%B5%D1%80%D1%82%D0%B8%D1%80%D0%BE%D0%B2%D0%B0%D0%BD.pdf&disposition=attachment&hash=&limit=0&content_type=application%2Fpdf&owner_uid=996764292&fsize=150081&hid=ffcdfb37565e15ab4a4a20076f4df8ea&media_type=document&tknv=v2&etag=c6d39e5edc385f45264c28afb59cb759&rtoken=5yUFSPdptATY&force_default=yes&ycrid=na-2c35de016e0955a466f71e0667d56a68-downloader15h&ts=5cbc84a991f40&s=ca3dc393469cb78461044b759555c8a4c3e9a183ddb9af350855964eda837699&pb=U2FsdGVkX1-8GCCRGI8xpwWbIuD8vqXdhg1ontF4VFdcnUDniC3sHlFa16ylfZuuY0fHOrdGZ61eH19nE83pVATWdcMsJLdTfyUyqvIZQcE')
                )
                ->addTask(
                    (new Task('convert', $name.'convert'))
                        ->set('input', $name)
                        ->set('input_format', 'pdf')
                        ->set('output_format', 'docx')
                )
                ->addTask(
                    (new Task('convert', $name.'converthtml'))
                        ->set('input', $name.'convert')
                        ->set('input_format', 'docx')
                        ->set('output_format', 'html')
                )
                ->addTask(
                    (new Task('export/url', $name.'export'))
                        ->set('input', $name.'converthtml')
                )
        );

        CloudConvert::jobs()->wait($job); // Wait for job completion

        $url = '';

        foreach ($job->getExportUrls() as $file) {
            if(Str::contains($file->filename, '.html')) {
                $url = $file->url;
            }
        }

        $getFile = file_get_contents($url);

        $crawler = new Crawler($getFile);

        $crawler = $crawler->filter('body');

        $file = \App\File::query()->create(['name' => $name, 'html' => $crawler->html(), 'code' => Str::random(8), 'user_id' => Auth::user()->id]);

        return response()->json(['data' => $file]);
    }
}
