<?php

namespace is\Masters\Modules\Isengine;

use is\Helpers\System;
use is\Helpers\Objects;
use is\Helpers\Strings;
use is\Helpers\Local;
use is\Helpers\Parser;

use is\Masters\Modules\Master;
use is\Masters\View;
use is\Components\Collection;

class Media extends Master
{
    public $url;
    public $real;

    public $list;

    public function launch()
    {
        // если нет ключа, пробуем взять ключ из СЕО

        $sets = &$this->settings;

        $this->url = '/' . Strings::replace($sets['folder'], ':', '/') . '/';
        $this->real = DI . Strings::replace($sets['folder'], ':', DS) . DS;

        $this->list = new Collection;

        $this->description();
        $this->read();

        if ($sets['sort']) {
            $this->sort($sets['sort']);
        }

        //echo print_r($this->getData(), 1);
        //echo print_r($this->list->getNames(), 1);
    }

    public function read()
    {
        $sets = &$this->settings;

        $folder = Local::search($this->real, [
            'extension' => $sets['extensions'],
            'subfolders' => $sets['subfolders'],
            'merge' => true,
            'return' => 'files'
        ]);

        Objects::each($folder, function($item){
            $description = Parser::fromJson(Local::readFile($this->real . $item['path'] . $item['file'] . '.ini'));
            if ($description) {
                $this->mergeData( [$item['file'] => $description] );
            }
            unset($description);

            $this->list->add([
                'name' => $item['file'],
                'type' => $item['extension'],
                'parents' => Strings::split($item['path'], '\\' . DS, true),
                'ctime' => filectime($item['fullpath']),
                'mtime' => filemtime($item['fullpath']),
                'data' => Objects::merge($item, ['url' => $this->url . Strings::replace($item['path'], DS, '/') . $item['name']])
            ]);
        });
    }

    public function sort($data = null)
    {
        if (!$data) {
            return;
        }

        $sort = Strings::split($data, ':');

        $match = Objects::match(['asc', 'desc', 'random'], $sort[0]);

        $type = $match ? $sort[0] : ($sort[1] ? $sort[1] : 'asc');
        $by = !$match ? $sort[0] : 'name';

        if ($type === 'random') {
            $this->list->random();
            return;
        }

        if ($by === 'id') {
            $this->list->sortById();
        } elseif ($by === 'name') {
            $this->list->sortByName();
        } else {
            $this->list->sortByEntry($by);
        }

        if ($type === 'desc') {
            $this->list->reverse();
        }
    }

    public function description()
    {
        $folders = Local::search($this->real, [
            'merge' => true,
            'return' => 'folders'
        ]);

        $this->mergeData( $this->settings['description'] );
        $this->mergeData( Parser::fromJson(Local::readFile($this->real . 'description.ini')) );

        Objects::each($folders, function($item){
            $this->mergeData( Parser::fromJson(Local::readFile($item['fullpath'] . 'description.ini')) );
        });
    }
}
