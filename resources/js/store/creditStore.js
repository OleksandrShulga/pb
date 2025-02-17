import { defineStore } from "pinia";
import axios from "axios";

export const useCreditStore = defineStore("credit", {
    // Дані, які потрібні для обмінів даними, відповідей і пошуку
    state: () => ({
        clients: [],
        requests: [],
        selectedClient: null,
        searchQuery: "",
        error: null,
        result: null,
    }),
    actions: {
        async fetchClients() {
            try {
                // Отримую клієнтів
                const response = await axios.get("/api/clients");
                this.clients = response.data;
            } catch (err) {
                this.error = "Помилка завантаження клієнтів";
            }
        },
        async fetchRequests() {
            try {
                // Отримую інформацію по всім запитам, що були зроблені
                const response = await axios.get("/api/clients");
                this.requests = response.data;
            } catch (err) {
                this.error = "Помилка завантаження історії запитів";
            }
        },
        async saveClient(clientData) {
            try {
                // Працюю з одним клієнтом
                const response = await axios.post("/api/client", clientData);
                this.result = response.data;
                this.fetchClients();
                this.fetchRequests();
            } catch (err) {
                this.error = "Помилка збереження клієнта";
            }
        },
        async deleteClient(clientId) {
            try {
                // Видаляю клієнта
                await axios.delete(`/api/client/${clientId}`);
                this.fetchClients();
                this.fetchRequests();
            } catch (err) {
                this.error = "Помилка видалення клієнта";
            }
        },
        selectClient(client) {
            // Вибираю дані клієнта для вставки
            this.selectedClient = { ...client };
        }
    },
});
