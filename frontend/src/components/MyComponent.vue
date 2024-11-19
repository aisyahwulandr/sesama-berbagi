<template>
    <div>
        <h1>Data from API</h1>
        <ul v-if="dataFromAPI">
            <li v-for="(item, index) in dataFromAPI" :key="index">
                {{ item }}
            </li>
        </ul>
        <p v-else>Loading...</p>
    </div>
</template>

<script>
import axios from 'axios';

export default {
    data() {
        return {
            dataFromAPI: null,
        };
    },
    created() {
        axios.get('http://localhost:8000/api/endpoint')
            .then(response => {
                this.dataFromAPI = response.data;
            })
            .catch(error => {
                console.error(error);
            });
    },
};
</script>

<style scoped></style>