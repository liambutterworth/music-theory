<template>
    <base-layout :class="classes">
        <slot />
    </base-layout>
</template>

<script setup>

import { computed } from 'vue'

const props = defineProps({
    gap: Boolean,
    justifyCenter: Boolean,
    justifyEnd: Boolean,
})

const classes = computed(() => ({
    'flex': true,
    'gap-2': props.gap,
    'justify-center': props.justifyCenter,
    'justify-end': props.justifyEnd,
}))

</script>
