<template>
    <button :type="type">
        <slot>{{ text }}</slot>
    </button>
</template>

<script setup>

const props = defineProps({
    text: String,
    type: { type: String, default: 'button' },
})

</script>
