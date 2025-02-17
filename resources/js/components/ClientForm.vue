<template>
    <div class="p-6 bg-white rounded shadow-md">
        <h2 class="text-lg font-bold mb-2">Додавання клієнта</h2>
        <input v-model="client.idClient" type="number" placeholder="ID клієнта" required class="input" />
        <input v-model="client.dateBirthday" type="date" required class="input" />
        <input v-model="client.phone" type="text" placeholder="Телефон" class="input" />
        <input v-model="client.mail" type="email" placeholder="Email" class="input" />
        <input v-model="client.address" type="text" placeholder="Адреса" class="input" />
        <input v-model="client.monthSalary" type="number" placeholder="Зарплата" class="input" />
        <select v-model="client.currSalary" class="input">
            <option>UAH</option><option>USD</option><option>EUR</option>
        </select>
        <input v-model="client.requestLimit" type="number" placeholder="Бажаний ліміт" required class="input" />

        <button @click="save" class="btn">{{ isEditing ? "Оновити" : "Зберегти" }}</button>
        <button @click="resetForm" class="btn btn-secondary ml-2">Очистити</button>

        <!-- Виводжу відповідь про можливу помилку чи результати обробки даних -->
        <div v-if="store.result" class="mt-4 p-4 bg-green-100 rounded">
            <p>Ref: {{ store.result.Ref }}</p>
            <p>Кредитний ліміт: {{ store.result.limitItog }}</p>
            <p>Рішення: {{ store.result.decision }}</p>
        </div>
        <p v-if="store.error" class="text-red-500">{{ store.error }}</p>
    </div>
</template>

<script setup>
import { ref, watch } from "vue";
import { useCreditStore } from "@/store/creditStore";

const store = useCreditStore();

// Реактивний об'єкт для форми
const client = ref({
    idClient: "",
    dateBirthday: "",
    phone: "",
    mail: "",
    address: "",
    monthSalary: "",
    currSalary: "UAH",
    requestLimit: ""
});

// Визначаєю, чи ми редагуємо клієнта
const isEditing = ref(false);

// Функція збереження
const save = () => {
    store.saveClient(client.value);
    resetForm();
};

// Очищення форми
const resetForm = () => {
    isEditing.value = false;
    client.value = {
        idClient: "",
        dateBirthday: "",
        phone: "",
        mail: "",
        address: "",
        monthSalary: "",
        currSalary: "UAH",
        requestLimit: ""
    };
    store.selectedClient = null;
};
</script>

<style scoped>
.input { display: block; margin-bottom: 10px; padding: 8px; width: 100%; }
.btn { background: blue; color: white; padding: 8px; }
.btn-secondary { background: gray; color: white; }
</style>
