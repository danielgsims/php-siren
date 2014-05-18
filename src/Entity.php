<?php

class Entity 
{
    protected $class = array();
    protected $properties = array();
    protected $entities = array();
    protected $actions = array();
    protected $links = array();

    public function setClass(array $class)
    {
        $this->class = $class;
    }

    public function setProperties(array $properties)
    {
        $this->properties = $properties;
    }

    public function setEntities(array $entities)
    {
        $this->entities = array();

        foreach ($entities as $entity) {
            $this->addEntity($entity);
        }
    }

    public function setActions(array $actions)
    {
        $this->actions = array();

        foreach ($actions as $action) {
            $this->addAction($action);
        }
    }

    public function setLinks(array $links)
    {
        $this->links = array();

        foreach ($links as $link) {
            $this->addLink($link);
        }
    }

    public function addEntity(Entity $entity)
    {
        $this->entities[] = $entity;
    }

    public function addAction(Action $action)
    {
        $this->actions[] = $action;
    }

    public function addLink(Link $link)
    {
        $this->links = $link;
    }
}
