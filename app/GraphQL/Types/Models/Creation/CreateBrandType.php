<?php

namespace App\GraphQL\Types\Models\Creation;

use App\Models\Brand;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Facades\GraphQL;
use Rebing\GraphQL\Support\InputType;

/**
 * Class CreateBrandType
 * @package App\GraphQL\Types\Models\Creation
 */
class CreateBrandType extends InputType
{
    /**
     * Attributes of type
     * @var array
     */
    protected $attributes = [
        'name' => 'createBrand',
        'description' => 'A type',
        'model' => Brand::class,
    ];

    /**
     * Get fields list
     * @return array
     */
    public function fields(): array
    {
        return [
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The name of brand'
            ],
            'description' => [
                'type' => Type::string(),
                'description' => 'The description of brand'
            ],
            'file' => [
                'type' => GraphQL::type('createFile'),
                'description' => 'Logo of brand'
            ]
        ];
    }
}
