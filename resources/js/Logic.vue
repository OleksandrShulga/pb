<script setup>
/*
Це двовказівкова реалізація, яка дозволяє пройти масив тільки один раз.
Це приклад реалізації без додаткової пам'яті, по теорії алгоритмів — O(1) пам'яті, хоча й O(n) по часу.
 */
function loadGrain(levels) {
    // Нічого немає? Повернути 0
    if (!levels.length) return 0;

    // Ініціалізація, лік йде зліва, справа спираюся на довжину масиву рівнів
    let left = 0, right = levels.length - 1;
    // Для змінних висот справа і зліва, які будуть зустрінуті
    let leftMax = 0, rightMax = 0;
    let totalGrain = 0;

    while (left < right) {
        //Порівгюю висоти з обох кінців
        if (levels[left] < levels[right]) {
            // Дивлюся, чи є нова висота найвищою, що зустрічав з цієї сторони
            if (levels[left] >= leftMax) {
                // Так? Це новий максимум
                leftMax = levels[left];
            } else {
                // Менше за максимальне значення, але можна використати для розрахунку розміщуваного зерна
                totalGrain += leftMax - levels[left];
            }
            // Зміщаюся
            left++;
        } else {
            // Дивлюся, чи є нова висота найвищою, що зустрічав з цієї сторони
            if (levels[right] >= rightMax) {
                // Так? Це новий максимум
                rightMax = levels[right];
            } else {
                // Менше за максимальне значення, але можна використати для розрахунку розміщуваного зерна
                totalGrain += rightMax - levels[right];
            }
            // Зміщаюся
            right--;
        }
    }

    // Результат
    return totalGrain;
}

// Тестові кейси
console.log(loadGrain([4, 1, 3])); // 2
console.log(loadGrain([2, 1, 5, 2, 7, 4, 10])); // 7
console.log(loadGrain([2, 0, 1, 5, 2, 7])); // 6
console.log(loadGrain([2, 4, 2])); // 0
console.log(loadGrain([7, 4])); // 0
console.log(loadGrain([])); // 0

</script>
