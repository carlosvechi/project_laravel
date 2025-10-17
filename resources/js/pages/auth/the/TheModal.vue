<template>

    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">

                    <h4 class="modal-title">Adicionar Tarefa</h4>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="input-group mb-3">
                        <input v-model="tituloCard" type="text" class="form-control" placeholder="Título" aria-label="Username"
                            aria-describedby="basic-addon1">
                    </div>

                    <div>
                        <label for="comment">Descrição</label>
                        <textarea class="form-control coment" v-model="descricaoCard" rows="5" id="comment" name="text"
                            style="resize: none;"></textarea>
                    </div>

                    <div class="d-flex mr-5 pt-3 mb-3">
                        <input type="color" v-model="colorCard" class="form-control form-control-color" value="#CCCCCC">
                        <div class="input-group">
                            <input type="file" class="form-control" id="inputGroupFile04"
                                aria-describedby="inputGroupFileAddon04" aria-label="Upload">
                        </div>
                    </div>

                    <div class="input-group mb-3">
                        <div class="input-group-text">
                            <input v-model="completado" class="form-check-input mt-0" type="checkbox">
                        </div>
                        <input v-model="tituloTarefa" type="text" class="form-control">
                        <button type="button" @click="salvarTarefa" class="btn btn-primary">Adicionar</button>
                    </div>
                    
                    <div>
                        <p class="text-center">Lista de Tarefas</p>
                        <ul class="test">
                            <li v-for="(tarefa, index) in tarefas" :key="index"><input type="checkbox" :checked="tarefa.completadoC"> {{ tarefa.titulo }}</li> 
                        </ul>
                    </div>
                </div>

                <!-- Modal footer -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                    <button type="button" @click="addCard" class="btn btn-primary">Salvar mudanças</button>
                </div>

                <ul>
                    <li v-for="(card, index) in cards" :key="index">
                        {{ card.tituloC }} {{ card.descricao }} {{ card.color }} {{ card.tarefa }}
                    </li>
                </ul>
                    
            </div>
        </div>
    </div>


</template>

<script setup>
   import {inject, ref} from 'vue';

   const tarefas = inject('tarefas')
//    const tarefas = ref([]);
   const tituloTarefa = ref('');
   const completado = ref(false);

   const cards = ref([]);
   const tituloCard = ref('');
   const descricaoCard = ref('');
   const colorCard = ref('');

   function salvarTarefa() {
        const id = tarefas.value.length;
        
        tarefas.value.push({
            id: id,
            titulo: tituloTarefa.value,
            completadoC: completado.value,
        });

        tituloTarefa.value = '';
        completado.value = false;
        
   }

   function addCard() {
    const id = cards.value.length;

    cards.value.push({
        id: id,
        tituloC: tituloCard.value,
        descricao: descricaoCard.value,
        color: colorCard.value,
        tarefa: [...tarefas.value]
        
    });

    tituloCard.value = '';
    descricaoCard.value = '';
    colorCard.value = '';
    tituloTarefa.value = '';
    

   }
</script>

<style>
.coment {
    height: 90px;
}

.color {
    background-color: #030303 !important;
    padding: 50px 2px 2px 2px;
}
li {
    list-style-type: none;
}
.test {
    background-color: rgb(213, 213, 218);
    font-family: 'Arial';
    font-size: medium;
}
</style>