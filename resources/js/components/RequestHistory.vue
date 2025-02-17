<template>
    <div>
        <!-- Виводжу історію по клієнтам, всі запити, що були виведені -->
        <h2 class="text-lg font-bold mb-2">Історія запитів</h2>
        <table class="table-auto w-full border-collapse">
            <thead>
            <tr>
                <th class="border-b p-2 text-left">ID</th>
                <th class="border-b p-2 text-left">Телефон</th>
                <th class="border-b p-2 text-left">Email</th>
                <th class="border-b p-2 text-left">Адреса</th>
                <th class="border-b p-2 text-left">Зарплата</th>
                <th class="border-b p-2 text-left">Кредитний ліміт</th>
                <th class="border-b p-2 text-left">Рішення</th>
                <th class="border-b p-2 text-left">Дія</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="client in reversedRequests" :key="client.Ref">
                <td class="border-b p-2">{{ client.idClient }}</td>
                <td class="border-b p-2">{{ client.phone }}</td>
                <td class="border-b p-2">{{ client.mail }}</td>
                <td class="border-b p-2">{{ client.address }}</td>
                <td class="border-b p-2">{{ client.monthSalary }} {{ client.currSalary }}</td>
                <td class="border-b p-2">{{ client.limitItog }}</td>
                <td class="border-b p-2">{{ client.decision }}</td>
                <td class="border-b p-2">
                    <button @click="store.selectClient(client)" class="bg-blue-500 text-white px-3 py-1 rounded">
                        Показати
                    </button>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script setup>
import { computed, onMounted } from "vue";
import { useCreditStore } from "@/store/creditStore";
const store = useCreditStore();

// Змінюю порядок записів
const reversedRequests = computed(() =>
    [...store.requests].sort((a, b) => new Date(b.dateCurr) - new Date(a.dateCurr))
);


onMounted(() => {
    store.fetchRequests();
});
</script>
