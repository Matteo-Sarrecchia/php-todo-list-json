<script>
import axios from 'axios';

export default {
  data() {

    return {
      todoList: [],
      newTask: "",
    }
  },

  methods: {
    onSubmit() {

      const url = 'http://localhost/php-todo-list-json/newTask.php';
      const data = this.newTask;
      const headers = {
        headers: { 'Content-Type': 'multipart/form-data' }
      };
      axios.post(url, data, headers)
        .then(res => {
          const data = res.data;
          this.todoList = data;
        })
    }

  },

  mounted() {
    axios.get("http://localhost/php-todo-list-json/index.php")
      .then(res => {
        const data = res.data;
        this.todoList = data;
        console.log("data", data);
      })
  }

};
</script>

<template>
  <h1>TO DO LIST</h1>
  <ul>
    <li v-for="(newTask, index) in todoList" :key="index">
      {{ newTask }}
    </li>
  </ul>
  <form @submit.prevent="onSubmit">
    <label for="newTask"> Create New Task </label>
    <input type="text" name="newTask" v-model="newTask">
    <br />
    <input type="submit" value="CREATE">
  </form>
</template>

<style ></style>
