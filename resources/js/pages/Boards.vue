<template>
  <div class="">
    <div><TheHeader /></div>
    <div><TheTemplate /> </div>
    <div><TheModal /></div>
    <div><TheFooter /></div>
  </div>
</template> 

<script setup>
import {ref, provide} from 'vue';
import TheHeader from './auth/the/TheHeader.vue';
import TheFooter from './auth/the/TheFooter.vue';
import TheTemplate from './settings/TheTemplate.vue';
import TheModal from './auth/the/TheModal.vue';
import Cols from './auth/the/Array.js';

const lista_cols = ref(Cols);
const tarefas   = ref([])
provide('lista_cols', lista_cols);
provide('tarefas', tarefas);
</script>

<style>
body{
  background-color: rgb(153, 153, 153) !important;
}

</style>
