import { find, isEmpty } from 'lodash'
import { computed, ref, watch } from 'vue'
import { useKey } from '@/composables/Key.js'
import { isEqual, toFlat, toSharp } from '@/support/notes.js'

const { notes, resolve } = useKey()

export function useNote(symbol) {
    const note = ref()

    const degree = computed(() => {
        const index = notes.value.findIndex(selected => isEqual(selected, note.value))

        return index > -1 ? index + 1 : null
    })

    const isSelected = computed(() => {
        return !isEmpty(find(notes.value, selected => isEqual(selected, note.value)))
    })

    const set = value => {
        note.value = value
    }

    if (symbol) {
        set(symbol)
    }

    return { note, degree, set, isSelected }
}
