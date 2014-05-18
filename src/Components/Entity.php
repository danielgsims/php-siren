<?php namespace Siren\Components;

class Entity
{
    private $title;
    private $class = array();
    private $properties = array();
    private $entities = array();
    private $actions = array();
    private $links = array();
    private $rel;
    private $href;

    public function addClass($class)
    {
        $this->class = (string) $class;

        return $this;
    }

    public function setProperties(array $properties)
    {
        $this->properties = $properties;

        return $this;
    }

    public function addEntity(Entity $entity)
    {
        $rel = $entity->getRel();

        if (empty($rel)) {
            throw new \InvalidArgumentException("Sub-entities must contain a rel");
        }

        $this->entities[] = $entity;

        return $this;
    }

    public function addAction(Action $action)
    {
        $this->actions[] = $action;

        return $this;
    }

    public function addLink(Link $link)
    {
        $this->links[] = $link;

        return $this;
    }

    public function setTitle($title)
    {
        $this->title = $title;

        return $this;
    }

    public function addRel($rel)
    {
        $this->rel[] = (string) $rel;

        return $this;
    }

    public function setHref($href)
    {
        $this->href = (string) $href;

        return $this;
    }

    public function getTitle()
    {
       return $this->title;
    }

    public function getClass()
    {
        return $this->class;
    }

    public function getProperties()
    {
        return $this->properties;
    }

    public function getEntities()
    {
        return $this->entities;
    }

    public function getActions()
    {
        return $this->actions;
    }

    public function getLinks()
    {
        return $this->links;
    }

    public function getHref()
    {
        return $this->href;
    }

    public function getRel()
    {
        return $this->rel;
    }
}
