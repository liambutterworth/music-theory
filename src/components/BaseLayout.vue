<template>
    <div :class="classes">
        <slot />
    </div>
</template>

<script setup>

import { computed } from 'vue'

const props = defineProps({
    gap: Boolean,
    justifyCenter: Boolean,
    justifyEnd: Boolean,
})

const classes = computed(() => ({
    'gap': props.gap,
    'justify-center': props.justifyCenter,
    'justify-end': props.justifyEnd,
}))

</script>
