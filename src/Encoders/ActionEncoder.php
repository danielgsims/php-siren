<?php namespace Siren\Encoders;

use Siren\Components\Action;

class ActionEncoder extends BaseEncoder
{
    private function validateAction(Action $action)
    {
        $name = $action->getName();
        if (empty($name)) {
            throw new \Exception("Action name is required");
        }

        $href = $action->getHref();
        if ( empty($href) ) {
            throw new \Exception("Action href is required");
        }
    }

    public function encode(Action $action)
    {
        $this->validateAction($action);

        $a = array();

        $a['name'] = $action->getName();

        if ($class = $action->getClass()) {
            $a['class'] = $class;
        }

        $a['href'] = $action->getHref();
        $a['method'] = $action->getMethod();

        if ($title = $action->getTitle()) {
            $a['title'] = $title;
        }

        $a['type'] = $action->getType() ?: 'text'; 

        if ($fields = $action->getFields()) {
            $a['fields'] = array();

            $fieldEncoder = $this->factory->field();

            foreach ($fields as $field) {
                $a['fields'][] = $fieldEncoder->encode($field);
            }

        }

        return $a;
    }
}
