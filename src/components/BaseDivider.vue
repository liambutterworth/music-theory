<template>
    <hr :class="classes" />
</template>

<script setup>

import { computed } from 'vue'

const props = defineProps({
    small: Boolean,
    large: Boolean,
})

const classes = computed(() => ({
    'h-px bg-gray-300 border-0 before:content-[" "]': true,
    '!my-2': props.small,
    '!my-4': !props.small && !props.large,
    '!my-8': props.large,
}))

</script>
