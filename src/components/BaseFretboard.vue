<template>
    <div>
        <slot />
    </div>
</template>

<script setup>

import { provide } from 'vue'

const props = defineProps({
    frets: { type: Number, default: 24 },
})

provide('frets', props.frets)

</script>
