<script>
import axios from 'axios';

export default {
  data() {

    return {
      todoList: []
    }
  },
  mounted() {
    axios.get("http://localhost/php-todo-list-json/")
      .then(response => {
        this.todoList = response.data;
      })
  }

};
</script>

<template>
  <h1>Hello World...</h1>
  <ul>
    <li v-for="(todo, index) in todoList" :key="index">
      {{ todo }}
    </li>
  </ul>
</template>

<style ></style>
