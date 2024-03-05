<?php

namespace Modules\Content\Repositories;

use Modules\Content\app\Models\ContentType;

class ContentTypeRepositories extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'name',
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return ContentType::class;
    }

}
