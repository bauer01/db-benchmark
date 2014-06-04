<?php

namespace Model\Entity;

/**
 * @adapter Dibi(employees)
 *
 * @property integer      $empNo       m:map-by(emp_no) m:primary
 * @property Salary[]     $salaries    m:assoc(1:N) m:assoc-by(emp_no)
 * @property Department[] $departments m:assoc(M:N) m:assoc-by(emp_no|dept_emp|dept_no)
 * @property DateTime     $birthDate   m:map-by(birth_date)
 * @property string       $firstName   m:map-by(first_name)
 * @property string       $lastName    m:map-by(last_name)
 * @property string       $gender
 * @property DateTime     $hireDate    m:map-by(hire_date)
 */
class Employee extends \UniMapper\Entity
{
}
