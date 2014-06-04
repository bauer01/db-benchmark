<?php

use Model\Repository\EmployeeRepository;
use UniMapper\NamingConvention as UNC;

require __DIR__ . '/../print_benchmark_result.php';
if (@!include __DIR__ . '/vendor/autoload.php') {
    echo 'Install UniMapper using `composer install`';
    exit(1);
}

UNC::setMask("Model\Entity\*", UNC::ENTITY_MASK);
UNC::setMask("Model\Repository\*Repository", UNC::REPOSITORY_MASK);

require_once __DIR__ . '/Model/Entity/Employee.php';
require_once __DIR__ . '/Model/Entity/Salary.php';
require_once __DIR__ . '/Model/Entity/Department.php';
require_once __DIR__ . '/Model/Repository/EmployeeRepository.php';

date_default_timezone_set('Europe/Prague');

$time = -microtime(TRUE);
ob_start();

$connection = new UniMapper\Connection(new UniMapper\Mapper);
$connection->registerAdapter(
    "Dibi",
    new UniMapper\Dibi\Adapter(
        [
            'username' => 'root',
            'password' => '',
            'database' => 'employees'
        ]
    )
);

$repository = new EmployeeRepository($connection);

foreach ($repository->find([], [], 500, 0, ["departments", "salaries"]) as $employee) {

    echo "$employee->firstName $employee->lastName ($employee->empNo)\n";
    echo "Salaries:\n";
    foreach ($employee->salaries as $salary) {
            echo $salary->salary, "\n";
    }
    echo "Departments:\n";
    foreach ($employee->departments as $department) {
            echo $department->deptName, "\n";
    }
}

ob_end_clean();

print_benchmark_result('UniMapper');
