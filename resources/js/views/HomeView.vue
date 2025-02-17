<template>
    <div class="max-w-6xl mx-auto p-4">
        <div class="flex items-center justify-between mb-4">
            <!-- Строка пошуку та кнопка перевантаження сторінки -->
            <SearchFilter class="w-2/3" />
            <button @click="reloadPage" class="bg-red-500 text-white px-6 py-3 text-lg rounded">Перезавантажити сторінку</button>
        </div>
        <div class="flex">
            <div class="w-1/4 pr-4">
                <!-- На яку кнопку і форму (форми) орієнтуватися -->
                <NavigationTabs :tabs="tabs" @change-tab="selectedTab = $event" class="space-y-4 text-lg" />
            </div>
            <div class="w-3/4">
                <!-- Виводжу щось одне чи все? -->
                <div class="grid grid-cols-2 gap-4 mb-4">
                    <ClientForm v-if="selectedTab === 'clientForm' || selectedTab === 'all'" />
                    <ClientList v-if="selectedTab === 'clientList' || selectedTab === 'all'" />
                </div>
                <RequestHistory v-if="selectedTab === 'requestHistory' || selectedTab === 'all'" />
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from "vue";
import NavigationTabs from "@/components/NavigationTabs.vue";
import SearchFilter from "@/components/SearchFilter.vue";
import ClientForm from "@/components/ClientForm.vue";
import ClientList from "@/components/ClientList.vue";
import RequestHistory from "@/components/RequestHistory.vue";

const selectedTab = ref("clientForm");
// Найменування кнопок
const tabs = [
    { name: "clientForm", label: "Додавання клієнта", active: false },
    { name: "clientList", label: "Виписка по клієнту", active: false },
    { name: "requestHistory", label: "Історія запитів", active: false },
    { name: "all", label: "Показати всі", active: false }
];

const reloadPage = () => {
    window.location.reload();
};
</script>
