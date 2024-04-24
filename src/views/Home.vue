<template>
    <wrapper-layout pad>
        <aside-layout>
            <base-heading h1 text="Guitar Fretboard" />

            <template #right>
                <row-layout gap justify-end>
                    <base-select label="Key" @change="onKeyChange">
                        <base-option text="Key of C" value="C" />
                        <base-option text="Key of G" value="G" />
                        <base-option text="Key of D" value="D" />
                        <base-option text="Key of A" value="A" />
                        <base-option text="Key of E" value="E" />
                        <base-option text="Key of B" value="B" />
                        <base-option text="Key of Gb"value="Gb" />
                        <base-option text="Key of F#"value="F#" />
                        <base-option text="Key of Db"value="Db" />
                        <base-option text="Key of Ab"value="Ab" />
                        <base-option text="Key of Eb"value="Eb" />
                        <base-option text="Key of Bb"value="Bb" />
                        <base-option text="Key of F" value="F" />
                    </base-select>

                    <base-select label="Tuning" @change="onTuningChange">
                        <base-option
                            v-for="{ key, name } in tunings"
                            :text="`${name} Tuning`"
                            :value="key"
                        />
                    </base-select>
                </row-layout>
            </template>
        </aside-layout>

        <base-divider />

        <guitar-fretboard :tuning="tuning" />

        <aside-layout class="mt-2">
            <base-heading h3 :text="`Notes in key of ${root}`" />

            <template #right>
                <ul class="flex w-full justify-center text-2xl font-bold">
                    <li v-for="note in notes" class="px-4">
                        {{ resolve(note) }}
                    </li>
                </ul>
            </template>
        </aside-layout>

    </wrapper-layout>
</template>

<script setup>

import { first, find } from 'lodash'
import { ref } from 'vue'
import { useKey } from '@/composables/Key.js'
import { tunings } from '@/support/guitar.js'

const { root, notes, resolve, set: setKey } = useKey()

const tuning = ref(first(tunings).value)

const onKeyChange = event => {
    setKey(event.target.value)
}

const onTuningChange = event => {
    tuning.value = find(tunings, { key: event.target.value }).value
}

</script>
