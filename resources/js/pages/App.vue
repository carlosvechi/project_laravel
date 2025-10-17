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
import TheHeader from './components/TheHeader.vue';
import TheFooter from './components/TheFooter.vue';
import TheTemplate from './components/TheTemplate.vue';
import TheModal from './components/TheModal.vue';
import Cols from './components/Array.js';

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
