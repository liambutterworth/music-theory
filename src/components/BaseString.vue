<template>
    <div>
        <li>{{ frets }} frets starting from {{ tuning }}</li>
    </div>
</template>

<script setup>

import { inject } from 'vue'

const props = defineProps({
    tuning: { type: String, required: true },
})

const frets = inject('frets')

</script>
