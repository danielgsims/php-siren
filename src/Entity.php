<?php

class Entity 
{
    private $title;
    private $class = array();
    private $properties = array();
    private $entities = array();
    private $actions = array();
    private $links = array();

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

    public function setTitle($title)
    {
        $this->title = $title;
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
}
