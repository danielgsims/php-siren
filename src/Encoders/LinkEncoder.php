<?php namespace Siren\Encoders;

use Siren\Components\Link;

class LinkEncoder extends BaseEncoder
{
    public function encode(Link $link)
    {
        $l = array();
        $l['rel'] = $link->getRel();
        $l['href'] = $link->getHref();

        if ($title = $link->getTitle()) {
            $l['title'] = $title;
        }

        return $l;
    }

    private function validateLink(Link $link)
    {
        $name = $link->getRel();
        if (empty($name)) {
            throw new \Exception("Link rel is required");
        }

        $href = $link->getHref();

        if (empty($href) ) {
            throw new \Exception("Link href is required");
        }
    }

}
