<template>
    <div :class="classes">
        <div class="flex items-center justify-center" v-if="isSelected">
            {{ resolve(note) }}
        </div>

        <div class="flex items-center justify-center" v-if="degree">
            {{ degree }}
        </div>
    </div>
</template>

<script setup>

import { computed, watch } from 'vue'
import { useNote } from '@/composables/Note.js'
import { useKey } from '@/composables/Key.js'

const props = defineProps({
    note: { type: String, required: true },
})

const { resolve } = useKey()
const { note, degree, set, isSelected } = useNote(props.note)

const classes = computed(() => ({
    'flex flex-col justify-around py-4 h-20 first:border-l border-r border-slate-500': true,
    'bg-red-300': degree.value === 1,
    'bg-orange-300': degree.value === 2,
    'bg-yellow-300': degree.value === 3,
    'bg-green-300': degree.value === 4,
    'bg-blue-300': degree.value === 5,
    'bg-indigo-300': degree.value === 6,
    'bg-violet-300': degree.value === 7,
}))

watch(() => props.note, () => set(props.note))

</script>
