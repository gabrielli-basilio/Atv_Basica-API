<script setup>
import { ref, onMounted } from 'vue'

const tarefas = ref([])

onMounted(async () => {
  const resposta = await fetch('http://localhost:8000/api/tarefas', {
    headers: { Accept: 'application/json' }
  })
  const dados = await resposta.json()
  tarefas.value = dados.data
})
</script>

<template>
  <h1>Tarefas</h1>

  <div v-for="t in tarefas" :key="t.id">
    <p>Tarefa: <b>{{ t.titulo }}</b></p>
    <p>Concluída: <b>{{ t.concluida ? 'Sim' : 'Não' }}</b></p>
    <hr>
  </div>
</template>