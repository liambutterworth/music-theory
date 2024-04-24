import { computed, ref } from 'vue'
import { fromKey, toFlat, toSharp } from '@/support/notes.js'

const root = ref('C')
const notes = computed(() => fromKey(root.value))

const prefersFlats = computed(() => {
    return root.value.includes('b')
        || root.value === 'F'
})

const set = value => {
    root.value = value
}

const resolve = note => {
    if (prefersFlats.value) {
        return toFlat(note)
    } else {
        return toSharp(note)
    }
}

export function useKey() {
    return { root, notes, set, resolve, prefersFlats }
}
