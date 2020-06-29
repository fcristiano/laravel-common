<?php
/**
 * Created by PhpStorm.
 * User: Fabio
 * Date: 29/06/2020
 * Time: 23:50
 */

namespace Fcristiano\LaravelCommon\Model\Utils;


trait ManageDeletedAt
{
    protected $deleted_at;

    /**
     * @return \DateTime|null
     */
    public function getDeletedAt(): ?\DateTime
    {
        if($this->deleted_at !== null) {
            return \DateTime::createFromFormat('Y-m-d H:i:s', $this->deleted_at);
        }

        return null;
    }

    /**
     * @param \DateTime|null $deleted_at
     * @return self
     */
    public function setDeletedAt(?\DateTime $deleted_at): self
    {
        $this->deleted_at = $deleted_at->format('Y-m-d H:i:s');

        return $this;
    }
}