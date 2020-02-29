<?php

namespace App\GraphQL\Types\Models;

use App\Models\File;
use GraphQL\Type\Definition\Type;
use Rebing\GraphQL\Support\Type as GraphQLType;

/**
 * Class FileType
 * @package App\GraphQL\Types\Models
 */
class FileType extends GraphQLType
{
    /**
     * Attributes of type
     * @var array
     */
    protected $attributes = [
        'name' => 'file',
        'description' => 'A type "File"',
        'model' => File::class,
    ];

    /**
     * Get fields list
     * @return array
     */
    public function fields(): array
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::int()),
                'description' => 'The id of file'
            ],
            'name' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The name of file'
            ],
            'mime' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The mime type of file'
            ],
            'is_main' => [
                'type' => Type::nonNull(Type::boolean()),
                'description' => 'Flag if file is main'
            ],
            'url' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The URL-address of file'
            ],
        ];
    }
}
