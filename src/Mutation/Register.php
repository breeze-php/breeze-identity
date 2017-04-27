<?php

namespace Breeze\Account\Mutation;

use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Field\AbstractField;
use Breeze\Account\Context\Register as RegisterContext;
use Youshido\GraphQL\Type\Scalar\StringType;

/**
 * Class Register
 */
class Register extends AbstractField
{
    /**
     * @var RegisterContext
     */
    private $register;

    /**
     * Register constructor.
     * @param RegisterContext $register
     */
    public function __construct(RegisterContext $register)
    {
        $this->register = $register;

        parent::__construct();
    }

    /**
     * @return StringType
     */
    public function getType()
    {
        return new StringType();
    }

    /**
     * @param FieldConfig $config
     * @return void
     */
    public function build(FieldConfig $config)
    {
        $config->addArgument('email', new StringType());
        $config->addArgument('password', new StringType());
    }

    /**
     * @param $value
     * @param array $args
     * @param ResolveInfo $info
     * @return string
     */
    public function resolve($value, array $args, ResolveInfo $info)
    {
        $this->register->register($args['email'], $args['password']);

        return 'success';//$this->createToken->create($args['username'], $args['password']);
    }
}
