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

        $response = array();

        $response['name'] = $action->getName();

        if ($class = $action->getClass()) {
            $response['class'] = $class;
        }

        $response['href'] = $action->getHref();
        $response['method'] = $action->getMethod();

        if ($title = $action->getTitle()) {
            $response['title'] = $title;
        }

        $response['type'] = $action->getType() ?: 'application/x-www-form-urlencoded'; 

        if ($fields = $action->getFields()) {
            $response['fields'] = array();

            $fieldEncoder = $this->factory->field();

            foreach ($fields as $field) {
                $response['fields'][] = $fieldEncoder->encode($field);
            }

        }

        return $response;
    }
}
