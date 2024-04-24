<template>
    <div class="flex first:border-t border-b border-slate-500">
        <slot>
            <base-fret v-for="note in notes" :note="note" :style="style" />
        </slot>
    </div>
</template>

<script setup>

import { computed } from 'vue'
import { fromRange } from '@/support/notes.js'

const props = defineProps({
    tuning: { type: String, required: true },
    frets: { type: Number, required: true },
})

const notes = computed(() => fromRange(props.tuning, props.frets))

const style = computed(() => ({
    width: `calc(100% / ${props.frets})`,
}))

</script>
