<?php

namespace whatwedo\CoreBundle\Formatter;

use Symfony\Component\OptionsResolver\OptionsResolver;
use whatwedo\CoreBundle\Enum\AbstractSimpleEnum;

/**
 * Class SimpleEnumFormatter
 * @package whatwedo\CoreBundle\Formatter
 */
class SimpleEnumFormatter extends AbstractFormatter
{
    protected function configureOptions(OptionsResolver $resolver)
    {
        $resolver
            ->setRequired('enum')
            ->setAllowedTypes('enum', 'string');
    }

    /**
     * returns a string which represents the value
     *
     * @param $value
     * @return string
     */
    public function getString($value)
    {
        return forward_static_call([$this->options['enum'], 'getRepresentation'], $value);
    }
}