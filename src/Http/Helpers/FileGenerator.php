<?php 


namespace Crud\Generator\Http\Helpers;



class FileGenerator
{
    public $filename;
    public $folder_name;
    public $path;
    public $content;

    function __construct($filename, $content)
    {
        $this->filename = $filename;
        $this->path = __DIR__ . "/outputs/";
        $this->content = $content;

    }

    function getPath()
    {
        return $this->path;
    }

    function getFilename()
    {
        return $this->filename;
    }

    function generateFile()
    {
        $file = fopen($this->path . $this->filename . ".php", "w");

        fwrite($file, $this->content);
        fclose($file);
    }

    function generateFileInFolder($folder_name)
    {
        $directory = mkdir($this->path . $folder_name.'/', 777);
        $file = fopen($this->path . $folder_name.'/' . $this->filename . ".php", "w");
        fwrite($file, $this->content);
        fclose($file);
        // return $directory;
    }
}