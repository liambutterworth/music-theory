<template>
    <option :value="value">
        <slot>{{ text || value }}</slot>
    </option>
</template>

<script setup>

const props = defineProps({
    text: String,
    value: { type: [Number, String], required: true },
})

</script>
