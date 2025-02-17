<?php

namespace App\Services;

use App\Repositories\ClientRepository;

class ClientService
{
    public function __construct(
        private ClientRepository $clientRepository,
        private CurrencyConversionService $currencyService,
        private PhoneOperatorService $phoneOperatorService,
        private CreditLimitService $creditLimitService,
        private ClientValidationService $clientValidationService,
        private ReferenceGeneratorService $referenceGeneratorService
    ) {}

    public function storeClient(array $data): array
    {
        // Перевірка віку
        if (!$this->clientValidationService->isValidAge($data['dateBirthday'])) {
            return ['error' => 'Клієнт має бути старше 18 років'];
        }

        // Перевірка унікальності клієнта
        if ($this->clientRepository->exists($data['idClient'])) {
            return ['error' => 'Клієнт з цим ідентифікатором вже існує'];
        }

        // Конвертація валюти
        $salaryUAH = $this->currencyService->convertToUAH($data['monthSalary'] ?? 0, $data['currSalary'] ?? 'UAH');

        // Визначення коефіцієнта
        $coefficient = $this->phoneOperatorService->getCoefficient($data['phone'] ?? '');

        // Розрахунок кредитного ліміту
        $limitItog = $this->creditLimitService->calculate($coefficient, $salaryUAH, $data['requestLimit']);

        // Прийняти/відхилити заявку
        $decision = $limitItog > 0 ? 'accept' : 'decline';

        // Генерація референсу
        $ref = $this->referenceGeneratorService->generate();

        // Збереження клієнта
        $this->clientRepository->create([
            'Ref' => $ref,
            'idClient' => $data['idClient'],
            'phone' => $data['phone'],
            'mail' => $data['mail'],
            'address' => $data['address'],
            'monthSalary' => $data['monthSalary'] ?? 0,
            'currSalary' => $data['currSalary'],
            'decision' => $decision,
            'limitItog' => $limitItog
        ]);

        return [
            'Ref' => $ref,
            'limitItog' => $limitItog,
            'decision' => $decision
        ];
    }
}
