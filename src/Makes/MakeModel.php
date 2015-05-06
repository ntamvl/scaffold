<?php
/**
 * Created by PhpStorm.
 * User: Adriano Gonçalves
 * Date: 4/22/15
 * Time: 10:34 PM
 */

namespace Adrianogl\Scaffold\Makes;


use Illuminate\Filesystem\Filesystem;
use Adrianogl\Scaffold\Commands\ScaffoldMakeCommand;

class MakeModel {
    use MakerTrait;

    public function __construct(ScaffoldMakeCommand $scaffoldCommand, Filesystem $files)
    {
        $this->files = $files;
        $this->scaffoldCommandObj = $scaffoldCommand;

        $this->start();
    }


    protected function start()
    {

        $name = $this->scaffoldCommandObj->getObjName('Name');
        $modelPath = $this->getPath($name, 'model');

        if (! $this->files->exists($modelPath)) {
            $this->scaffoldCommandObj->call('make:model', [
                'name' => $name,
                '--no-migration' => true
            ]);
        }

    }

}