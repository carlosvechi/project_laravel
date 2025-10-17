
<script setup>
import TheBodyCard from './TheBodyCard.vue';
import TheFooterCard from './TheFooterCard.vue';
import TheHeaderCard from './TheHeaderCard.vue';

// import { defineProps } from 'vue'

//     const props = defineProps({
//         tarefa:{
//             Object,
//             required: true
//         } 
//     })
</script>
<template>
    <div  class="container myCard d-flex">
        <TheHeaderCard />
        <TheBodyCard />
        <TheFooterCard />
    </div>
</template>
<style>
.myCard {
    background-color: #F9FAFB !important;
    margin: 12px 12px 8px 16px;
    border-radius: 4px;
    height: 100px;
    max-width: 290px;
    border-left: 4px solid #f00606;
}
.icons {
    flex: 1;
    align-self: flex-end;
    display: flex !important;
}
.test {
    max-height: 20%;
    min-height: 20%;
}
.card-body {
    max-height: 50%;
    min-height: 50%;
}
</style>