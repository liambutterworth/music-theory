<template>
    <div id="app-container">
        <app-header />
        <slot />
        <app-footer />
    </div>
</template>

<script>

import AppHeader from 'components/App/Header';
import AppFooter from 'components/App/Footer';

export default {
    name: 'app-container',

    components: {
        AppHeader,
        AppFooter,
    },
}

</script>
