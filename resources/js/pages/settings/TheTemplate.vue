<script setup>
import { inject } from 'vue';
// import draggable from 'vuedraggable'
import TheCard from '../auth/the/TheCard.vue';

const colunas = inject('lista_cols');

</script>
<template>
    <!-- d-flex mantém os itens alinhado na horizontal -->
    <div class="d-flex item-start overflow-x-auto">

        <!-- define o 'card principal'. Os cards menores ficarão dentro dele. -->
        <div v-for="(coluna, index) in colunas" :key="index" class="colunas">
            <div class="card-header">
                <div class="d-flex txt">
                    <h5>{{ coluna.titulo }}</h5>
                    <h5>{{ coluna.tarefas.length }}</h5>
                </div>
            </div>
            <!-- corpo dos cards menores -->

            <TheCard />

        </div>
    </div>
</template>

<style>
.colunas {
    height: fit-content;
    min-width: 300px;
    min-height: 470px;
    margin: 19px 10px 10px 10px;
    max-width: 300px;
    background-color: #e5e5e7;
    border-radius: 4px;
}

.txt {
    justify-content: space-between;
}

.card-header {
    margin: 19px 10px 10px 10px;
}
</style>