<?php

namespace App;

class DocumentationPages
{
    protected $pages = [
        'Forms' =>[
//            'Inputs' =>[
//                'Select' => 'input-select',
//                'File'   => 'input-file',
//                'Radio'  => 'input-radio',
//                'Checkbox' => 'input-checkbox'
//            ],
            'Multi Select' => 'multiselect',
//            'Formatted Input' => 'formatted-input',
//            'Saving State' => 'saving-state',
            'Add Field'    => 'add-field',
//            'Toggle'       => 'toggle',
//            'Login Form'   => 'login-form',
//            'Register Form' => 'register-form',
//            'Custom Input Form' => 'custom-input-form'
        ],
        'Components' =>[
            'Card Slider'  => 'card-slider',
//            'Step Bar'     => 'progress'
        ]

    ];

    protected $currentUri;

    public function __construct($uri)
    {
        $this->currentUri = $uri;
    }

    public function all()
    {
        return $this->pages;
    }

    public function isActive($compare)
    {
        return $compare === $this->currentUri;
    }

    public function title()
    {
        return $this->findTitle($this->pages, $this->currentUri);
    }

    protected function findTitle($navigation, $slug) {
        foreach ($navigation as $title => $uri) {
            if (is_array($uri)) {
                $foo = $this->findTitle($uri, $slug);
                if ($foo) return $foo;
            }

            if ($uri == $slug) return $title;
        }
    }

    public function next()
    {
        $flattenedArrayOfPagesAndTheirLables = collect($this->pages)->map(function ($value, $key) {
            $links = is_array($value) ? $value : [$key => $value];

            return collect($links)->map(function ($path, $label) {
                return ['path' => $path, 'label' => $label];
            });
        })
        ->flatten(1);

        $pathsByIndex = $flattenedArrayOfPagesAndTheirLables->pluck('path');

        $currentIndex = $pathsByIndex->search($this->currentUri);

        $nextIndex = $currentIndex + 1;

        return $flattenedArrayOfPagesAndTheirLables[$nextIndex] ?? null;
    }

    public function previous()
    {
        $flattenedArrayOfPagesAndTheirLables = collect($this->pages)->map(function ($value, $key) {
            $links = is_array($value) ? $value : [$key => $value];

            return collect($links)->map(function ($path, $label) {
                return ['path' => $path, 'label' => $label];
            });
        })
        ->flatten(1);

        $pathsByIndex = $flattenedArrayOfPagesAndTheirLables->pluck('path');

        $currentIndex = $pathsByIndex->search($this->currentUri);

        $previousIndex = $currentIndex - 1;

        return $flattenedArrayOfPagesAndTheirLables[$previousIndex] ?? null;
    }
}
