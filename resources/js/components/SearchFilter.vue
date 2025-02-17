<template>
    <div>
        <!--
        Поле для вводу інформації.
        Пошук здійснюється на основі співпадінь по введених даних. Підсвічуються блоки, де є співпадіння
        по вже введеним символам
        -->
        <input v-model="searchText" placeholder="Введіть текст для пошуку"
               class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700
               leading-tight focus:outline-none focus:shadow-outline" />
    </div>
</template>

<script setup>
import { ref, watch } from "vue";

// Змінна для введеного пошукового тексту
const searchText = ref("");

// Спостерігаю за змінами в searchText і викликаємо функцію для підсвічування
watch(searchText, (newSearchText) => {
    highlightTextOnPage(newSearchText);
});

// Функція для підсвічування тексту на сторінці
const highlightTextOnPage = (searchQuery) => {
    // Видаляю попередні підсвічування
    removePreviousHighlights();

    if (!searchQuery.trim()) return;

    // Створення регулярного виразу для пошуку тексту без урахування реєстру
    const regex = new RegExp(`(${searchQuery})`, "gi");

    // Рекурсивно проходжу по всіх елементах на сторінці
    traverseDOM(document.body, regex);
};

// Функція для рекурсивного обходу всіх елементів на сторінці
const traverseDOM = (node, regex) => {
    // Якщо елемент — це текстовий вузол
    if (node.nodeType === Node.TEXT_NODE) {
        highlightElement(node, regex);
    } else if (node.nodeType === Node.ELEMENT_NODE) {
        // Якщо елемент містить дочірні елементи, рекурсивно обходжу їх
        for (let child of node.childNodes) {
            traverseDOM(child, regex);
        }
    }
};

// Функція для підсвічування знайденого тексту в елементі
const highlightElement = (node, regex) => {
    // Якщо це текстовий вузол
    if (node.nodeType === Node.TEXT_NODE) {
        const text = node.nodeValue;

        // Якщо знайдено співпадіння
        if (regex.test(text)) {
            const span = document.createElement("span");
            span.className = "highlight-text"; // Клас для підсвічування

            // Заміняю знайдені співпадіння на span з підсвічуванням
            const result = text.replace(regex, (match) => {
                const matchSpan = document.createElement("span");
                matchSpan.className = "highlight-text";
                matchSpan.textContent = match; // Підсвічений текст
                return matchSpan.outerHTML;
            });

            span.innerHTML = result;
            node.parentNode.replaceChild(span, node);  // Заміняєю текстовий вузол
        }
    }
};

// Функція для видалення попередніх підсвічувань
const removePreviousHighlights = () => {
    const highlightedElements = document.querySelectorAll(".highlight-text");
    highlightedElements.forEach((element) => {
        const parentNode = element.parentNode;
        parentNode.replaceChild(document.createTextNode(element.textContent), element);
    });
};

const highlightText = (node, regex) => {
    // Якщо елемент — це текстовий вузол, перевіряю його на співпадіння
    if (node.nodeType === Node.TEXT_NODE) {
        // Якщо знайдено співпадіння, підсвічую цей текст
        if (regex.test(node.nodeValue)) {
            const span = document.createElement("span");
            span.className = "highlight-text";  // Клас для підсвічування
            span.textContent = node.nodeValue;
            node.replaceWith(span);  // Замінюю текстовий вузол на підсвічений span
        }
    } else if (node.nodeType === Node.ELEMENT_NODE) {
        // Якщо елемент — не текстовий вузол, перевіряю його всі дочірні елементи
        Array.from(node.childNodes).forEach(child => {
            highlightText(child, regex);  // Рекурсивно перевіряю дочірні вузли
        });
    }
};
</script>

<style>
/* Стиль для підсвічування знайдених співпадінь */
.highlight-text {
    background-color: yellow;
    font-weight: bold;
}
</style>
