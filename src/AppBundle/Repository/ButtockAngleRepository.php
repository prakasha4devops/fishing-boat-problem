<?php
/**
 *
 * Prakash Admane <prakashadmane@gmaill.com>
 */

namespace AppBundle\Repository;

use AppBundle\Entity\ButtockAngle;
use Doctrine\ORM\EntityRepository;

/**
 * Class ButtockAngleRepository
 * @package AppBundle\Repository
 */
class ButtockAngleRepository extends EntityRepository
{
    /**
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function createAlphabeticalQueryBuilder()
    {
        return $this->createQueryBuilder('buttock_angle')
            ->orderBy('buttock_angle.value', 'ASC');
    }

}
