<template>
    <div>
        {{ note }}
    </div>
</template>

<script setup>

const props = defineProps({
    note: { type: String, required: true },
})

</script>
