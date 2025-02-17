<template>
    <div class="flex flex-col">
        <!-- Навігація кнопок для переходу між формами -->
        <button v-for="tab in tabs" :key="tab.name" @click="$emit('change-tab', tab.name)"
                class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded"
                :class="{ 'bg-blue-500 text-white': tab.active }">
            {{ tab.label }}
        </button>
    </div>
</template>

<script setup>
import { defineProps } from "vue";

defineProps({ tabs: Array });
</script>
