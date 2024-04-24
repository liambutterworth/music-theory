<template>
    <component :is="tag" :class="classes">
        <slot>{{ text }}</slot>
    </component>
</template>

<script setup>

import { computed } from 'vue'

const props = defineProps({
    text: String,
    h1: Boolean,
    h2: Boolean,
    h3: Boolean,
    h4: Boolean,
    h5: Boolean,
    h6: Boolean,
    s1: Boolean,
    s2: Boolean,
    s3: Boolean,
    s4: Boolean,
    s5: Boolean,
    s6: Boolean,
})

const tag = computed(() => {
    if (props.h1) {
        return 'h1'
    } else if (props.h2) {
        return 'h2'
    } else if (props.h3) {
        return 'h3'
    } else if (props.h4) {
        return 'h4'
    } else if (props.h5) {
        return 'h5'
    } else if (props.h6) {
        return 'h6'
    } else {
        return 'div'
    }
})

const classes = computed(() => ({
    'text-5xl': props.s1 || props.h1,
    'text-4xl': props.s2 || props.h2,
    'text-3xl': props.s3 || props.h3,
    'text-2xl': props.s4 || props.h4,
    'text-xl': props.s5 || props.h5,
    'text-lg': props.s6 || props.h6,
}))

</script>
