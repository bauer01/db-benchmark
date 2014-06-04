<?php

namespace Model\Entity;

/**
 * @adapter Dibi(salaries)
 *
 * @property integer  $empNo    m:map-by(emp_no)
 * @property integer  $salary
 * @property DateTime $fromDate m:map-by(from_date)
 * @property DateTime $toDate   m:map-by(to_date)
 */
class Salary extends \UniMapper\Entity
{
}