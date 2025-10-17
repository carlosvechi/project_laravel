<script setup lang="ts">
import type { HTMLAttributes } from 'vue';

defineOptions({
    inheritAttrs: false,
});

interface Props {
    className?: HTMLAttributes['class'];
}

defineProps<Props>();
</script>

<template>
    <img src="https://media.glassdoor.com/sqll/6605797/freeline-inform%C3%A1tica-squarelogo-1653629726043.png" alt="">
</template>
