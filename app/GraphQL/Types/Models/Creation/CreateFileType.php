<?php

namespace App\GraphQL\Types\Models\Creation;

use App\Models\File;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

/**
 * Class CreateFileType
 * @package App\GraphQL\Types\Models\Creation
 */
class CreateFileType extends GraphQLType
{
    /**
     * Attributes of type
     * @var array
     */
    protected $attributes = [
        'name' => 'Files',
        'description' => 'A type',
        'model' => File::class,
    ];

    /**
     * Get fields list
     * @return array
     */
    public function fields(): array
    {
        return [
            'content' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Content of file in BASE64 format'
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Name of file'
            ],
            'mime' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'Mime type of file'
            ],
        ];
    }
}
