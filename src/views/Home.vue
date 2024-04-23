<template>
    <wrapper-layout>
        <guitar-fretboard :frets="frets">
            <guitar-string v-for="note in tuning" :tuning="note" />
        </guitar-fretboard>
    </wrapper-layout>
</template>

<script setup>

import { ref } from 'vue'

const tuning = ref(['E', 'B', 'G', 'D', 'A', 'E'])
const frets = ref(24)

</script>
