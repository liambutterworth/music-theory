<template>
    <row-layout>
        <base-layout v-if="left" v-bind="$attrs">
            <slot name="left" />
        </base-layout>

        <base-layout class="grow" v-bind="$attrs">
            <slot>{{ text }}</slot>
        </base-layout>

        <base-layout v-if="right" v-bind="$attrs">
            <slot name="right" />
        </base-layout>
    </row-layout>
</template>

<script setup>

import { useSlots } from 'vue'

const { left, right } = useSlots()

</script>
