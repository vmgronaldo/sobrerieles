<?php


namespace App\Abstracts;


use Bkwld\Cloner\Adapters\Upchuck;
use Bkwld\Cloner\AttachmentAdapter;
use Illuminate\Support\Facades\Storage;

class CustomAttachmentAdapter implements AttachmentAdapter
{
    /**
     * @var \Illuminate\Contracts\Filesystem\Filesystem
     */
    protected $disk;
    protected $depth = 2;
    protected $length = 16;
    protected $url_prefix = '/storage/';

    public function __construct()
    {
        $this->disk = Storage::disk("public");
    }

    public function path($url)
    {
        $prefix = $this->url_prefix;

        // If the url_prefix is absolute-path style but the url isn't, get only the
        // path from the URL before comparing against the prefix.
        if (preg_match('#^/#', $prefix) && preg_match('#^http#', $url)) {
            $url = parse_url($url, PHP_URL_PATH);
        }

        // Trim the prefix from the URL
        return substr($url, strlen($prefix));
    }

    /**
     * Create a unique directory and filename
     *
     * @param string $filename
     * @param \League\Flysystem\Filesystem|void $disk
     * @return string New path and filename
     */
    public function makeNestedAndUniquePath($filename, $disk = null)
    {

        // If no disk defined, get it from the current mount mananger
        if (empty($disk)) $disk = $this->disk;

        // Remove unsafe characters from the filename
        // https://regex101.com/r/mJ3sI5/1
        $filename = preg_replace('#[^\w\-\_\.]#i', '_', $filename);

        // Create nested folders to store the file in
        $dir = '';
        for ($i = 0; $i < $this->depth; $i++) {
            $dir .= str_pad(mt_rand(0, $this->length - 1), strlen($this->length), '0', STR_PAD_LEFT) . '-';
        }

        // If this file doesn't already exist, return it
        $path = $dir . $filename;
        if (!$disk->has($path)) return $path;

        // Get a unique filename for the file and return it
        $file = pathinfo($filename, PATHINFO_FILENAME);
        $i = 1;
        $ext = pathinfo($filename, PATHINFO_EXTENSION);
        while ($disk->has($path = $dir . $file . '-' . $i . '.' . $ext)) {
            $i++;
        }
        return $path;

    }

    public function url($path)
    {
        return $this->url_prefix . ltrim($path, '/');
    }

    public function newPath($current_path, $new_path)
    {
        return str_replace(basename($current_path), $new_path, $current_path);
    }

    /**
     * Duplicate a file given it's URL
     *
     * @param string $url
     * @param \Illuminate\Database\Eloquent\Model $clone
     * @return string
     */
    public function duplicate($url, $clone)
    {
        // Make the destination path
        $current_path = $this->path($url);
        if ($this->disk->exists($current_path)) {
            $filename = basename($current_path);
            $new_path = $this->makeNestedAndUniquePath($filename, $this->disk);
            $new_path = $this->newPath($current_path, $new_path);
            $this->disk->copy($current_path, $new_path);
            return $this->url($new_path);
        } else {
            return null;
        }
    }
}
