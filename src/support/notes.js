import { first, last, map, isArray, isObject } from 'lodash'
import { find as findInterval, fromFormula } from '@/support/intervals.js'

export const notes = [
    'A', 'A#|Bb',
    'B',
    'C', 'C#|Db',
    'D', 'D#|Eb',
    'E',
    'F', 'F#|Gb',
    'G', 'G#|Ab',
]

export const findIndex = needle => {
    if (!needle) {
        return -1
    }

    const needles = needle.includes('|') ? needle.split('|') : [needle]

    let foundIndex = -1

    notes.forEach((note, index) => {
        const notes = note.includes('|') ? note.split('|') : [note]

        if (notes.some(note => needles.includes(note))) {
            return foundIndex = index
        }
    })

    return foundIndex
}

export function isEqual(a, b) {
    return findIndex(a) === findIndex(b)
}

export function transpose(note, interval) {
    if (!isObject(interval)) {
        interval = findInterval(interval)
    }

    return startFrom(note)[interval.steps % notes.length]
}

export function fromKey(key) {
    return map(fromFormula('1-2-3-4-5-6-7'), interval => {
        return transpose(key, interval)
    })
}

export function fromRange(start, range) {
    const startIndex = findIndex(start)
    const inRange = []

    for (let index = startIndex; index < startIndex + range; index++) {
        inRange.push(notes[index % notes.length])
    }

    return inRange
}

export function startFrom(start) {
    return fromRange(start, 12)
}

export function toFlat(note) {
    return last(note.split('|'))
}

export function toSharp(note) {
    return first(note.split('|'))
}
