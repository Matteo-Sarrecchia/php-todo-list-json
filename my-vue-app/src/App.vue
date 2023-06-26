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
      const data = {
        testoTask: this.newTask,
      };
      const headers = {
        headers: { 'Content-Type': 'multipart/form-data' }
      };
      axios.post(url, data, headers)
        .then(res => {
          const data = res.data;
          console.log("data", data);
          this.todoList = data;

          this.newTask = "";
        })
    },
    deleteTask(index) {

      const url = 'http://localhost/php-todo-list-json/deleteTask.php';
      const data = { "index": index };
      const headers = {
        headers: { 'Content-Type': 'multipart/form-data' }
      };

      axios.post(url, data, headers)
        .then(res => {

          const data = res.data;
          this.todoList = data;
          console.log("data", data);
        });
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
      <button type="button" @click="deleteTask(index)" id="deleteButton">X</button>
    </li>
  </ul>
  <form @submit.prevent="onSubmit">
    <label for="newTask"> Create New Task </label>
    <input type="text" name="newTask" v-model="newTask">
    <br />
    <input id="createInput" type="submit" value="CREATE">
  </form>
</template>

<style >
#deleteButton {
  color: red;
  padding: 5px 10px;
  background-color: lightgray;
  margin-left: 30px;
}

#createInput {
  margin-top: 20px;
}
</style>
