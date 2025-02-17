<template>
    <div>
        <!-- Інформація по клієнту у вигляді таблиці -->
        <h2 class="text-lg font-bold mb-2">Виписка по клієнту</h2>
        <div v-if="store.selectedClient">
            <table class="table-auto w-full border-collapse">
                <thead>
                <tr>
                    <th class="border-b p-2 text-left">Поле</th>
                    <th class="border-b p-2 text-left">Значення</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="border-b p-2">ID</td>
                    <td class="border-b p-2">{{ store.selectedClient.idClient }}</td>
                </tr>
                <tr>
                    <td class="border-b p-2">Date</td>
                    <td class="border-b p-2">{{ store.selectedClient.dateCurr }}</td>
                </tr>
                <tr>
                    <td class="border-b p-2">Телефон</td>
                    <td class="border-b p-2">{{ store.selectedClient.phone }}</td>
                </tr>
                <tr>
                    <td class="border-b p-2">Пошта</td>
                    <td class="border-b p-2">{{ store.selectedClient.mail }}</td>
                </tr>
                <tr>
                    <td class="border-b p-2">Адреса</td>
                    <td class="border-b p-2">{{ store.selectedClient.address }}</td>
                </tr>
                <tr>
                    <td class="border-b p-2">Місячна зарплата</td>
                    <td class="border-b p-2">{{ store.selectedClient.monthSalary }}</td>
                </tr>
                <tr>
                    <td class="border-b p-2">Валюта зарплати</td>
                    <td class="border-b p-2">{{ store.selectedClient.currSalary }}</td>
                </tr>
                <tr>
                    <td class="border-b p-2">Статус</td>
                    <td class="border-b p-2">{{ store.selectedClient.decision }}</td>
                </tr>
                <tr>
                    <td class="border-b p-2">Ліміт</td>
                    <td class="border-b p-2">{{ store.selectedClient.limitItog }}</td>
                </tr>
                </tbody>
            </table>
            <button @click="delete_client(store.selectedClient.idClient)" class="text-blue-500 mt-4">Видалити</button>
        </div>
    </div>
</template>

<script setup>
import {useCreditStore} from "@/store/creditStore";

const store = useCreditStore();

// Якщо потрібно видалити клієнта
const delete_client = (idClient) => {
    store.deleteClient(idClient);
    store.selectedClient = null;
};
</script>
