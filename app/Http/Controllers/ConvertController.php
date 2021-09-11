<?php

namespace App\Http\Controllers;

use CloudConvert\Laravel\Facades\CloudConvert;
use CloudConvert\Models\Job;
use CloudConvert\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Psy\Util\Str;
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
                        ->set('url', 'https://s664sas.storage.yandex.net/rdisk/1c448ec0e10c549939f6239dc2c4032ab0a3ea08d79c859b631ab742c6d724eb/613d225f/q8p2Wzs8ZbNnVGWqhtAfA5XLKPsUU5JHMPRqBkf-kWb0Czm6WSKMjr398uOsXJSfgEupVi5RfJDHr8M7QHCYvQ==?uid=0&filename=Expertise_Text-%D0%BA%D0%BE%D0%BD%D0%B2%D0%B5%D1%80%D1%82%D0%B8%D1%80%D0%BE%D0%B2%D0%B0%D0%BD.pdf&disposition=attachment&hash=DcCtZkpJ79lsNl2I2tun7oNqMpR2TCDHP/4cueiKwFu27sSnujrj0H7pqnYOf1%2Bhq/J6bpmRyOJonT3VoXnDag%3D%3D&limit=0&content_type=application%2Fpdf&owner_uid=996764292&fsize=150081&hid=ffcdfb37565e15ab4a4a20076f4df8ea&media_type=document&tknv=v2&rtoken=cqKLFnLgMZC8&force_default=no&ycrid=na-d8f35fc215d8805de0c699d26e4c4b90-downloader5e&ts=5cbbf15b615c0&s=08e99b062e09113052ea93806007b7b6bf43a5fb8ef2679fbe24010ccf8e195b&pb=U2FsdGVkX1_AxN4aBn2a_4ei4pZfVtVYpgxkb6yyGxLPD9KuNJcOvQ5oyhTaoG_DIvHipzFtIntBib24gtjz8w7Hl3KAgmwo0qd6ywxOFDs')
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
            if(\Illuminate\Support\Str::contains($file->filename, '.html')) {
                $url = $file->url;
            }
        }

        $getFile = file_get_contents($url);

        $crawler = new Crawler($getFile);

        $crawler = $crawler->filter('body');

        return response()->json(['data' => ['html' => $crawler->html()]]);
    }
}
