<?php

namespace App\Service\Vich;

use Symfony\Component\VarDumper\VarDumper;
use Vich\UploaderBundle\Mapping\PropertyMapping;
use Vich\UploaderBundle\Naming\DirectoryNamerInterface;

class DirectoryNamer implements DirectoryNamerInterface
{
    /**
     * @param object          $object
     * @param PropertyMapping $mapping
     *
     * @return string
     */
    public function directoryName($object, PropertyMapping $mapping): string
    {
        return $this->directoryNameByString($object, $mapping->getMappingName());
    }
    public function directoryNameByString($object, string $mappingName): string
    {
        $entity = get_class($object);
        $entity = str_replace('App\\Entity\\', '', $entity);
        $entity = str_replace('\\', '/', $entity);

        return mb_strtolower(sprintf('%s/%s', $entity, $mappingName));
    }
}