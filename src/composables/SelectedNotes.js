import { isEmpty } from 'lodash'
import { ref } from 'vue'
import { fromKey } from '@/support/notes.js'

const notes = ref([])

export function useSelectedNotes() {
    if (isEmpty(notes.value)) {
        notes.value = fromKey('C')
    }

    const select = value = notes.value = value

    return { notes, select }
}
