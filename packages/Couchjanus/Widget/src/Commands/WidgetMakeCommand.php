<?php

namespace Couchjanus\Widget\Commands;

use Illuminate\Console\Command;
use Illuminate\Console\GeneratorCommand;
use Illuminate\Support\Str;
use RuntimeException;
use Symfony\Component\Console\Input\InputOption;

class WidgetMakeCommand extends GeneratorCommand
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:widget {name}';
    
    protected $name = 'make:widget';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new widget';

    protected $type = 'Widget';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->createView();
        $this->createClass();
    }

    protected function createView()
    {
        if ($this->files->exists($path = $this->getViewPath())) {
            $this->error('View already exists!');
            return;
        }
        $this->makeDirectory($path);
        $this->files->put($path, '');
        $this->info('View created successfully.');
    }

    protected function createClass()
    {
        if ($this->files->exists($path = $this->getClassPath())) {
            $this->error('Class already exists!');
            return;
        }
        $this->makeDirectory($path);
        $this->files->put($path, $this->buildClass($this->makeViewName()));
        $this->info('Class created successfully.');
    }

    protected function buildClass($name)
    {
        $stub = $this->files->get($this->getStub());
        $stub = $this->replaceClass($stub, Str::title($name).$this->type);
        $stub = $this->replaceView($stub);
        return $stub;
    }

    protected function replaceView($stub)
    {
        $view = 'widgets.'. $this->makeViewName();
        return str_replace('{{view}}', $view, $stub);
    }

    protected function replaceClass($stub, $name)
    {
        $stub = parent::replaceClass($stub, $name);
        return str_replace('{{class}}', $name, $stub);
    }

    protected function getDefaultNamespace($rootNamespace)
    {
        return $rootNamespace . '\Widgers';
    }

    /**
     * Get the destination view path.
     *
     * @return string
     */
    protected function getViewPath()
    {
        return base_path('resources/views').'/widgets/'.$this->makeViewName().'.blade.php';
    }

    protected function getClassPath()
    {
        return base_path('app').'/Widgets/'.Str::title($this->makeViewName()).$this->type.'.php';
    }

    protected function makeViewName()
    {
        return Str::snake($this->argument('name'));
    }

    protected function getStub()
    {
        return __DIR__.'/stubs/widget.stub';
    }
}
