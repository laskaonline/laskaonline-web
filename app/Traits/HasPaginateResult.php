<?php

namespace App\Traits;

trait HasPaginateResult
{
    /**
     * @param mixed $mixed
     * @return array
     */
    public function resultData(mixed $mixed): array
    {
        return $mixed->items();
    }

    /**
     * @param mixed $mixed
     * @return array
     */
    public function resultMeta(mixed $mixed, bool $withLink = false): array
    {
        $meta = $mixed->toArray();
        $result = [
            'total'          => $meta['total'],
            'per_page'       => $meta['per_page'],
            'current_page'   => $meta['current_page'],
            'last_page'      => $meta['last_page'],
            'first_page_url' => $meta['first_page_url'],
            'last_page_url'  => $meta['last_page_url'],
            'next_page_url'  => $meta['next_page_url'],
            'prev_page_url'  => $meta['prev_page_url'],
            'path'           => $meta['path'],
            'from'           => $meta['from'],
            'to'             => $meta['to'],
            'link'           => $meta['links'],
        ];

        if (!$withLink) {
            unset($result['link']);
        }
        return $result;
    }
}
