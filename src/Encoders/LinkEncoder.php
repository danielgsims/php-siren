<?php namespace Siren\Encoders;

use Siren\Components\Link;

class LinkEncoder extends BaseEncoder
{
    public function encode(Link $link)
    {
        $this->validateLink($link);

        $response = [
            "rel" => $link->getRel(),
            "href" => $link->getHref()
        ];

        if ($title = $link->getTitle()) {
            $response['title'] = $title;
        }

        return $response;
    }

    private function validateLink(Link $link)
    {
        $rel = $link->getRel();
        if (empty($rel)) {
            throw new \InvalidArgumentException("Link rel is required");
        }

        $href = $link->getHref();

        if (empty($href) ) {
            throw new \InvalidArgumentException("Link href is required");
        }
    }

}
