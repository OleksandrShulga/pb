<template>
    <div id="app">
        <h1>Welcome to the <s>Night City</s> technical task of Privatbank</h1>

        <router-view></router-view> <!-- Місце для рендерингу інших компонентів через роутер -->
    </div>
</template>

<script>
export default {
    name: 'App',
}
</script>

<style scoped>
/* Стилі для цього компонента */
#app {
    text-align: center;
    padding: 20px;
    background-color: #f4f4f4;
}
</style>
