<?php

declare(strict_types=1);

interface InsuranceInterface
{
    // 计算价格
    public function cal(): float;

    // 获取险种名字
    public function name(): string;

    // 获取详情
    public function info(): array;
}

class ChinaLifeInsurance implements InsuranceInterface
{
    public function cal(): float
    {
        // TODO: Implement cal() method.
        return 2;
    }

    public function info(): array
    {
        // TODO: Implement info() method.
        return [
            'money' => 10.5,
            'year' => 10,
        ];
    }

    public function name(): string
    {
        // TODO: Implement name() method.
        return 'ChinaLifeInsurance';
    }
}

class PingAnInsurance implements InsuranceInterface
{
    public function cal(): float
    {
        // TODO: Implement cal() method.
        return 1;
    }

    public function info(): array
    {
        // TODO: Implement info() method.
        return [
            'money' => 10,
            'year' => 10,
        ];
    }

    public function name(): string
    {
        // TODO: Implement name() method.
        return 'PingAnInsurance';
    }
}

class StrategyFactory
{
    /**
     * @param $strategyName
     * @return InsuranceInterface
     */
    public static function getInstance($strategyName): InsuranceInterface
    {
        $className = __NAMESPACE__ . '\\' . $strategyName . 'Insurance';
        if (class_exists($className)) {
            return new $className();
        }
        throw new \RuntimeException('不存在该保险');
    }
}

$insuranceName = 'ChinaLife';
$insuranceFactory = StrategyFactory::getInstance($insuranceName);
echo 'insuranceName: ' . $insuranceFactory->name();
echo '<br>';
echo 'insuranceInfo: ' . json_encode($insuranceFactory->info(), 320);
echo '<br>';
echo 'insuranceCal: ' . $insuranceFactory->cal();