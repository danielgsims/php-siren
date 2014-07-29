<?php namespace Siren\Encoders;

use Siren\Components\Link;

class LinkEncoder extends BaseEncoder
{
    public function encode(Link $link)
    {
        $response = array();
        $response['rel'] = $link->getRel();
        $response['href'] = $link->getHref();

        if ($title = $link->getTitle()) {
            $response['title'] = $title;
        }

        return $response;
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
