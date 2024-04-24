<template>
    <base-fretboard>
        <slot>
            <base-string v-for="note in tuning" :tuning="note" :frets="frets" />
        </slot>
    </base-fretboard>
</template>

<script setup>

const props = defineProps({
    tuning: { type: Array, default: ['E', 'B', 'G', 'D', 'A', 'E'] },
    frets: { type: Number, default: 21 },
})

</script>
