<?php

namespace Model\Entity;

/**
 * @adapter Dibi(departments)
 *
 * @property string $deptNo   m:map-by(dept_no) m:primary
 * @property string $deptName m:map-by(dept_name)
 */
class Department extends \UniMapper\Entity
{
}
